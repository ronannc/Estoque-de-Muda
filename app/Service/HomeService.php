<?php

namespace App\Service;

use App\Repositories\Contracts\GroupRepository;
use App\Repositories\Contracts\InventoryRepository;
use App\Repositories\Contracts\NurseryRepository;
use App\Repositories\Contracts\SpecieRepository;
use App\Repositories\Contracts\UserRepository;

class HomeService
{
    protected $inventoryRepository;
    protected $nurseryRepository;
    protected $specieRepository;
    protected $userRepository;

    public function __construct( UserRepository $userRepository, InventoryRepository $inventoryRepository, NurseryRepository $nurseryRepository, SpecieRepository $specieRepository )
    {
        $this->inventoryRepository = $inventoryRepository;
        $this->nurseryRepository   = $nurseryRepository;
        $this->specieRepository    = $specieRepository;
        $this->userRepository      = $userRepository;
    }

    public function getDashBoard()
    {
        return [
            'nurseries'   => $this->nurseryRepository->all()->count(),
            'species'     => $this->specieRepository->all()->count(),
            'inventories' => $this->inventoryRepository->all()->count(),
            'users'       => $this->userRepository->all()->count(),
        ];
    }
}
