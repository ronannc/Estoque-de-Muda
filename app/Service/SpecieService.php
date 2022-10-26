<?php

namespace App\Service;

use App\Models\Inventory;
use App\Repositories\Contracts\GroupRepository;
use App\Repositories\Contracts\SpecieRepository;
use App\Repositories\Contracts\TypeRepository;

class SpecieService
{
    protected $specieRepository;
    protected $groupRepository;
    protected $typeRepository;

    public function __construct( SpecieRepository $specieRepository, GroupRepository $groupRepository, TypeRepository $typeRepository )
    {
        $this->specieRepository = $specieRepository;
        $this->groupRepository  = $groupRepository;
        $this->typeRepository   = $typeRepository;
    }

    public function getExtraData()
    {
        return [
            'groups' => $this->groupRepository->all(),
        ];
    }

    public function store( array $data )
    {
        try {
            return $this->specieRepository->save( $data );
        } catch ( \Exception $exception ) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update( array $data, $id )
    {
        try {
            $model = $this->specieRepository->findOne( $id );
            return $this->specieRepository->update( $model, $data );
        } catch ( \Exception $exception ) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function destroy( $id )
    {
        try {
            $model = $this->specieRepository->findOneOrFail( $id );
            $this->specieRepository->delete( $model );
            return [
                'error'   => false,
                'message' => 'Excluído com sucesso !!!'
            ];
        } catch ( \Exception $exception ) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function all()
    {
        try {
            return $this->specieRepository->all();
        } catch ( \Exception $exception ) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function findOne( $id )
    {
        try {
            return $this->specieRepository->findOne( $id );
        } catch ( \Exception $exception ) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function sumInventory( $inventory )
    {
        $sumStore = $inventory->where( 'type', Inventory::STORE )->sum( 'quantity' );
        $sumExit  = $inventory->where( 'type', Inventory::EXIT )->sum( 'quantity' );
        return $sumStore - $sumExit;
    }

    public function sumInventoryGruopBy( $inventories, $groupBy = 'id' )
    {
        return $inventories->groupBy( 'type_size.' . $groupBy )->transform( function ( $item ) {
            return $this->sumInventory( $item );
        } );
    }
}
