<?php

namespace Modules\Iform\Repositories\Cache;

use Modules\Iform\Repositories\FormRepository;
use Imagina\Icore\Repositories\Cache\CoreCacheDecorator;

class CacheFormDecorator extends CoreCacheDecorator implements FormRepository
{
    public function __construct(FormRepository $form)
    {
        parent::__construct();
        $this->entityName = 'iform.forms';
        $this->repository = $form;
    }
}
