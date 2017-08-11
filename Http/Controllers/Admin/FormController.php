<?php

namespace Modules\Iforms\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Iforms\Entities\Form;
use Modules\Iforms\Repositories\FormRepository;

use Modules\Iforms\Http\Requests\FormRequest as UpdateRequest;
use Modules\Iforms\Http\Requests\FormRequest as StoreRequest;

use Modules\Bcrud\Http\Controllers\BcrudController;
use Modules\User\Contracts\Authentication;

class FormController extends BcrudController
{
    /**
     * @var formRepository
     */
    private $form;
    private $auth;

    public function __construct(Authentication $auth)
    {
        parent::__construct();

        $this->auth = $auth;

        $driver = config('asgard.user.config.driver');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('Modules\Iforms\Entities\Form');
        $this->crud->setRoute('backend/iforms/form');
        $this->crud->setEntityNameStrings(trans('iforms::form.single'), trans('iforms::form.plural'));
        $this->access = [];


        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */
        // ------ CRUD COLUMNS
        $this->crud->addColumn([
            'name' => 'id',
            'label' => 'ID',
        ]);


        $this->crud->addColumn([
            'name' => 'title',
            'label' => trans('iforms::common.title'),
        ]);


        $this->crud->addColumn([  // Select
            'name' => 'user_id', // the db column for the foreign key
            'label' => trans('iforms::common.form_user'),
            'type' => 'select',
            'entity' => 'user', // the method that defines the relationship in your Model
            'attribute' => 'email', // foreign key attribute that is shown to user
            'model' => "Modules\\User\\Entities\\{$driver}\\User" // foreign key model
        ]);

        $this->crud->addColumn([
            'name' => 'created_at',
            'label' => trans('iforms::common.created_at'),
        ]);

        // ------ CRUD FIELDS
        $this->crud->addField([
            'name' => 'title',
            'label' => trans('iforms::common.title'),
        ]);

        $this->crud->addField([
            'name' => 'destination_email',
            'type' => 'email',
            'label' => trans('iforms::common.to'),
            'fake' => true,
            'store_in' => 'options',
        ]);

        $this->crud->addField([ // Table
            'name' => 'fields',
            'label' => trans('iforms::common.fields'),
            'type' => 'table',
            'entity_singular' => 'field', // used on the "Add X" button
            'columns' => [
                'name' => 'Name',
                'label' => 'Label',
                'type' => 'Type',
                'description' => 'Description'
            ],
            'max' => 100, // maximum rows allowed in the table
            'min' => 0 // minimum rows allowed in the table
        ]);



        // ------ CRUD FIELDS
        $this->crud->addField([  // Select
            'name' => 'user_id', // the db column for the foreign key
            'label' => trans('iforms::common.form_user'),
            'type' => 'select',
            'entity' => 'user', // the method that defines the relationship in your Model
            'attribute' => 'email', // foreign key attribute that is shown to user
            'model' => "Modules\\User\\Entities\\{$driver}\\User" // foreign key model
        ]);

    }


    public function setup()
    {
        parent::setup();

        $permissions = ['index', 'create', 'edit', 'destroy'];
        $allowpermissions = [];
        foreach($permissions as $permission) {

            if($this->auth->hasAccess("iforms.forms.$permission")) {
                if($permission=='index') $permission = 'list';
                if($permission=='edit') $permission = 'update';
                if($permission=='destroy') $permission = 'delete';
                $allowpermissions[] = $permission;
            }

        }

        $this->crud->access = $allowpermissions;
    }



    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }



    public function update(UpdateRequest $request)
    {
        return parent::updateCrud($request);
    }



}
