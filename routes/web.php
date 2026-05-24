<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::post('/deploy-webhook', function (Request $request) {

    // ── Verify it's GitHub sending this ──────────────────────
    $secret = env('DEPLOY_SECRET');
    $sig = 'sha256='.hash_hmac('sha256', $request->getContent(), $secret);

    if (! hash_equals($sig, $request->header('X-Hub-Signature-256', ''))) {
        Log::warning('Deploy webhook: invalid signature');
        abort(403, 'Invalid signature');
    }

    // ── Only deploy pushes to main branch ────────────────────
    $payload = $request->json()->all();

    if (($payload['ref'] ?? '') !== 'refs/heads/main') {
        return response('Skipped — not main branch', 200);
    }

    // ── Run deploy commands ───────────────────────────────────
    $path = base_path();
    $output = shell_exec(implode(' 2>&1 && ', [
        "cd {$path}",
        'git pull origin main',
        'composer install --no-dev --optimize-autoloader --no-interaction',
        'php artisan migrate --force',
        'php artisan config:cache',
        'php artisan route:cache',
        'php artisan view:cache',
    ]).' 2>&1');

    $failed = str_contains(strtolower($output), 'error') ||
              str_contains(strtolower($output), 'fatal');

    // ── Log the result ────────────────────────────────────────
    Log::channel('daily')->info('Deploy webhook fired', [
        'ref' => $payload['ref'] ?? '',
        'commit' => $payload['after'] ?? '',
        'success' => ! $failed,
        'output' => $output,
    ]);

    return response($failed ? '❌ Deploy had errors — check logs' : '✅ Deployed', 200);

});
