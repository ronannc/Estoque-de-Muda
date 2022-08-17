<?php

namespace App\Service;

use App\Service\Contracts\BaseService;

abstract class AbstractService implements BaseService
{
    protected $repository;

    public function __construct( $repository ) { $this->repository = $repository; }

    /**
     * @param array $data
     * @return array
     */
    public function store( array $data )
    {
        try {
            return $this->repository->save( $data );
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
            $model = $this->repository->findOne( $id );
            return $this->repository->update( $model, $data );
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
            $model = $this->repository->findOneOrFail( $id );
            $this->repository->delete( $model );
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
            return $this->repository->all();
        } catch ( \Exception $exception ) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }
}
