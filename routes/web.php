<?php

 /**
 * @var Illuminate\Routing\Router $router
 */
$router->get('/', function () {
    return view('index');
});

Auth::routes();

//$router->namespace('App\Http\Controllers\Auth')->group(function () use ($router) {
//    $router->get('/login', 'LoginController@showLoginForm')
//        ->name('login')
//        ->middleware(['web', 'auth']);
//
//    $router->post('/login', 'LoginController@login')
//        ->middleware(['web', 'auth']);
//});


$router->get('/admin', 'HomeController@index')->name('home')->middleware(['auth']);

