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

$router->group(['middleware' => 'auth'], function() use ($router) {

    $router->get('/me', [
        'as' => 'me',
        'uses' => 'AuthController@me'
    ]);
});
$router->post('/price', [
    'as' => 'price',
    'uses' => 'PriceController@get',
]);
$router->group(['prefix' => 'order', 'as' => 'order'], function() use ($router) {
    $router->post('/create', [
        'as' => 'order.create',
        'uses' => 'OrderController@create',
    ]);
    $router->get('/code/{code}', [
        'as' => 'order.get.by.code',
        'uses' => 'OrderController@getByCode',
    ]);
    $router->get('/user', [
        'as' => 'order.get.by.user',
        'uses' => 'OrderController@getByUser',
    ]);
});

$router->group(['prefix' => 'auth', 'as' => 'auth'], function() use ($router) {

    /* Defaults */
    $router->post('/register', [
        'as' => 'register',
        'uses' => 'AuthController@register',
    ]);
    $router->post('/login/admin', [
        'as' => 'login',
        'uses' => 'AuthController@loginAdmin',
    ]);
    $router->post('/login', [
        'as' => 'login',
        'uses' => 'AuthController@login',
    ]);
    $router->get('/verify/{token}', [
        'as' => 'verify',
        'uses' => 'AuthController@verify'
    ]);

    /* Password Reset */
    $router->post('/password/forgot', [
        'as' => 'password.forgot',
        'uses' => 'AuthController@forgotPassword'
    ]);
    $router->post('/password/recover/{token}', [
        'as' => 'password.recover',
        'uses' => 'AuthController@recoverPassword'
    ]);
    $router->post('/password/change', [
        'as' => 'password.change',
        'uses' => 'AuthController@changePassword'
    ]);

    /* Protected User Endpoint */
    $router->get('/user', [
        'uses' => 'AuthController@getUser',
        'as' => 'user',
        'middleware' => 'auth'
    ]);
});
