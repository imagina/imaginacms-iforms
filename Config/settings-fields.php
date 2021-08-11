<?php

return [
  'from-email' => [
    'name' => 'iforms::from-email',
    'value' => null,
    'type' => 'input',
    'props' => [
      'label' => 'iforms::common.setting.email'
    ],
  ],
  'form-emails' => [
    'name' => 'iforms::form-emails',
    'value' => null,
    'type' => 'input',
    'props' => [
      'label' => 'iforms::common.setting.emails'
    ],
  ],
  'api' => [
    'name' => 'iforms::api',
    'value' => null,
    'type' => 'input',
    'props' => [
      'label' => 'iforms::common.setting.api'
    ],
  ],
  'captcha' => [
    'name' => 'iforms::captcha',
    'value' => '0',
    'type' => 'checkbox',
    'props' => [
      'trueValue'=>"1",
      'falseValue'=>"0",
      'label' => 'iforms::common.setting.recaptcha'
    ],
  ],
  'trans' => [
    'name' => 'iforms::trans',
    'value' => '0',
    'type' => 'checkbox',
    'props' => [
      'trueValue'=>"1",
      'falseValue'=>"0",
      'label' => 'iforms::common.setting.trans'
    ],
  ],
];
