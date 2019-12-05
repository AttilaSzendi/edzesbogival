<?php

 /**
 * @var Illuminate\Routing\Router $router
 */
$router->get('/', function () {
    return view('index');
});

Auth::routes();

//$router->get('/admin', 'HomeController@index')->name('home')->middleware(['auth']);

$router->get('/home', 'HomeController@index')->name('home')->middleware('auth');

$router->group(['middleware' => 'auth'], function () use ($router) {
		$router->get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
		$router->get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
		$router->get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
		$router->get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
		$router->get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
		$router->get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
		$router->get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
});

$router->group(['middleware' => 'auth'], function () use ($router) {
	$router->resource('user', 'UserController', ['except' => ['show']]);
	$router->get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	$router->put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	$router->put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

