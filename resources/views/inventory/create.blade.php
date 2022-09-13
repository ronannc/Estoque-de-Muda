@extends('adminlte::page')

@section('title', 'Movimentação de Estoque')

@section('content_header')
    <h1 class="m-0 text-dark">Movimentação de Estoque</h1>
@stop

@section('content')
    @include('components.flash-messages')
    <div class="card card-olive">
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
                        <div class="col-5">
                            @include('components.input-date', ['required' => true])
                        </div>
                    </div>
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
                    <div id="move_group">
                        <div class="row groupCopy">
                            <div class="col-2">
                                @include('components.select_array-movement_type', ['required' => true])
                            </div>
                            <div class="col-3">
                                @include('components.input_array-quantity', ['required' => true])
                            </div>
                            <div class="col-3">
                                @include('components.select_array-nursery', ['required' => true])
                            </div>
                            <div class="col-4">
                                @include('components.select_array-specie', ['required' => true])
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-success"
                               id="newGroup">Adicionar <i class="fa fa-plus"></i></a>
                    &nbsp;
                    <a class="btn btn-danger"
                       id="removeGroup">Remover <i class="fa fa-trash"></i></a>
                </div>

                <div class="card-footer">
                    @include('components.form-action')
                </div>

            </div>
        </form>
    </div>
@stop

@push('js')
    <script>
        $(document).ready(function () {

            $('#newGroup').click(function () {
                $('select.select2').select2('destroy');
                $('#move_group .groupCopy:last-child').clone().appendTo('#move_group');
                $('.select2').select2();
            });

            $('#removeGroup').click(function () {
                console.log($('#move_group .groupCopy').length)
                if ($('#move_group .groupCopy').length > 1) {
                    $('#move_group .groupCopy:last-child').remove();
                }
            });
        });
    </script>
@endpush
