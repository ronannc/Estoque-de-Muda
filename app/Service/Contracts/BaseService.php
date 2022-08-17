<?php

namespace App\Service\Contracts;

interface BaseService
{
    public function store( array $data );

    public function update( array $data, $id );

    public function destroy( $id );
}
