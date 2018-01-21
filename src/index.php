<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
session_start();

define('DS', DIRECTORY_SEPARATOR);
define('WWW_ROOT', __DIR__ . DS);

$routes = array(
  'home' => array(
    'controller' => 'Pages',
    'action' => 'index'
  ),
  'programma' => array(
    'controller' => 'Events',
    'action' => 'index'
  ),
  'over-de-week' => array(
    'controller' => 'Pages',
    'action' => 'overDeWeek'
  ),
  'over-de-acties' => array(
    'controller' => 'Pages',
    'action' => 'overDeActies'
  ),
  'nieuws' => array(
    'controller' => 'Pages',
    'action' => 'index'
  ),
  'event-detail' => array(
    'controller' => 'Events',
    'action' => 'detail'
  ),
);

if(empty($_GET['page'])) {
  $_GET['page'] = 'home';
}
if(empty($routes[$_GET['page']])) {
  header('Location: index.php');
  exit();
}

$route = $routes[$_GET['page']];
$controllerName = $route['controller'] . 'Controller';

require_once WWW_ROOT . 'controller' . DS . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();
