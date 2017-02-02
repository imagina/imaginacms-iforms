<?php

namespace Modules\Iforms\Repositories\Cache;

use Modules\Iforms\Repositories\FormRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheFormDecorator extends BaseCacheDecorator implements FormRepository
{
    public function __construct(FormRepository $form)
    {
        parent::__construct();
        $this->entityName = 'iforms.form';
        $this->repository = $form;
    }
}
