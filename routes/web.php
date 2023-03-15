<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api','middleware' => 'auth'], function () use ($router) {
    $router->post('tasks/list', 'TaskController@index');
    $router->post('tasks/create', 'TaskController@store');
    $router->post('tasks/update', 'TaskController@update');
    $router->post('tasks/get-task', 'TaskController@show');
    $router->post('tasks/delete', 'TaskController@destroy');
});
