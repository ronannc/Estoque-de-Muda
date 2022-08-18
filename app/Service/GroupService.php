<?php

namespace App\Service;

use App\Repositories\Contracts\GroupRepository;

class GroupService
{
    protected $groupRepository;

    public function __construct( GroupRepository $groupRepository ) { $this->groupRepository = $groupRepository; }

    /**
     * @param array $data
     * @return array
     */
    public function store( array $data )
    {
        try {
            return $this->groupRepository->save( $data );
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
            $model = $this->groupRepository->findOne( $id );
            return $this->groupRepository->update( $model, $data );
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
            $model = $this->groupRepository->findOneOrFail( $id );
            $this->groupRepository->delete( $model );
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
            return $this->groupRepository->all();
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
    public function paginate()
    {
        try {
            return $this->groupRepository->paginate();
        } catch ( \Exception $exception ) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }
}
