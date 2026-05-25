<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use ZipArchive;

#[Signature('backup:telegram')]
#[Description('Zip database and uploads, send to Telegram')]
class SendBackupToTelegram extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $token = config('services.telegram_backup.token');
        $chatId = config('services.telegram_backup.chat_id');
        $date = now()->format('Y-m-d_H-i');
        $zipPath = storage_path("app/backup-{$date}.zip");

        $this->info('Creating zip...');

        $zip = new ZipArchive;
        $zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        // Add SQLite database
        $dbPath = database_path('database.sqlite');
        if (file_exists($dbPath)) {
            $zip->addFile($dbPath, 'database.sqlite');
        }
        // Add uploaded files
        $uploadsPath = storage_path('app/public');
        if (is_dir($uploadsPath)) {
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($uploadsPath)
            );
            foreach ($files as $file) {
                if (! $file->isDir()) {
                    $relativePath = 'uploads/'.substr($file->getPathname(), strlen($uploadsPath) + 1);
                    $zip->addFile($file->getPathname(), $relativePath);
                }
            }
        }

        $zip->close();

        $this->info('Sending to Telegram...');

        $response = Http::attach(
            'document',
            file_get_contents($zipPath),
            "backup-{$date}.zip"
        )->post("https://api.telegram.org/bot{$token}/sendDocument", [
            'chat_id' => $chatId,
            'caption' => "🗄 Backup — {$date}",
        ]);

        // Clean up local zip
        unlink($zipPath);

        if ($response->successful()) {
            $this->info('Backup sent to Telegram successfully.');
        } else {
            $this->error('Failed: '.$response->body());
        }

    }
}
