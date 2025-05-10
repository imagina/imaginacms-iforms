<?php

use Modules\Iforms\Entities\Form;

if (! function_exists('iform')) {
    function iform($id, $template, $options = [])
    {
        $default_options = ['rand' => rand(0, 100)];
        $options = array_merge($default_options, $options);

        $iform = Form::find($id);

        $view = View::make($template)
            ->with([
                'form' => $iform,
                'options' => $options,
            ]);

        return $view->render();
    }
}

if (!function_exists('iforms_findFieldByName')) {
  function iforms_findFieldByName(array $names): array
  {
    $fieldRepository = app('Modules\Iforms\Repositories\FieldRepository');
    $params = [
      'filter' => [
        'name' => $names,
      ],
    ];
    $fields = $fieldRepository->getItemsBy(json_decode(json_encode($params)));
    return $fields->keyBy('name')->all(); // Devuelve: name => fieldObject
  }
}
