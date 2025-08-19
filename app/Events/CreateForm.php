<?php

namespace Modules\Iform\Events;


class CreateForm
{
    public $params;

    public function __construct($params = null)
    {
        $this->params = $params;
    }
}
