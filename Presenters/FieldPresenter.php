<?php

namespace Modules\Iform\Presenters;

use Laracasts\Presenter\Presenter;

class FieldPresenter extends Presenter
{
    /**
     * @var \Modules\Iform\Entities\Type
     */
    protected $types;
    /**
     * @var \Modules\Iform\Repositories\FieldRepository
     */
    private $field;

    public function __construct($entity)
    {
        parent::__construct($entity);
        $this->field = app('Modules\Iform\Repositories\FieldRepository');
        $this->types = app('Modules\Iform\Entities\Type');
    }

    public function type()
    {
        return $this->types->get($this->entity->type);
    }

}
