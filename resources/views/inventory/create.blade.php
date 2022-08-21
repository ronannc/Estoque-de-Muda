@extends('adminlte::page')

@section('title', 'Movimentação de Estoque')

@section('content_header')
    <h1 class="m-0 text-dark">Movimentação de Estoque</h1>
@stop

@section('content')
    @include('components.flash-messages')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cadastro</h3>
        </div>
        <form action="{{ route('inventory.store') }}"
              id="form_validation"
              method="post"
              class="horizontal-form">
            {{ method_field('POST') }}
            <div class="form-body">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-5">
                                    @include('components.input-date', ['required' => true])
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-5">
                                    @include('components.select-movement_type', ['required' => true])
                                </div>
                                <div class="col-4">
                                    @include('components.input-quantity', ['required' => true])
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-5">
                                    @include('components.select-nursery', ['required' => true])
                                </div>
                                <div class="col-4">
                                    @include('components.select-specie', ['required' => true])
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                    @include('components.input-observation', ['required' => true])
                                </div>
                                <div class="col-3">
                                    @include('components.input-responsible', ['required' => true])
                                </div>
                                <div class="col-3">
                                    @include('components.input-destiny', ['required' => true])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    @include('components.form-action')
                </div>

            </div>
        </form>
    </div>
@stop
