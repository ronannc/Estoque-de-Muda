<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpecieRequest;
use App\Http\Requests\UpdateSpecieRequest;
use App\Models\Specie;
use App\Service\SpecieService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SpecieController extends Controller
{
    protected $service;

    public function __construct( SpecieService $service )
    {
        $this->middleware( 'auth' );
        $this->service = $service;
    }

    public function index( Request $request )
    {
        if ( $request->ajax() ) {
            return ( new DataTables )->eloquent( Specie::query()->with( 'group' ) )
                             ->addIndexColumn()
                             ->editColumn( 'inventory', function ( $row ) {
                                 return "<span class='badge bg-primary'>" . $this->service->sumInventory( $row->inventories ) . "</span>";
                             } )
                             ->addColumn( 'action', function ( $row ) {
                                 $btn = '<a href="' . route( 'specie.show', $row->id ) . '" class="edit btn btn-info">Histórico</a>' .
                                        '<a href="' . route( 'specie.edit', $row->id ) . '" class="edit btn btn-primary">Editar</a>' .
                                        '<button class="btn btn-danger delete" data-id="' . $row->id . '">Deletar</button>';
                                 return $btn;
                             } )
                             ->rawColumns( [ 'action', 'inventory' ] )
                             ->make( true );
        }

        return view( 'specie.index' );
    }

    public function create()
    {
        $extraData = $this->service->getExtraData();
        return view( 'specie.create', compact( 'extraData' ) );
    }

    public function store( StoreSpecieRequest $request )
    {
        $resultFromStore = $this->service->store( $request->all() );

        if ( !empty( $resultFromStore[ 'error' ] ) ) {
            session()->flash( 'error', $resultFromStore[ 'message' ] );
            return back();
        }

        session()->flash( 'status', 'Viveiro registrado com sucesso!' );
        return redirect( route( 'specie.index' ) );
    }

    public function edit( $id )
    {
        $data      = $this->service->findOne( $id );
        $extraData = $this->service->getExtraData();
        return view( 'specie.edit', compact( 'data', 'extraData' ) );
    }

    public function update( UpdateSpecieRequest $request, Specie $specie )
    {
        $resultFromStore = $this->service->update( $request->all(), $specie );

        if ( !empty( $resultFromStore[ 'error' ] ) ) {
            session()->flash( 'error', $resultFromStore[ 'message' ] );
            return back();
        }

        session()->flash( 'status', 'Viveiro atualizado com sucesso!' );
        return redirect( route( 'specie.index' ) );
    }

    public function show( $id )
    {
        $data = $this->service->findOne( $id );
        return view( 'specie.show', compact( 'data' ) );
    }

    public function destroy( $id )
    {
        $resultFrom = $this->service->destroy( $id );

        if ( !empty( $resultFrom[ 'error' ] ) ) {
            session()->flash( 'error', $resultFrom[ 'message' ] );
            return back();
        }

        session()->flash( 'status', 'Viveiro deletado com sucesso!' );
        return back();
    }
}
