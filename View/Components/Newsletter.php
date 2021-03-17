<?php


namespace Modules\Iforms\View\Components;

use Illuminate\View\Component;

class Newsletter extends Component
{

    public $id;
    public $layout;
    public $form;
    public $title;
    public $description;
    public $submitLabel;
    public $view;

    public function __construct($id, $layout = 'newsletter-layout-1', $title, $description = '', $submitLabel = '')
    {
        $this->id = $id;
        $this->layout = $layout ?? 'newsletter-layout-1';
        $this->view = "iforms::frontend.components.newsletter.layouts.{$this->layout}.index";
        $this->title = $title;
        $this->description = $description;
        $this->submitLabel = $submitLabel ?? trans('iforms::forms.button.subscribe');
        $this->getOrAddForm();
    }

    public function getOrAddForm(){
        $params = [
            'include' => ['fields'],
            'filter' => [
                'field' => 'system_name'
            ],
            'fields' => [],
        ];
        $this->form = app('Modules\\Iforms\\Repositories\\FormRepository')->getItem($this->id,json_decode(json_encode($params)));
        if(empty($this->form)){
            $params['filter']['field'] = 'id';
            $this->form = app('Modules\\Iforms\\Repositories\\FormRepository')->getItem($this->id,json_decode(json_encode($params)));
        }
        if(empty($this->form)){
            $formData = [
                'system_name' => is_numeric($this->id) ? istr_slug($this->title) : $this->id ,
                'title' => $this->title,
                'active' => 1,
            ];
            $this->form = app('Modules\\Iforms\\Repositories\\FormRepository')->create($formData);
            $newFieldData = [
                'required' => 1,
                'name' => trans('iforms::fields.form.email.name'),
                'label' => trans('iforms::fields.form.email.label'),
                'placeholder' => trans('iforms::fields.form.email.placeholder'),
                'description' => trans('iforms::fields.form.email.description'),
                'type' => 'email',
                'form_id' => $this->form->id,
            ];
            app('Modules\\Iforms\\Repositories\\FieldRepository')->create($newFieldData);

        }
    }

    public function render()
    {
        return view($this->view);
    }
}
