<?php

namespace Modules\Iforms\Repositories\Cache;

use Modules\Iforms\Repositories\LeadRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheLeadDecorator extends BaseCacheCrudDecorator implements LeadRepository
{
    public function __construct(LeadRepository $lead)
    {
        parent::__construct();
        $this->entityName = 'iforms.leads';
        $this->repository = $lead;
    }
}
