<?php

namespace App\Service;

use App\Models\Inventory;
use App\Models\Specie;
use App\Models\Type;
use App\Repositories\Contracts\InventoryRepository;
use App\Repositories\Contracts\NurseryRepository;
use App\Repositories\Contracts\SpecieRepository;
use App\Repositories\Contracts\TypeRepository;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

class InventoryService
{
    protected $inventoryRepository;
    protected $specieRepository;
    protected $nurseryRepository;
    protected $typeRepository;
    protected $specieService;

    public function __construct( InventoryRepository $inventoryRepository, SpecieRepository $specieRepository, NurseryRepository $nurseryRepository, TypeRepository $typeRepository, SpecieService $specieService )
    {
        $this->inventoryRepository = $inventoryRepository;
        $this->specieRepository    = $specieRepository;
        $this->nurseryRepository   = $nurseryRepository;
        $this->typeRepository      = $typeRepository;
        $this->specieService       = $specieService;
    }

    public function getExtraData()
    {
        return [
            'species'   => $this->specieRepository->all(),
            'nurseries' => $this->nurseryRepository->all(),
            'types'     => $this->typeRepository->all()
        ];
    }

    public function store( array $data )
    {
        try {
            $oneData = $data;
            $species = Specie::with( 'inventories' )->whereIn( 'id', $data[ 'specie_id' ] )->get()->keyBy( 'id' );
            $types   = Type::whereIn( 'id', $data[ 'type_id' ] )->get()->keyBy( 'id' );
            $msg     = [ 'error' => true, 'message' => '' ];
            foreach ( $data[ 'type' ] as $key => $type ) {
                $specie   = $species[ $data[ 'specie_id' ][ $key ] ];
                $type_id  = $data[ 'type_id' ][ $key ];
                $quantity = $data[ 'quantity' ][ $key ];
                if ( $this->canStore( $specie->inventories, $type_id, $quantity, $type ) ) {
                    $oneData[ 'type' ]       = $type;
                    $oneData[ 'quantity' ]   = $quantity;
                    $oneData[ 'nursery_id' ] = $data[ 'nursery_id' ][ $key ];
                    $oneData[ 'specie_id' ]  = $data[ 'specie_id' ][ $key ];
                    $oneData[ 'type_id' ]    = $type_id;
                    $this->inventoryRepository->save( $oneData );
                } else {
                    $msg[ 'message' ] .= $this->failMsg( $specie, $types[ $type_id ]->name, $quantity );
                }
            }

            return $msg[ 'message' ] != '' ? $msg : [ 'error' => false, 'message' => '' ];
        } catch ( \Exception $exception ) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    private function failMsg( $specie, $type_name, $quantity )
    {
        return 'Estoque insuficiente para movimentação de saida !' .
               ' Espécie: ' . $specie->name .
               ' | Tamanho: ' . $type_name .
               ' | Quantidade: ' . $quantity . '<br>';
    }

    private function canStore( $inventories, $type_id, $quantity, $type ): Boolean
    {
        if ( $type == Inventory::EXIT )
            return $this->specieService->sumInventoryGruopBy( $inventories, 'id' )[ $type_id ] >= $quantity;

        return true;
    }

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
