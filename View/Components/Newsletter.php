<?php


namespace Modules\Iforms\View\Components;

use Illuminate\View\Component;

class Newsletter extends Component
{

    public $id;
    public $layout;
    public $form;
    public $view;

    public function __construct($id, $layout = 'newsletter-layout-1')
    {
        $this->id = $id;
        $this->layout = $layout ?? 'newsletter-layout-1';
        $this->view = "iforms::frontend.components.newsletter.layouts.{$this->layout}.index";
    }

    public function getForm(){
        $params = [
            'include' => ['fields']
        ];
        $this->form = app('Modules\\Iforms\\Repository\\FormRepository')->getItem($this->id,json_decode(json_encode($params)));
    }

    public function render()
    {
        return view($this->view);
    }
}
