@extends('adminlte::page')

@section('title', 'Tipos')

@section('content_header')
    <h1 class="m-0 text-dark">Tipos</h1>
@stop

@section('content')
    @include('components.flash-messages')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cadastro</h3>
        </div>
        <form action="{{ route('type.store') }}"
              id="form_validation"
              method="post"
              class="horizontal-form">
            {{ method_field('POST') }}
            <div class="form-body">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <div class="row">
                                <div class="col-4">
                                    @include('components.input-name', ['required' => true])
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
