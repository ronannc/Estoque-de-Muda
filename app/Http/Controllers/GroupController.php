<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSeedlingRequest;
use App\Http\Requests\UpdateSeedlingRequest;
use App\Models\Nursery;
use App\Service\GroupService;
use Illuminate\View\View;

class GroupController extends Controller
{
    protected $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( GroupService $service )
    {
        $this->middleware( 'auth' );
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $data = $this->service->all();
        dd( $data );
        return view( 'group.index', compact( 'data' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreSeedlingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store( StoreSeedlingRequest $request )
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Nursery $seedling
     * @return \Illuminate\Http\Response
     */
    public function show( Nursery $seedling )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Nursery $seedling
     * @return \Illuminate\Http\Response
     */
    public function edit( Nursery $seedling )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateSeedlingRequest $request
     * @param \App\Models\Nursery $seedling
     * @return \Illuminate\Http\Response
     */
    public function update( UpdateSeedlingRequest $request, Nursery $seedling )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Nursery $seedling
     * @return \Illuminate\Http\Response
     */
    public function destroy( Nursery $seedling )
    {
        //
    }
}
