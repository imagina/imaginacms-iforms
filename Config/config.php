<?php

return [
  'name' => 'Iforms',
  /*
|--------------------------------------------------------------------------
| Define all the exportable available
|--------------------------------------------------------------------------
*/
  'exportable' => [
    "leads" => [
      'moduleName' => "Iforms",
      'exportName' => "LeadsPerFormExport",
      'fileName' => "Leads",
      'exportFields' => [
        "formId" => [
          "value" => null,
          "type" => 'select',
          "required" => true,
          "props" => [
            "label" => 'Formulario*',
          ],
          "loadOptions" => [
            "apiRoute" => 'apiRoutes.qform.forms',
            "select" => ["label" => 'title', "id" => 'id'],
          ]
        ]
      ]
      //'repositoryName' => "UserApiRepository",
      //'fields' => ['id', 'first_name', 'last_name', 'email', 'last_login', 'created_at', 'updated_at'],
      //'headings' => ['id', 'Nombre', 'Apellido', 'Email', 'Fecha Ultima Sesión', 'Fecha de Creación', 'Fecha Ultima Actualización']
    ]
  ]
];
