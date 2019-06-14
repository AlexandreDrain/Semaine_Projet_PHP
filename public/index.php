<?php
session_start();
require dirname(__DIR__) . '/autoload.php';
// Appel du routeur
use src\Utilities\Router;

$router = new Router();
$router->addRoute('/','index.php');
$router->addRoute('/inscription', 'register.php');
$router->addRoute('/services', 'service.php');
$router->addRoute('/sign-in', 'sign_in.php');
$router->addRoute('/Deconnexion', 'deconnexion.php');
$router->addRoute('/Pages_des_garagistes', 'garagistePage.php');

$templates = $router->match();

if(is_null($templates))
{

	throw new \Exception('Page introuvable');
} else {

	require dirname(__DIR__) . "/templates/" . $templates;
}