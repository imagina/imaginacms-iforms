<?php

namespace Modules\Iforms\Repositories;

use Modules\Core\Icrud\Repositories\BaseCrudRepository;

interface FormRepository extends BaseCrudRepository
{
    public function findBySystemName($systemName);
}
