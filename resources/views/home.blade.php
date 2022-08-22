@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{$data['nurseries'] ?? '-' }}</h3>
                                    <p>Viveiros</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-store"></i>
                                </div>
                                <a href="{{route('nursery.index')}}" class="small-box-footer">
                                    Mais informações <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{$data['species'] ?? '-' }}</h3>
                                    <p>Espécies</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-seedling"></i>
                                </div>
                                <a href="{{route('specie.index')}}" class="small-box-footer">
                                    Mais informações <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{$data['users'] ?? '-' }}</h3>
                                    <p>Usuarios</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <a href="{{route('user.index')}}" class="small-box-footer">
                                    Mais informações <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$data['inventories'] ?? '-' }}</h3>
                                    <p>Movimentação de Estoque</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dolly-flatbed"></i>
                                </div>
                                <a href="{{route('inventory.index')}}" class="small-box-footer">
                                    Mais informações <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
