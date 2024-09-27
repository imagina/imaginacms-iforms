<?php

namespace Modules\Iforms\Repositories\Cache;

use Modules\Iforms\Repositories\FormRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheFormDecorator extends BaseCacheCrudDecorator implements FormRepository
{
    public function __construct(FormRepository $form)
    {
        parent::__construct();
        $this->entityName = 'iforms.forms';
        $this->repository = $form;
    }

    /**
       * Find by System Name
       *
       * @return mixed
       */
    public function findBySystemName($systemName)
    {
        return $this->remember(function () use ($systemName) {
            return $this->repository->findBySystemName($systemName);
        });
    }
    
}
