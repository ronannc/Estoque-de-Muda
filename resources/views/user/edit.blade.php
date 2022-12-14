@extends('adminlte::page')

@section('title', 'Grupos')

@section('content_header')
    <h1 class="m-0 text-dark">Grupos</h1>
@stop

@section('content')
    @include('components.flash-messages')
    <div class="card card-olive">
        <div class="card-header">
            <h3 class="card-title">Edição</h3>
        </div>
        <form action="{{ route('group.update', $data) }}"
              id="form_validation"
              method="post"
              class="horizontal-form">
            {{ method_field('PUT') }}
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
                            @include('components.input-password')
                        </div>
                        <div class="col-4">
                            @include('components.input-password_confirmation')
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
