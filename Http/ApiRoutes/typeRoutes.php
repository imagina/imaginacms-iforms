<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'types'], function (Router $router) {

  //Route index
  $router->get('/', [
    'as' => 'api.iform.types.index',
    'uses' => 'TypeApiController@index',
    //'middleware' => ['auth:api']
  ]);

});

