@extends('adminlte::page')

@section('title', 'Espécies')

@section('content_header')
    <h1 class="m-0 text-dark">Espécies</h1>
@stop

@section('content')
    @include('components.flash-messages')
    @include('components.modal-delete')

    <div class="card card-olive">
        <div class="card-header">
            <h3 class="card-title">Listagem</h3>
        </div>
        <div class="card-body">
            <table id="table" class="table nowrap table-striped table-hover display" style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Especie</th>
                    <th>Grupo</th>
                    <th>Tipo</th>
                    <th>Estoque</th>
                    <th class="text-right">AÇÕES</th>
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
                ajax: "{{ route('specie.index') }}",
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        title: 'ID'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        title: 'Nome'
                    },
                    {
                        data: 'specie',
                        name: 'specie',
                        title: 'Especie'
                    },
                    {
                        data: 'group.name',
                        name: 'group.name',
                        title: 'Grupo'
                    },
                    {
                        data: 'type.name',
                        name: 'type.name',
                        title: 'Tipo',
                        defaultContent: '-'
                    },
                    {
                        data: 'inventory',
                        name: 'inventory',
                        title: 'Estoque',
                        defaultContent: '-',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'Ação',
                        class: 'text-right',
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
