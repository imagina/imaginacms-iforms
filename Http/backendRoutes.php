<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/iforms'], function (Router $router) {

    \CRUD::resource('iforms','form', 'FormController');
    \CRUD::resource('iforms','lead', 'LeadController');

});


