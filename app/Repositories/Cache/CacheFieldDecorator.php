<?php

namespace Modules\Iform\Repositories\Cache;

use Modules\Iform\Repositories\FieldRepository;
use Imagina\Icore\Repositories\Cache\CoreCacheDecorator;

class CacheFieldDecorator extends CoreCacheDecorator implements FieldRepository
{
    public function __construct(FieldRepository $field)
    {
        parent::__construct();
        $this->entityName = 'iform.fields';
        $this->repository = $field;
    }
}
