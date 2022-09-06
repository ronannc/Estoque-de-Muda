<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Models\Inventory;
use App\Service\InventoryService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InventoryController extends Controller
{
    protected $service;

    public function __construct( InventoryService $service )
    {
        $this->middleware( 'auth' );
        $this->service = $service;
    }

    public function index( Request $request, $specie_id = null )
    {
        if ( $request->ajax() ) {
            return ( new DataTables )->eloquent( Inventory::query()->where(function($q) use($specie_id){
                if($specie_id){
                    $q->where('specie_id',$specie_id );
                }
            })->with( ['specie.type', 'nursery'] ) )
                             ->addIndexColumn()
                             ->editColumn( 'type', function ( $row ) {
                                 return $row[ 'type' ] = $row[ 'type' ] == Inventory::STORE ? '<i class="fas fa-sign-in-alt" style="color: green"></i> ENTRADA' : '<i class="fas fa-sign-out-alt" style="color: red"></i> SAIDA';
                             } )
                             ->editColumn( 'date', function ( $row ) {
                                 return date( 'd/m/Y', strtotime( $row[ 'date' ] ) );
                             } )
                             ->addColumn( 'action', function ( $row ) {
                                 $btn = '<a href="' . route( 'inventory.edit', $row->id ) . '" class="edit btn btn-primary">Editar</a>' .
                                        '<button class="btn btn-danger delete" data-id="' . $row->id . '">Deletar</button>';
                                 return $btn;
                             } )
                             ->rawColumns( [ 'action', 'type' ] )
                             ->make( true );
        }

        return view( 'inventory.index' );
    }

    public function create()
    {
        $extraData = $this->service->getExtraData();
        return view( 'inventory.create', compact( 'extraData' ) );
    }

    public function store( StoreInventoryRequest $request )
    {
        $resultFromStore = $this->service->store( $request->all() );

        if ( !empty( $resultFromStore[ 'error' ] ) ) {
            session()->flash( 'error', $resultFromStore[ 'message' ] );
            return back();
        }

        session()->flash( 'status', 'Movientação de Estoque cadastrado com sucesso!' );
        return redirect( route( 'inventory.index' ) );
    }

    public function edit( $id )
    {
        $data      = $this->service->findOne( $id );
        $extraData = $this->service->getExtraData();
        return view( 'inventory.edit', compact( 'data', 'extraData' ) );
    }

    public function update( UpdateInventoryRequest $request, Inventory $inventory )
    {
        $resultFromStore = $this->service->update( $request->all(), $inventory );

        if ( !empty( $resultFromStore[ 'error' ] ) ) {
            session()->flash( 'error', $resultFromStore[ 'message' ] );
            return back();
        }

        session()->flash( 'status', 'Viveiro atualizado com sucesso!' );
        return redirect( route( 'inventory.index' ) );
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
