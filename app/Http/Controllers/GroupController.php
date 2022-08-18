<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSeedlingRequest;
use App\Http\Requests\UpdateSeedlingRequest;
use App\Models\Group;
use App\Models\Nursery;
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
            return DataTables::eloquent( Group::query() )
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

    public function store( StoreSeedlingRequest $request )
    {
        //
    }

    public function show( Nursery $seedling )
    {
        //
    }

    public function edit( Nursery $seedling )
    {
        //
    }

    public function update( UpdateSeedlingRequest $request, Nursery $seedling )
    {
        //
    }

    public function destroy( Nursery $seedling )
    {
        //
    }
}
