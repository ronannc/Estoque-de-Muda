@extends('adminlte::page')

@section('title', 'Grupos')

@section('content_header')
    <h1 class="m-0 text-dark">Grupos</h1>
@stop

@section('content')
    @include('components.flash-messages')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cadastro</h3>
        </div>
        <form action="{{ route('group.store') }}"
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
                                    @include('components.input-nome')
                                </div>
                                <div class="col-4">
                                    @include('components.select-categoria')
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
