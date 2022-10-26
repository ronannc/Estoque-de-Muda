<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group;
use App\Service\GroupService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GroupController extends Controller
{
    protected $service;

    public function __construct( GroupService $service )
    {
        $this->middleware( 'auth' );
        $this->service = $service;
    }

    public function index( Request $request )
    {
        if ( $request->ajax() ) {
            return ( new DataTables )->eloquent( Group::query() )
                                                       ->addIndexColumn()
                                                       ->addColumn( 'action', function ( $row ) {
                                 $btn = '<a href="' . route( 'group.edit', $row->id ) . '" class="edit btn btn-primary">Editar</a>' .
                                        '<button class="btn btn-danger delete" data-id="' . $row->id . '">Deletar</button>';
                                 return $btn;
                             } )
                                                       ->rawColumns( [ 'action' ] )
                                                       ->make( true );
        }

        return view( 'group.index' );
    }

    public function create()
    {
        return view( 'group.create' );
    }

    public function store( StoreGroupRequest $request )
    {
        $resultFromStore = $this->service->store( $request->all() );

        if ( !empty( $resultFromStore[ 'error' ] ) ) {
            session()->flash( 'error', $resultFromStore[ 'message' ] );
            return back();
        }

        session()->flash( 'status', 'Grupo registrado com sucesso!' );
        return redirect( route( 'group.index' ) );
    }

    public function edit( $id )
    {
        $data = $this->service->findOne( $id );
        return view( 'group.edit', compact( 'data' ) );
    }

    public function update( UpdateGroupRequest $request, Group $group )
    {
        $resultFromStore = $this->service->update( $request->all(), $group );

        if ( !empty( $resultFromStore[ 'error' ] ) ) {
            session()->flash( 'error', $resultFromStore[ 'message' ] );
            return back();
        }

        session()->flash( 'status', 'Grupo atualizado com sucesso!' );
        return redirect( route( 'group.index' ) );
    }

    public function destroy( $id )
    {
        $resultFrom = $this->service->destroy( $id );

        if ( !empty( $resultFrom[ 'error' ] ) ) {
            session()->flash( 'error', $resultFrom[ 'message' ] );
            return back();
        }

        session()->flash( 'status', 'Grupo deletado com sucesso!' );
        return redirect( route( 'group.index' ) );
    }
}
