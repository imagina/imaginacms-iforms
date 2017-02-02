<?php

namespace Modules\Iforms\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Modules\Bcrud\Http\Requests\CrudRequest;
use Modules\Iforms\Http\Requests\LeadRequest;
use Modules\Bcrud\Http\Controllers\BcrudController;

use Modules\Iforms\Entities\Form as Form;
use Modules\Iforms\Repositories\FormRepository;
use Modules\User\Contracts\Authentication;
use Modules\User\Repositories\UserRepository;


class LeadController extends BcrudController
{
    /**
     * @var formRepository
     */
    private $lead;
    private $auth;
    private $user;
    private $form;

    public function __construct(Authentication $auth)
    {

        parent::__construct();
        $this->auth = $auth;


        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('Modules\Iforms\Entities\Lead');
        $this->crud->setRoute('backend/iforms/lead');
        $this->crud->setEntityNameStrings(trans('iforms::lead.single'), trans('iforms::lead.plural'));

        $this->crud->enableExportButtons();

        //$this->crud->enableAjaxTable();



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


        $this->user = $this->auth->user();

        //Get form
        $form_id = \Request::get('form_id');

        //Get the form to show records
        if(!empty($form_id)) {
            $this->form = Form::find($form_id);
        } else {
            $this->form = Form::query()->where('user_id', $this->user->id)->firstOrFail();
        }

        //Last resort, get the first form in DB.
        if(!isset($this->form)) $this->form = Form::first();

        if(!$this->form) return;

        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */


        // ------ CRUD COLUMNS
        $this->crud->addColumn([
            'name' => 'id',
            'label' => 'Id',
        ]);


        $this->crud->addField([  // Select
            'name' => 'form_id', // the db column for the foreign key
            'label' => trans("iforms::form.single"),
            'type' => 'select',
            'entity' => 'form', // the method that defines the relationship in your Model
            'attribute' => 'title', // foreign key attribute that is shown to user
            'model' => "Modules\\Iforms\\Entities\\Form" // foreign key model
        ]);


        if(is_string($this->form->fields)) $this->form->fields = json_decode($this->form->fields);


        /* Dynamically add fields and columns according to the Form */

        foreach($this->form->fields as $field) {

            // ------ CRUD COLUMNS
            $this->crud->addColumn([
                'name' => $field['name'],
                'label' => $field['label'],
                'fake' => true,
                'store_in' => 'options'
            ]);


            // ------ CRUD FIELDS
            $this->crud->addField([
                'name' => $field['name'],
                'label' => $field['label'],
                'fake' => true,
                'store_in' => 'options'
            ]);
        }




        $this->crud->addFilter([ // select2 filter
            'name' => 'form_id',
            'label'=> trans("iforms::form.single"),
            'type' => 'select2',

        ], function() {
            return Form::all()->pluck('title', 'id')->toArray();
        }, function($value) { // if the filter is active
            $this->crud->addClause('where', 'form_id', $value);
        });


    }




    /**
     * Display all rows in the database for this entity.
     *
     * @return Response
     */
    public function index()
    {


        if($this->form) {

            $this->data['crud'] = $this->crud;
            $this->data['title'] = ucfirst($this->crud->entity_name_plural);


            // get all entries if AJAX is not enabled
            if (! $this->data['crud']->ajaxTable()) {
                $this->data['entries'] = $this->data['crud']->getEntries();
            }

            // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
            // $this->crud->getListView() returns 'list' by default, or 'list_ajax' if ajax was enabled
            return view('bcrud::list', $this->data);
        }





    }


    public function store(CrudRequest $request)
    {
        return parent::storeCrud($request);
    }



    public function update(CrudRequest $request)
    {
        return parent::updateCrud($request);
    }



}
