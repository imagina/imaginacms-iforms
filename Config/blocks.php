<?php

return [
  "form" => [
    "title" => "Formulario",
    "systemName" => "iforms::form",
    "nameSpace" => "Modules\Iforms\View\Components\Form",
    "attributes" => [
      "general" => [
        "title" => "General",
        "fields" => [
          "id" => [
            "name" => "id",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Plantilla Para Formulario",
            ],
            "loadOptions" => [
              "apiRoute" => "apiRoutes.qform.forms",
              "select" => ["label" => "title", "id" => "id"]
            ]
          ],
          "layout" => [
            "name" => "layout",
            "value" => "form-layout-1",
            "type" => "select",
            "props" => [
              "label" => "Plantilla Para Formulario",
              "options" => [
                ["label" => "Formulario Plantilla 1", "value" => "form-layout-1"],
                ["label" => "Formulario Plantilla 2", "value" => "form-layout-2"],
                ["label" => "Formulario Plantilla 3", "value" => "form-layout-3"],
              ]
            ]
          ],
        ]
      ],
    ]
  ],
];