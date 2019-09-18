<?php

namespace Modules\Iform\Repositories\Cache;

use Modules\Iform\Repositories\FormRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheFormDecorator extends BaseCacheDecorator implements FormRepository
{
    public function __construct(FormRepository $form)
    {
        parent::__construct();
        $this->entityName = 'iform.forms';
        $this->repository = $form;
    }
}
