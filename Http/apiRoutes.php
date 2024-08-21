<?php

use Illuminate\Routing\Router;

$router->group(['prefix' =>'/iform/v4'], function (Router $router) {
    

    $router->apiCrud([
      'module' => 'iforms',
      'prefix' => 'forms',
      'controller' => 'FormApiController',
      'middleware' => ['show' => []],
      'customRoutes' => [ // Include custom routes if needed
        [
          'method' => 'put', // get,post,put....
          'path' => '/fields', // Route Path
          'uses' => 'FieldApiController@batchUpdate' //Name of the controller method to use
        ],
        [
          'method' => 'put', // get,post,put....
          'path' => '/blocks', // Route Path
          'uses' => 'BlockApiController@batchUpdate' //Name of the controller method to use
        ]
      ]
    ]);

    $router->apiCrud([
      'module' => 'iforms',
      'prefix' => 'fields',
      'controller' => 'FieldApiController',
      'middleware' => ['index' => [], 'show' => []],
      'customRoutes' => [ // Include custom routes if needed
        [
          'method' => 'post', // get,post,put....
          'path' => '/updateOrders', // Route Path
          'uses' => 'FieldApiController@batchUpdate' //Name of the controller method to use
        ]
      ]
    ]);

    $router->apiCrud([
      'module' => 'iforms',
      'prefix' => 'blocks',
      'controller' => 'BlockApiController',
      'middleware' => ['index' => [], 'show' => []]
      // 'customRoutes' => [ // Include custom routes if needed
      //  [
      //    'method' => 'post', // get,post,put....
      //    'path' => '/some-path', // Route Path
      //    'uses' => 'ControllerMethodName', //Name of the controller method to use
      //    'middleware' => [] // if not set up middleware, auth:api will be the default
      //  ]
      // ]
    ]);

    $router->apiCrud([
      'module' => 'iforms',
      'prefix' => 'leads',
      'controller' => 'LeadApiController',
      'middleware' => ['create' => ['captcha']]
      // 'customRoutes' => [ // Include custom routes if needed
      //  [
      //    'method' => 'post', // get,post,put....
      //    'path' => '/some-path', // Route Path
      //    'uses' => 'ControllerMethodName', //Name of the controller method to use
      //    'middleware' => [] // if not set up middleware, auth:api will be the default
      //  ]
      // ]
    ]);

    $router->apiCrud([
      'module' => 'iforms',
      'prefix' => 'types',
      'staticEntity' => "Modules\Iforms\Entities\Type",
      'use' => ['index' => 'getAllTypes', 'show' => 'get']
    ]);

    $router->apiCrud([
      'module' => 'iforms',
      'prefix' => 'form-types',
      'staticEntity' => "Modules\Iforms\Entities\FormType",
      'use' => ['index' => 'getAllTypes', 'show' => 'get']
    ]);
// append




});
