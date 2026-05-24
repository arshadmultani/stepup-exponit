<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/arshadmultani/exponitlabs.git');

set('writable_mode', 'chmod');

set('shared_files', [
    '.env',
]);
set('shared_dirs', [
    'storage',
]);
set('writable_dirs', [
    'storage',
    'bootstrap/cache',
]);
// Hosts

host('exponit.com')
    ->set('remote_user', 'exponit')
    ->set('deploy_path', '~/exponitlabs')
    ->set('port', 22999)
    ->set('writable_mode', 'skip');

// Hooks

after('deploy:failed', 'deploy:unlock');
