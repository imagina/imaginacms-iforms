<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => 'iform'], function (Router $router) {
    $router->post('/', [
        'as' => 'iforms.send',
        'uses' => 'FormController@send',
        //'middleware' => config('asgard.iforms.config.middleware'),
    ]);
    $router->group(['prefix' => 'form'], function (Router $router) {
        $router->get('/', [
            'as' => 'iform.api.forms.index',
            'uses' => 'FormController@index',
        ]);
        $router->get('/{param}', [
            'as' => 'iform.api.forms.show',
            'uses' => 'FormController@show',
        ]);

        $router->bind('aiformsform', function ($id) {
            return app(\Modules\Iforms\Repositories\FormRepository::class)->find($id);
        });
        $router->get('{aiformsform}', [
            'as' => 'iform.api.form',
            'uses' => 'FormController@form',
        ]);
        $router->post('/', [
            'as' => 'iform.api.forms.store',
            'uses' => 'FormController@store',
            'middleware' => ['api.token', 'token-can:iforms.forms.create']
        ]);
        $router->put('{aiformsform}', [
            'as' => 'iform.api.forms.update',
            'uses' => 'FormController@update',
            'middleware' => ['api.token', 'token-can:iforms.forms.edit']
        ]);
        $router->delete('{aiformsform}', [
            'as' => 'iform.api.forms.delete',
            'uses' => 'FormController@delete',
            'middleware' => ['api.token', 'token-can:iforms.forms.destroy']
        ]);
    });
    $router->group(['prefix' => 'lead'], function (Router $router) {
        $router->get('/', [
            'as' => 'iform.api.leads.index',
            'uses' => 'LeadController@index',
        ]);
        $router->get('/{param}', [
            'as' => 'iform.api.leads.show',
            'uses' => 'LeadController@show',
        ]);
        $router->bind('aiformslead', function ($id) {
            return app(\Modules\Iforms\Repositories\LeadRepository::class)->find($id);
        });
        $router->get('{aiformslead}', [
            'as' => 'iform.api.lead',
            'uses' => 'LeadController@lead',
        ]);
        $router->post('/', [
            'as' => 'iform.api.leads.store',
            'uses' => 'LeadController@store',
            'middleware' => ['api.token', 'token-can:iforms.leads.create']
        ]);

        $router->put('{aiformslead}', [
            'as' => 'iform.api.leads.update',
            'uses' => 'LeadController@update',
            'middleware' => ['api.token', 'token-can:iforms.leads.edit']
        ]);
        $router->delete('{aiformslead}', [
            'as' => 'iform.api.leads.delete',
            'uses' => 'LeadController@delete',
            'middleware' => ['api.token', 'token-can:iforms.leads.destroy']
        ]);
    });


});