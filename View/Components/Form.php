<?php


namespace Modules\Iforms\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Form extends Component
{

    public $id;
    public $layout;
    public $form;
    public $formId;
    public $formRand;
    public $formRepository;
    public $view;

    public function __construct($id, $layout = 'form-layout-1', $params = [])
    {
        $this->id = $id;
        $this->layout = $layout ?? 'form-layout-1';
        $this->view = "iforms::frontend.components.form.layouts.{$this->layout}.index";
        $this->formRepository = app('Modules\\Iforms\\Repositories\\FormRepository');
        $this->getForm();
        $this->formRand = rand(0,100);
        $this->formId = Str::slug($this->form->system_name).$this->formRand;
    }

    public function getForm(){

       $params = $this->makeParamsFunction();

       $this->form = $this->formRepository->getItem($this->id, json_decode(json_encode($params)));
    }

    private function makeParamsFunction(){

        return [
            "include" => $this->params["include"] ?? ["*"],
            "fields" => [],
            "take" => $this->params["take"] ?? false,
            "page" => $this->params["page"] ?? false,
            "filter" => $this->params["filter"] ?? [],
            "order" => $this->params["order"] ?? null
        ];
    }


    public function render()
    {
        return view($this->view);
    }
}
