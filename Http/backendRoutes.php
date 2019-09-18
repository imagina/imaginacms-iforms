<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/iform'], function (Router $router) {
    $router->bind('form', function ($id) {
        return app('Modules\Iform\Repositories\FormRepository')->find($id);
    });
    $router->get('forms', [
        'as' => 'admin.iform.form.index',
        'uses' => 'FormController@index',
        'middleware' => 'can:iform.forms.index'
    ]);
    $router->get('forms/create', [
        'as' => 'admin.iform.form.create',
        'uses' => 'FormController@create',
        'middleware' => 'can:iform.forms.create'
    ]);
    $router->post('forms', [
        'as' => 'admin.iform.form.store',
        'uses' => 'FormController@store',
        'middleware' => 'can:iform.forms.create'
    ]);
    $router->get('forms/{form}/edit', [
        'as' => 'admin.iform.form.edit',
        'uses' => 'FormController@edit',
        'middleware' => 'can:iform.forms.edit'
    ]);
    $router->put('forms/{form}', [
        'as' => 'admin.iform.form.update',
        'uses' => 'FormController@update',
        'middleware' => 'can:iform.forms.edit'
    ]);
    $router->delete('forms/{form}', [
        'as' => 'admin.iform.form.destroy',
        'uses' => 'FormController@destroy',
        'middleware' => 'can:iform.forms.destroy'
    ]);
    $router->bind('field', function ($id) {
        return app('Modules\Iform\Repositories\FieldRepository')->find($id);
    });
    $router->get('fields', [
        'as' => 'admin.iform.field.index',
        'uses' => 'FieldController@index',
        'middleware' => 'can:iform.fields.index'
    ]);
    $router->get('fields/create', [
        'as' => 'admin.iform.field.create',
        'uses' => 'FieldController@create',
        'middleware' => 'can:iform.fields.create'
    ]);
    $router->post('fields', [
        'as' => 'admin.iform.field.store',
        'uses' => 'FieldController@store',
        'middleware' => 'can:iform.fields.create'
    ]);
    $router->get('fields/{field}/edit', [
        'as' => 'admin.iform.field.edit',
        'uses' => 'FieldController@edit',
        'middleware' => 'can:iform.fields.edit'
    ]);
    $router->put('fields/{field}', [
        'as' => 'admin.iform.field.update',
        'uses' => 'FieldController@update',
        'middleware' => 'can:iform.fields.edit'
    ]);
    $router->delete('fields/{field}', [
        'as' => 'admin.iform.field.destroy',
        'uses' => 'FieldController@destroy',
        'middleware' => 'can:iform.fields.destroy'
    ]);
    $router->bind('lead', function ($id) {
        return app('Modules\Iform\Repositories\LeadRepository')->find($id);
    });
    $router->get('leads', [
        'as' => 'admin.iform.lead.index',
        'uses' => 'LeadController@index',
        'middleware' => 'can:iform.leads.index'
    ]);
    $router->get('leads/create', [
        'as' => 'admin.iform.lead.create',
        'uses' => 'LeadController@create',
        'middleware' => 'can:iform.leads.create'
    ]);
    $router->post('leads', [
        'as' => 'admin.iform.lead.store',
        'uses' => 'LeadController@store',
        'middleware' => 'can:iform.leads.create'
    ]);
    $router->get('leads/{lead}/edit', [
        'as' => 'admin.iform.lead.edit',
        'uses' => 'LeadController@edit',
        'middleware' => 'can:iform.leads.edit'
    ]);
    $router->put('leads/{lead}', [
        'as' => 'admin.iform.lead.update',
        'uses' => 'LeadController@update',
        'middleware' => 'can:iform.leads.edit'
    ]);
    $router->delete('leads/{lead}', [
        'as' => 'admin.iform.lead.destroy',
        'uses' => 'LeadController@destroy',
        'middleware' => 'can:iform.leads.destroy'
    ]);
// append



});
