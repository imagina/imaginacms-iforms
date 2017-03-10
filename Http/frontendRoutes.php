<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => 'iforms'], function (Router $router) {

    $locale = LaravelLocalization::setLocale() ?: App::getLocale();

    $router->post('/lead', [
        'as' => $locale.'.iforms.lead',
        'uses' => 'PublicController@store',
        //'middleware' => config('asgard.blog.config.middleware'),
    ]);

});
