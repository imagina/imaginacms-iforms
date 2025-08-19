<?php

namespace Modules\Iform\Repositories\Cache;

use Modules\Iform\Repositories\BlockRepository;
use Imagina\Icore\Repositories\Cache\CoreCacheDecorator;

class CacheBlockDecorator extends CoreCacheDecorator implements BlockRepository
{
    public function __construct(BlockRepository $block)
    {
        parent::__construct();
        $this->entityName = 'iform.blocks';
        $this->repository = $block;
    }
}
