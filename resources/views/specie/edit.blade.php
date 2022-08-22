@extends('adminlte::page')

@section('title', 'Espécies')

@section('content_header')
    <h1 class="m-0 text-dark">Espécies</h1>
@stop

@section('content')
    @include('components.flash-messages')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edição</h3>
        </div>
        <form action="{{ route('specie.update', $data) }}"
              id="form_validation"
              method="post"
              class="horizontal-form">
            {{ method_field('PUT') }}
            <div class="form-body">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    @include('components.input-name', ['required' => true])
                                </div>
                                <div class="col-4">
                                    @include('components.input-specie', ['required' => true])
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-8">
                                    @include('components.select-group', ['required' => true])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                @include('components.form-action')
            </div>
        </form>
    </div>
@stop
