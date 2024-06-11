<?php

namespace Modules\Iforms\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Form extends Component
{

  public $id;
  public $layout;
  public $fieldsParams;
  public $form;
  public $fields;
  public $formId;
  public $formRepository;
  public $livewireSubmitEvent;
  public $view;
  public $jsSubmitEvent;
  public $central;
  public $title;
  public $subtitle;
  public $withTitle;
  public $withSubtitle;
  public $AlainTitle;
  public $AlainSubtitle;
  public $fontSizeTitle;
  public $fontSizeSubtitle;
  public $colorTitle;
  public $colorSubtitle;
  public $colorTitleByClass;
  public $colorSubtitleByClass;
  public $buttonAlign;
  public $buttonClass;
  public $buttonText;
  public $buttonIcon;
  public $titleClass;
  public $subtitleClass;
  public $titleStyle;
  public $subtitleStyle;

  public function __construct($id, $layout = 'form-layout-1', $livewireSubmitEvent = null, $params = [],
                              $fieldsParams = [], $formId = null, $jsSubmitEvent = null, $central = true,
                              $title = null, $subtitle = null, $withTitle = false,
                              $withSubtitle = false, $fontSizeTitle = "24", $fontSizeSubtitle = "14",
                              $colorTitle = null, $colorSubtitle = null, $AlainTitle = "text-left",
                              $AlainSubtitle = "text-left", $colorTitleByClass = "text-primary",
                              $colorSubtitleByClass = "text-dark", $buttonAlign = "text-right",
                              $buttonClass = "btn btn-primary", $buttonText = null, $buttonIcon = null,
                              $titleClass = "", $subtitleClass = "", $titleStyle = "", $subtitleStyle = ""
  )
  {
    $this->id = $id;
    $this->layout = $layout ?? 'form-layout-1';
    $this->fieldsParams = $fieldsParams ?? [];
    $this->view = "iforms::frontend.components.form.layouts.{$this->layout}.index";
    $this->formRepository = app('Modules\\Iforms\\Repositories\\FormRepository');
    $this->params = $params;
    $this->central = $central;
    $this->buttonAlign = $buttonAlign;
    $this->buttonClass = $buttonClass;
    $this->buttonText = $buttonText ?? trans('iforms::forms.form.submit');
    $this->buttonIcon = $buttonIcon;
    $this->titleClass = $titleClass;
    $this->subtitleClass = $subtitleClass;
    $this->titleStyle = $titleStyle;
    $this->subtitleStyle = $subtitleStyle;
    $this->getForm();

    if (isset($this->form->id)) {

      $this->fields = $this->form->fields->where("visibility", "!=", "internal");

    }

    $this->livewireSubmitEvent = $livewireSubmitEvent ?? null;
    $this->jsSubmitEvent = $jsSubmitEvent ?? null;
    $this->title = $title ?? $this->form->title ?? trans('iforms::forms.form.formDefault.title');
    $this->subtitle = $subtitle ?? $this->form->description ?? trans('iforms::forms.form.formDefault.subtitle');
    $this->withTitle = $withTitle;
    $this->withSubtitle = $withSubtitle;
    $this->fontSizeTitle = $fontSizeTitle;
    $this->fontSizeSubtitle = $fontSizeSubtitle;
    $this->colorTitle = $colorTitle;
    $this->colorSubtitle = $colorSubtitle;
    $this->AlainTitle = $AlainTitle;
    $this->AlainSubtitle = $AlainSubtitle;
    $this->colorTitleByClass = $colorTitleByClass;
    $this->colorSubtitleByClass = $colorSubtitleByClass;
  }

  public function getForm()
  {

    $params = $this->makeParamsFunction();

    if ($this->central) {
      $params["filter"]["notOrganization"] = true;
    } else {
      $params["filter"]["organizationId"] = tenant()->id;
    }

    $this->form = $this->formRepository->getItem($this->id, json_decode(json_encode($params)));
    if (!isset($this->form->id)) {
      $params['filter']['field'] = 'system_name';
      $this->form = $this->formRepository->getItem($this->id, json_decode(json_encode($params)));
    }
    if (isset($this->form->id)) {
      $this->formId = Str::slug($this->form->system_name, '_') . ($formId ?? '');
    }

  }

  private function makeParamsFunction()
  {
    return [
      "include" => $this->params["include"] ?? null,
      "fields" => [],
      "take" => $this->params["take"] ?? false,
      "page" => $this->params["page"] ?? false,
      "filter" => $this->params["filter"] ?? [],
      "order" => $this->params["order"] ?? null
    ];
  }

  public function render()
  {
    if (isset($this->form->id)) {
      return view($this->view);
    } else {
      return view('iforms::frontend.components.form.layouts.form-layout-error.index');
    }
  }
}
