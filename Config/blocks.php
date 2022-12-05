<?php

$vAttributes = include(base_path() . '/Modules/Isite/Config/standardValuesForBlocksAttributes.php');

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
          "withTitle" => [
            "name" => "withTitle",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Titulo",
              "options" => $vAttributes["validation"]
            ]
          ],
          "title" => [
            "name" => "title",
            "type" => "input",
            "props" => [
              "label" => "titulo"
            ]
          ],
          "AlainTitle" => [
            "name" => "AlainTitle",
            "value" => "text-left",
            "type" => "select",
            "props" => [
              "label" => "Alineación del titulo",
              "options" => [
                ["label" => "Alineación a la Izquierda", "value" => "text-left"],
                ["label" => "Alineación a la Derecha", "value" => "text-right"],
                ["label" => "Alineación Centrado", "value" => "text-center"],
              ]
            ]
          ],
          "withSubtitle" => [
            "name" => "withSubtitle",
            "value" => "1",
            "type" => "select",
            "props" => [
              "label" => "Mostrar Subtitulo",
              "options" => $vAttributes["validation"]
            ]
          ],
          "subtitle" => [
            "name" => "subtitle",
            "type" => "input",
            "props" => [
              "label" => "subtitle"
            ]
          ],
          "AlainSubtitle" => [
            "name" => "AlainSubtitle",
            "value" => "text-left",
            "type" => "select",
            "props" => [
              "label" => "Alineación del subtitulo",
              "options" => [
                ["label" => "Alineación a la Izquierda", "value" => "text-left"],
                ["label" => "Alineación a la Derecha", "value" => "text-right"],
                ["label" => "Alineación Centrado", "value" => "text-center"],
              ]
            ]
          ],
          "fontSizeTitle" => [
            "name" => "fontSizeTitle",
            "type" => "input",
            "props" => [
              "label" => "Tamaño de fuente Titulo Principal",
              "type" => "number"
            ]
          ],
          "colorTitle" => [
            "name" => "colorTitle",
            "type" => "inputColor",
            "props" => [
              "label" => "Color Titulo Principal"
            ]
          ],
          "fontSizeSubtitle" => [
            "name" => "fontSizeSubtitle",
            "type" => "input",
            "props" => [
              "label" => "Tamaño de fuente Subtitulo",
              "type" => "number"
            ]
          ],
          "colorSubtitle" => [
            "name" => "colorSubtitle",
            "type" => "inputColor",
            "props" => [
              "label" => "Color Subtitulo"
            ]
          ],
          "colorTitleByClass" => [
            "name" => "colorTitleByClass",
            "value" => "text-primary",
            "type" => "select",
            "props" => [
              "label" => "Color del Titulo",
              "options" => [
                ["label" => "Texto en Color Primario", "value" => "text-primary"],
                ["label" => "Texto en Color Secundario", "value" => "text-secondary"],
                ["label" => "Texto en Color Negro", "value" => "text-dark"],
                ["label" => "Texto en Color Blanco", "value" => "text-white"],
              ]
            ]
          ],
          "colorSubtitleByClass" => [
            "name" => "colorSubtitleByClass",
            "value" => "text-primary",
            "type" => "select",
            "props" => [
              "label" => "Color del Subtitulo",
              "options" => [
                ["label" => "Texto en Color Primario", "value" => "text-primary"],
                ["label" => "Texto en Color Secundario", "value" => "text-secondary"],
                ["label" => "Texto en Color Negro", "value" => "text-dark"],
                ["label" => "Texto en Color Blanco", "value" => "text-white"],
              ]
            ]
          ],
        ]
      ],
    ]
  ],
];