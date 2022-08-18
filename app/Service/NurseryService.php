<?php

namespace App\Service;

use App\Repositories\Contracts\CityRepository;
use App\Repositories\Contracts\NurseryRepository;

class NurseryService
{
    protected $nurseryRepository;
    protected $cityRepository;

    public function __construct( NurseryRepository $nurseryRepository, CityRepository $cityRepository )
    {
        $this->nurseryRepository = $nurseryRepository;
        $this->cityRepository    = $cityRepository;
    }

    public function getExtraData()
    {
        return [
            'cities' => $this->cityRepository->all()
        ];
    }

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
    public function update( array $data, $model )
    {
        try {
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

    /**
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Model|null
     */
    public function findOne( $id )
    {
        try {
            return $this->nurseryRepository->findOne( $id );
        } catch ( \Exception $exception ) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }
}
