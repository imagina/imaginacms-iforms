<?php

namespace Modules\Iform\Events;


class UpdateForm
{
    public $params;

    public function __construct($params = null)
    {
        $this->params = $params;
    }
}
