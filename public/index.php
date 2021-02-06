<?php
/**
 * User: monir-dev
 * Date: 7/7/2020
 * Time: 9:57 AM
 */

use app\controllers\AboutController;
use app\controllers\SiteController;
use app\controllers\AccountController;
use app\monirdev\phpcore\Application;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);
$app->on(Application::EVENT_BEFORE_REQUEST, function(){
    //echo "Before request from second installation";
});



$app->router->get('/register', [AccountController::class, 'register']);
$app->router->post('/register', [AccountController::class, 'register']);
$app->router->get('/login', [AccountController::class, 'login']);
$app->router->post('/login', [AccountController::class, 'login']);
$app->router->get('/logout', [AccountController::class, 'logout']);
$app->router->get('/profile', [AccountController::class, 'profile']);

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->get('/about', [AboutController::class, 'index']);


$app->run();