<?php

return [
  "forms" => [
    'customLeadPDFTemplate' => [
      'name' => 'customLeadPDFTemplate',
      'value' => '',
      'type' => 'input',
      'fakeFieldName' => 'options',
      'columns' => 'col-12 col-md-6',
      'props' => [
        'label' => 'iforms::forms.form.customLeadPDFTemplate',
      ],
    ],
  ],
  "fields" => [
    
    'availableExtensions' => [
      'name' => 'availableExtensions',
      'value' => [],
      'type' => 'select',
      'isFakeField' => true,
      'columns' => 'col-12 col-md-6',
      'props' => [
        'useInput' => true,
        'useChips' => true,
        'multiple' => true,
        'hint' => 'iforms::leads.crudFields.hint.availableExtensions',
        'hideDropdownIcon' => true,
        'newValueMode' => 'add-unique',
        'label' => 'iforms::leads.crudFields.label.availableExtensions'
      ],
    ],
  ]
];
