<?php
require '../vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

require ('../app/container.php');

$app->get('/', \App\Controllers\PagesController::class . ':home')->setName('root');
$app->get('/register', \App\Controllers\PagesController::class . ':register')->setName('register');
$app->post('/register', \App\Controllers\PagesController::class . ':postregister');

$app->run();