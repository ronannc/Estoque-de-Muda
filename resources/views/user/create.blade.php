@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1 class="m-0 text-dark">Usuários</h1>
@stop

@section('content')
    @include('components.flash-messages')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cadastro</h3>
        </div>
        <form action="{{ route('user.store') }}"
              id="form_validation"
              method="post"
              class="horizontal-form">
            {{ method_field('POST') }}
            <div class="form-body">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            @include('components.input-name', ['required' => true])
                        </div>
                        <div class="col-4">
                            @include('components.input-email', ['required' => true])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            @include('components.input-password', ['required' => true])
                        </div>
                        <div class="col-4">
                            @include('components.input-password_confirmation', ['required' => true])
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
