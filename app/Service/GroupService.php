<?php

namespace App\Service;

use App\Repositories\Contracts\GroupRepository;

class GroupService extends AbstractService
{
    protected $repository;

    public function __construct( GroupRepository $repository ) { $this->repository = $repository; }
}
