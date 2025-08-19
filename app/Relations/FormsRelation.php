<?php

namespace Modules\Iform\Relations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Iform\Models\Form;

class FormsRelation
{
    public function resolve(Model $model)
    {
        return $model->morphToMany(Form::class, 'formeable', 'iform__formeable')
            ->withPivot('formeable_type')
            ->withTimestamps();
    }
}
