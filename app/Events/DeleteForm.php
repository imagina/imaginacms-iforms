<?php

namespace Modules\Iform\Events;


class DeleteForm
{
    public $params;

    public function __construct($params = null)
    {
        $this->params = $params;
    }
}
