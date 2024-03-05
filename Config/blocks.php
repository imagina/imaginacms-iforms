<?php

$vAttributes = include(base_path() . '/Modules/Isite/Config/standardValuesForBlocksAttributes.php');

return [
  "form" => [
    "title" => "Formulario",
    "systemName" => "iforms::form",
    "nameSpace" => "Modules\Iforms\View\Components\Form",
    "contentFields" => [
      "title" => [
        "name" => "title",
        "type" => "input",
        "columns" => "col-12",
        "isTranslatable" => true,
        "props" => [
          "label" => "Titulo del Formulario"
        ]
      ],
      "subtitle" => [
        "name" => "subtitle",
        "type" => "input",
        "columns" => "col-12",
        "isTranslatable" => true,
        "props" => [
          "label" => "Subtitle del Formulario"
        ]
      ],
      "buttonText" => [
        "name" => "buttonText",
        "type" => "input",
        "columns" => "col-12",
        "isTranslatable" => true,
        "props" => [
            "label" => "Texto del Boton del Formulario"
        ]
      ],
    ],
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
      "title" => [
        "title" => "Titulo",
        "fields" => [
            "withTitle" => [
                "name" => "withTitle",
                "value" => "1",
                "type" => "select",
                "props" => [
                    "label" => "Mostrar Titulo",
                    "options" => $vAttributes["validation"]
                ]
            ],
            "fontSizeTitle" => [
                "name" => "fontSizeTitle",
                "type" => "input",
                "props" => [
                    "label" => "Tamaño de fuente",
                    "type" => "number"
                ]
            ],
            "AlainTitle" => [
                "name" => "AlainTitle",
                "columns" => "col-12",
                "value" => "text-left",
                "type" => "select",
                "props" => [
                    "label" => "Alineación",
                    "options" => $vAttributes["textAlign"]
                ]
            ],
            "colorTitleByClass" => [
                "name" => "colorTitleByClass",
                "type" => "select",
                "props" => [
                    "label" => "Color Class",
                    "options" => $vAttributes["textColors"]
                ]
            ],
            "colorTitle" => [
                "name" => "colorTitle",
                "type" => "inputColor",
                "props" => [
                    "label" => "Color Custom",
                ],
                "help" => [
                    "description" => "Selecciona el color Custom en Color Class para activarlo",
                ]
            ],
            "titleClass" => [
                "name" => "titleClass",
                "type" => "input",
                "columns" => "col-12",
                "props" => [
                    "label" => "Clases",
                ],
            ],
            "titleStyle" => [
                "name" => "titleStyle",
                "type" => "input",
                "columns" => "col-12",
                "props" => [
                    "label" => "Estilo",
                    'type' => 'textarea',
                    'rows' => 5,
                ],
                "help" => [
                    "description" => "Permite agregar estilos adicionales en titulo",
                ]
            ],
        ]
      ],
      "subtitle" => [
        "title" => "Subtitulos",
        "fields" => [
            "withSubtitle" => [
                "name" => "withSubtitle",
                "value" => "1",
                "type" => "select",
                "props" => [
                    "label" => "Mostrar Subtitulo",
                    "options" => $vAttributes["validation"]
                ]
            ],
            "fontSizeSubtitle" => [
                "name" => "fontSizeSubtitle",
                "type" => "input",
                "props" => [
                    "label" => "Tamaño de fuente",
                    "type" => "number"
                ]
            ],
            "AlainSubtitle" => [
                "name" => "AlainSubtitle",
                "columns" => "col-12",
                "value" => "text-left",
                "type" => "select",
                "props" => [
                    "label" => "Alineación",
                    "options" => $vAttributes["textAlign"]
                ]
            ],
            "colorSubtitleByClass" => [
                "name" => "colorSubtitleByClass",
                "type" => "select",
                "props" => [
                    "label" => "Color Class",
                    "options" => $vAttributes["textColors"]
                ]
            ],
            "colorSubtitle" => [
                "name" => "colorSubtitle",
                "type" => "inputColor",
                "props" => [
                    "label" => "Color Custom",
                ],
                "help" => [
                    "description" => "Selecciona el color Custom en Color Class para activarlo",
                ]
            ],
            "subtitleClass" => [
                "name" => "subtitleClass",
                "type" => "input",
                "columns" => "col-12",
                "props" => [
                    "label" => "Clases",
                ],
            ],
            "subtitleStyle" => [
                "name" => "subtitleStyle",
                "type" => "input",
                "columns" => "col-12",
                "props" => [
                    "label" => "Estilo",
                    'type' => 'textarea',
                    'rows' => 5,
                ],
                "help" => [
                    "description" => "Permite agregar estilos adicionales en subtitulo",
                ]
            ],
        ]
      ],
      "buttom" => [
        "title" => "Boton",
        "fields" => [
            "buttonClass" => [
                "name" => "buttonClass",
                "value" => "btn btn-primary",
                "columns" => "col-12",
                "type" => "input",
                "props" => [
                    "label" => "Clases",
                ]
            ],
            "buttonAlign" => [
                "name" => "buttonAlign",
                "value" => "text-right",
                "type" => "select",
                "props" => [
                    "label" => "Alineación",
                    "options" => $vAttributes["textAlign"]
                ]
            ],
            "buttonIcon" => [
                "name" => "buttonIcon",
                "type" => "input",
                "props" => [
                    "label" => "Icono",
                ]
            ],
        ]
      ],
    ]
  ],
  "newsletter" => [
        "title" => "Newsletter",
        "systemName" => "iforms::newsletter",
        "nameSpace" => "Modules\Iforms\View\Components\Newsletter",
        "contentFields" => [
            "title" => [
                "name" => "title",
                "type" => "input",
                "isTranslatable" => true,
                "columns" => "col-12",
                "props" => [
                    "label" => "Titulo"
                ]
            ],
            "description" => [
                "name" => "description",
                "type" => "input",
                "isTranslatable" => true,
                "columns" => "col-12",
                "props" => [
                    "label" => "Descripción"
                ]
            ],
            "postDescription" => [
                "name" => "postDescription",
                "type" => "input",
                "isTranslatable" => true,
                "columns" => "col-12",
                "props" => [
                    "label" => "Post Descripción"
                ]
            ],
            "submitLabel" => [
                "name" => "submitLabel",
                "type" => "input",
                "isTranslatable" => true,
                "columns" => "col-12",
                "props" => [
                    "label" => "Label de Botón"
                ]
            ],
        ],
        "attributes" => [
            "general" => [
                "title" => "General",
                "fields" => [
                    "layout" => [
                        "name" => "layout",
                        "value" => "newsletter-layout-1",
                        "type" => "select",
                        "columns" => "col-12",
                        "props" => [
                            "label" => "Plantillas Para Newsletter",
                            "options" => [
                                ["label" => "Newsletter Plantilla 1", "value" => "newsletter-layout-1"]
                            ]
                        ]
                    ],
                    "titleClasses" => [
                        "name" => "titleClasses",
                        "value" => "mb-0",
                        "type" => "input",
                        "columns" => "col-12",
                        "props" => [
                            "label" => "Clases para Titulo"
                        ]
                    ],
                    "descriptionClasses" => [
                        "name" => "descriptionClasses",
                        "value" => "mb-3",
                        "type" => "input",
                        "columns" => "col-12",
                        "props" => [
                            "label" => "Clases para Descripción"
                        ]
                    ],
                    "postDescriptionClasses" => [
                        "name" => "postDescriptionClasses",
                        "value" => "mb-3",
                        "type" => "input",
                        "columns" => "col-12",
                        "props" => [
                            "label" => "Clases para Post Descripción"
                        ]
                    ],
                    "inputClasses" => [
                        "name" => "inputClasses",
                        "value" => "bg-transparent",
                        "type" => "input",
                        "columns" => "col-12",
                        "props" => [
                            "label" => "Clases para el input"
                        ]
                    ],
                    "buttonClasses" => [
                        "name" => "buttonClasses",
                        "value" => "btn btn-primary px-3",
                        "type" => "input",
                        "columns" => "col-12",
                        "props" => [
                            "label" => "Clases para el botón"
                        ]
                    ],
                ]
            ],
        ]
    ],
];