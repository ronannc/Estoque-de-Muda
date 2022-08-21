<?php

namespace App\Service;

use App\Repositories\Contracts\InventoryRepository;
use App\Repositories\Contracts\NurseryRepository;
use App\Repositories\Contracts\SpecieRepository;

class InventoryService
{
    protected $inventoryRepository;
    protected $specieRepository;
    protected $nurseryRepository;

    public function __construct( InventoryRepository $inventoryRepository, SpecieRepository $specieRepository, NurseryRepository $nurseryRepository )
    {
        $this->inventoryRepository = $inventoryRepository;
        $this->specieRepository    = $specieRepository;
        $this->nurseryRepository   = $nurseryRepository;
    }

    public function getExtraData()
    {
        return [
            'species'   => $this->specieRepository->all(),
            'nurseries' => $this->nurseryRepository->all()
        ];
    }

    /**
     * @param array $data
     * @return array
     */
    public function store( array $data )
    {
        try {
            return $this->inventoryRepository->save( $data );
        } catch ( \Exception $exception ) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    /**
     * @param array $data
     * @param $id
     * @return array
     */
    public function update( array $data, $id )
    {
        try {
            $model = $this->inventoryRepository->findOne( $id );
            return $this->inventoryRepository->update( $model, $data );
        } catch ( \Exception $exception ) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    /**
     * @param $id
     * @return array
     */
    public function destroy( $id )
    {
        try {
            $model = $this->inventoryRepository->findOneOrFail( $id );
            $this->inventoryRepository->delete( $model );
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

    /**
     * @return array
     */
    public function all()
    {
        try {
            return $this->inventoryRepository->all();
        } catch ( \Exception $exception ) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    /**
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Model|null
     */
    public function findOne( $id )
    {
        try {
            return $this->inventoryRepository->findOne( $id );
        } catch ( \Exception $exception ) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }
}
