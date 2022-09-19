@extends('adminlte::page')

@section('title', 'Espécies')

@section('content_header')
    <h1 class="m-0 text-dark"></h1>
@stop

@section('content')
    @include('components.flash-messages')

    <div class="card card-widget widget-user">

        <div class="widget-user-header bg-info" style="height: 60px">
            <h5 class="widget-user-username">Espécie</h5>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">{{$data->name}}</h5>
                        <span class="description-text">Nome Comum</span>
                    </div>

                </div>

                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">{{$data->specie}}</h5>
                        <span class="description-text">Espécie</span>
                    </div>

                </div>

                <div class="col-sm-4">
                    <div class="description-block">
                        <h5 class="description-header">{{ $data->group->name }}</h5>
                        <span class="description-text">Grupo</span>
                    </div>
                </div>

            </div>

        </div>
        <div class="card-body">
            <div class="row mb-4">
                @foreach($data['for_size'] as $size => $count)
                <div class="col-2">
                        <h5 class="description-header">{{$size}}</h5>
                        <span class="description-text">Qtd: {{$count}}</span>
                </div>
                @endforeach
            </div>
            <table id="table" class="table nowrap table-striped table-hover display" style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Quantidade</th>
                    <th>Espécie ID</th>
                    <th>Espécie</th>
                    <th>Viveiro</th>
                    <th>Tamanho</th>
                    <th>tipo</th>
                    <th>Responsável</th>
                    <th>AÇÕES</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">

        $(document).ready(function () {
            var dataTable = $('#table').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                processing: true,
                serverSide: true,
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 linhas', '25 linhas', '50 linhas', 'Mostrar Todas']
                ],
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
                },
                buttons: [
                    'pageLength'
                ],
                ajax: "{{ route('inventory.list', ['specie_id' => $data->id]) }}",
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        title: 'ID'
                    },
                    {
                        data: 'date',
                        name: 'date',
                        title: 'Data'
                    },
                    {
                        data: 'quantity',
                        name: 'quantity',
                        title: 'Quantidade'
                    },
                    {
                        data: 'specie_id',
                        name: 'specie_id',
                        title: 'Espécie ID'
                    },
                    {
                        data: 'specie.name',
                        name: 'specie.name',
                        title: 'Especie'
                    },
                    {
                        data: 'nursery.name',
                        name: 'nursery.name',
                        title: 'Viveiro'
                    },
                    {
                        data: 'type_size.name',
                        name: 'type_size.name',
                        title: 'Tamanho'
                    },
                    {
                        data: 'type',
                        name: 'type',
                        title: 'Tipo'
                    },
                    {
                        data: 'responsible',
                        name: 'responsible',
                        title: 'Responsável'
                    },
                    {
                        data: 'action',
                        name: 'Ação',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            dataTable.on('click', '.delete', function () {
                var id = $(this).data("id");
                $('#formDelete').attr('action', "specie/" + id + "")
                $('#confirmDiolog').modal('show')
            });
        });
    </script>
@stop

