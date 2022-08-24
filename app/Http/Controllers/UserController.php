<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Service\UserService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    protected $service;

    public function __construct( UserService $service )
    {
        $this->middleware( 'auth' );
        $this->service = $service;
    }

    public function index( Request $request )
    {
        if ( $request->ajax() ) {
            return ( new DataTables )->eloquent( User::query() )
                                     ->addIndexColumn()
                                     ->addColumn( 'action', function ( $row ) {
                                         $btn = '<a href="' . route( 'user.edit', $row->id ) . '" class="edit btn btn-primary">Editar</a>' .
                                                '<button class="btn btn-danger delete" data-id="' . $row->id . '">Deletar</button>';
                                         return $btn;
                                     } )
                                     ->rawColumns( [ 'action' ] )
                                     ->make( true );
        }

        return view( 'user.index' );
    }

    public function create()
    {
        return view( 'user.create' );
    }

    public function store( StoreUserRequest $request )
    {
        $resultFromStore = $this->service->store( $request->all() );

        if ( !empty( $resultFromStore[ 'error' ] ) ) {
            session()->flash( 'error', $resultFromStore[ 'message' ] );
            return back();
        }

        session()->flash( 'status', 'Usuário  registrado com sucesso!' );
        return redirect( route( 'user.index' ) );
    }

    public function edit( $id )
    {
        $data = $this->service->findOne( $id );
        return view( 'user.edit', compact( 'data' ) );
    }

    public function update( UpdateUserRequest $request, User $user )
    {
        $resultFromStore = $this->service->update( $request->all(), $user );

        if ( !empty( $resultFromStore[ 'error' ] ) ) {
            session()->flash( 'error', $resultFromStore[ 'message' ] );
            return back();
        }

        session()->flash( 'status', 'Usuário  atualizado com sucesso!' );
        return redirect( route( 'user.index' ) );
    }

    public function destroy( $id )
    {
        $resultFrom = $this->service->destroy( $id );

        if ( !empty( $resultFrom[ 'error' ] ) ) {
            session()->flash( 'error', $resultFrom[ 'message' ] );
            return back();
        }

        session()->flash( 'status', 'Usuário  deletado com sucesso!' );
        return back();
    }
}
