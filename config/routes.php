<?php

require_once __DIR__ . '/../vendor/pecee/simple-router/helpers.php';

use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::setDefaultNamespace('\App\Controllers');

SimpleRouter::get('/', 'HomeController@index')->name('home');
SimpleRouter::get('/login', 'Auth\LoginController@index')->name('login');
SimpleRouter::post('/login', 'Auth\LoginController@login')->name('login');

SimpleRouter::group(['middleware' => \App\Middlewares\AuthMiddleware::class], function () {
    SimpleRouter::get('/logout', 'Auth\LoginController@logout')->name('logout');
    SimpleRouter::post('/get_prize', 'PrizeController@getPrize')->name('prize');
});

SimpleRouter::error(function (Request $request, \Exception $exception) {
    if ($exception instanceof \App\Validator\ValidateException) {
        flash('errors', $exception->getFields());
    } else {
        flash('errors', $exception->getMessage());
    }
    response()->redirect($request->getReferer());
});

SimpleRouter::start();