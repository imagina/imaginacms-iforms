<?php

namespace Modules\Iforms\Repositories\Cache;

use Modules\Iforms\Repositories\BlockRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheBlockDecorator extends BaseCacheCrudDecorator implements BlockRepository
{
    public function __construct(BlockRepository $block)
    {
        parent::__construct();
        $this->entityName = 'iforms.blocks';
        $this->repository = $block;
    }

    public function batchUpdate($params)
    {
        $this->clearCache();

        return $this->repository->batchUpdate($params);
    }
}