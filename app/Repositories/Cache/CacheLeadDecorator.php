<?php

namespace Modules\Iform\Repositories\Cache;

use Modules\Iform\Repositories\LeadRepository;
use Imagina\Icore\Repositories\Cache\CoreCacheDecorator;

class CacheLeadDecorator extends CoreCacheDecorator implements LeadRepository
{
    public function __construct(LeadRepository $lead)
    {
        parent::__construct();
        $this->entityName = 'iform.leads';
        $this->repository = $lead;
    }
}
