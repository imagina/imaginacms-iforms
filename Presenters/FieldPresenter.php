<?php

namespace Modules\Iforms\Presenters;

use Laracasts\Presenter\Presenter;
use Modules\Iforms\Entities\Type;

class FieldPresenter extends Presenter
{
    /**
     * @var \Modules\Iforms\Entities\Type
     */
    protected $types;
    /**
     * @var \Modules\Iforms\Repositories\FieldRepository
     */
    private $field;

    public function __construct($entity)
    {
        parent::__construct($entity);
        $this->field = app('Modules\Iforms\Repositories\FieldRepository');
        $this->types = app('Modules\Iforms\Entities\Type');
    }

    public function type()
    {   
        $type = new Type();
        return $type->show($this->entity->type ?? reset($type->lists()));
    }



}
