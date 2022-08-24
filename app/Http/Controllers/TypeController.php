<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Type;
use App\Service\TypeService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TypeController extends Controller
{
    protected $service;

    public function __construct( TypeService $service )
    {
        $this->middleware( 'auth' );
        $this->service = $service;
    }

    public function index( Request $request )
    {
        if ( $request->ajax() ) {
            return ( new DataTables )->eloquent( Type::query() )
                                                       ->addIndexColumn()
                                                       ->addColumn( 'action', function ( $row ) {
                                 $btn = '<a href="' . route( 'type.edit', $row->id ) . '" class="edit btn btn-primary">Editar</a>' .
                                        '<button class="btn btn-danger delete" data-id="' . $row->id . '">Deletar</button>';
                                 return $btn;
                             } )
                                                       ->rawColumns( [ 'action' ] )
                                                       ->make( true );
        }

        return view( 'type.index' );
    }

    public function create()
    {
        return view( 'type.create' );
    }

    public function store( StoreTypeRequest $request )
    {
        $resultFromStore = $this->service->store( $request->all() );

        if ( !empty( $resultFromStore[ 'error' ] ) ) {
            session()->flash( 'error', $resultFromStore[ 'message' ] );
            return back();
        }

        session()->flash( 'status', 'Tipo registrado com sucesso!' );
        return redirect( route( 'type.index' ) );
    }

    public function edit( $id )
    {
        $data = $this->service->findOne( $id );
        return view( 'type.edit', compact( 'data' ) );
    }

    public function update( UpdateTypeRequest $request, Type $type )
    {
        $resultFromStore = $this->service->update( $request->all(), $type );

        if ( !empty( $resultFromStore[ 'error' ] ) ) {
            session()->flash( 'error', $resultFromStore[ 'message' ] );
            return back();
        }

        session()->flash( 'status', 'Tipo atualizado com sucesso!' );
        return redirect( route( 'type.index' ) );
    }

    public function destroy( $id )
    {
        $resultFrom = $this->service->destroy( $id );

        if ( !empty( $resultFrom[ 'error' ] ) ) {
            session()->flash( 'error', $resultFrom[ 'message' ] );
            return back();
        }

        session()->flash( 'status', 'Tipo deletado com sucesso!' );
        return back();
    }
}
