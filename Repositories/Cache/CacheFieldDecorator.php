<?php

namespace Modules\Iforms\Repositories\Cache;

use Modules\Iforms\Repositories\FieldRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheFieldDecorator extends BaseCacheCrudDecorator implements FieldRepository
{
  public function __construct(FieldRepository $field)
  {
    parent::__construct();
    $this->entityName = 'iforms.fields';
    $this->tags = ['iforms.blocks', 'iforms.forms'];
    $this->repository = $field;
  }

  public function updateOrders($data)
  {

    $this->cache->tags($this->getTags())->flush();
    return $this->repository->updateOrders($data);

  }
}
