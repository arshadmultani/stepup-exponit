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

set('copy_dirs', [
    'public/build',
]);
// Hosts

host('exponit.com')
    ->set('remote_user', 'exponit')
    ->set('deploy_path', '~/exponitlabs')
    ->set('port', 22999)
    ->setIdentityFile('~/.ssh/cpanel_deploy')
    ->set('writable_mode', 'skip');

// Hooks

before('deploy:update_code', function () {

    runLocally('npm ci');

    runLocally('npm run build');

});

after('deploy:failed', 'deploy:unlock');
