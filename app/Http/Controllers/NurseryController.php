<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNurseryRequest;
use App\Http\Requests\UpdateNurseryRequest;
use App\Models\Nursery;
use App\Service\NurseryService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class NurseryController extends Controller
{
    protected $service;

    public function __construct( NurseryService $service )
    {
        $this->middleware( 'auth' );
        $this->service = $service;
    }

    public function index( Request $request )
    {
        if ( $request->ajax() ) {
            return ( new DataTables )->eloquent( Nursery::query()->with( 'city.state', 'inventories' ) )
                             ->addIndexColumn()
                             ->editColumn( 'inventory', function ( $row ) {
                                 return "<span class='badge bg-primary'>".$this->service->sumInventory( $row->inventories )."</span>" ;
                             } )
                             ->addColumn( 'action', function ( $row ) {
                                 $btn = '<a href="' . route( 'nursery.edit', $row->id ) . '" class="edit btn btn-primary">Editar</a>' .
                                        '<button class="btn btn-danger delete" data-id="' . $row->id . '">Deletar</button>';
                                 return $btn;
                             } )
                             ->rawColumns( [ 'action', 'inventory' ] )
                             ->make( true );
        }

        return view( 'nursery.index' );
    }

    public function create()
    {
        $extraData = $this->service->getExtraData();
        return view( 'nursery.create', compact( 'extraData' ) );
    }

    public function store( StoreNurseryRequest $request )
    {
        $resultFromStore = $this->service->store( $request->all() );

        if ( !empty( $resultFromStore[ 'error' ] ) ) {
            session()->flash( 'error', $resultFromStore[ 'message' ] );
            return back();
        }

        session()->flash( 'status', 'Viveiro registrado com sucesso!' );
        return redirect( route( 'nursery.index' ) );
    }

    public function edit( $id )
    {
        $data      = $this->service->findOne( $id );
        $extraData = $this->service->getExtraData();
        return view( 'nursery.edit', compact( 'data', 'extraData' ) );
    }

    public function update( UpdateNurseryRequest $request, Nursery $nursery )
    {
        $resultFromStore = $this->service->update( $request->all(), $nursery );

        if ( !empty( $resultFromStore[ 'error' ] ) ) {
            session()->flash( 'error', $resultFromStore[ 'message' ] );
            return back();
        }

        session()->flash( 'status', 'Viveiro atualizado com sucesso!' );
        return redirect( route( 'nursery.index' ) );
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
