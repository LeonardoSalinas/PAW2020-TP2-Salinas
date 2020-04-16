<?php

include 'core/Router.php';
include 'core/Request.php';
include 'controllers/FormController.php';
include 'controllers/TurnosListController.php';
use App\core\Router;
use App\core\Request;


$router = new Router;
$router->define([
    'GET /' => 'FormController@index',
    'GET /turnos_list' => 'TurnosListController@list',
  //  'POST /save_task' => 'TaskController@save',
  // 'GET /fichaview' => 'TurnosListController@ficha',
  //  'POST /save_config' => 'ConfigController@save',
]);

$request = new Request;