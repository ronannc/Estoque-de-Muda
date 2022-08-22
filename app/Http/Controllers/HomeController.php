<?php

namespace App\Http\Controllers;

use App\Service\HomeService;

class HomeController extends Controller
{
    protected $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HomeService $homeService)
    {
        $this->middleware('auth');
        $this->service = $homeService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = $this->service->getDashBoard();
        return view('home', compact('data'));
    }
}
