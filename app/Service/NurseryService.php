<?php

namespace App\Service;

use App\Repositories\Contracts\NurseryRepository;

class NurseryService
{
    protected $nurseryRepository;

    public function __construct( NurseryRepository $nurseryRepository ) { $this->nurseryRepository = $nurseryRepository; }

    /**
     * @param array $data
     * @return array
     */
    public function store( array $data )
    {
        try {
            return $this->nurseryRepository->save( $data );
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
            $model = $this->nurseryRepository->findOne( $id );
            return $this->nurseryRepository->update( $model, $data );
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
            $model = $this->nurseryRepository->findOneOrFail( $id );
            $this->nurseryRepository->delete( $model );
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
            return $this->nurseryRepository->all();
        } catch ( \Exception $exception ) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }
}
