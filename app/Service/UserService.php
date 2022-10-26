<?php

namespace App\Service;

use App\Repositories\Contracts\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;

    public function __construct( UserRepository $userRepository )
    {
        $this->userRepository = $userRepository;
    }

    public function store( array $data )
    {
        try {
            $data[ 'password' ] = Hash::make( $data[ 'password' ] );
            return $this->userRepository->save( $data );
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
            if ( isset( $data[ 'password' ] ) )
                $data[ 'password' ] = Hash::make( $data[ 'password' ] );

            $model = $this->userRepository->findOne( $id );
            return $this->userRepository->update( $model, $data );
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
            $model = $this->userRepository->findOneOrFail( $id );
            $this->userRepository->delete( $model );
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
            return $this->userRepository->all();
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
            return $this->userRepository->findOne( $id );
        } catch ( \Exception $exception ) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }
}
