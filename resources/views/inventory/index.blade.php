@extends('adminlte::page')

@section('title', 'Movimentação de Estoque')

@section('content_header')
    <h1 class="m-0 text-dark">Movimentação de Estoque</h1>
@stop

@section('content')
    @include('components.flash-messages')
    @include('components.modal-delete')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Listagem</h3>
        </div>
        <div class="card-body">
            <table id="table" class="table nowrap table-striped table-hover display" style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Quantidade</th>
                    <th>Especie</th>
                    <th>Viveiro</th>
                    <th>Tipo</th>
                    <th>Responsável</th>
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
                ajax: "{{ route('inventory.index') }}",
                columns: [
                    {
                        data: 'id',
                        name: 'inventories.id',
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
                        class: 'text-right',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            dataTable.on('click', '.delete', function () {
                var id = $(this).data("id");
                $('#formDelete').attr('action', "nursery/" + id + "")
                $('#confirmDiolog').modal('show')
            });
        });
    </script>
@stop
