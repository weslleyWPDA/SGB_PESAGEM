{{-- css datatables --}}
@push('css_table')
    <link rel="stylesheet" href="{{ URL::asset('/datatables/css/dataTables.bootstrap5.min.css') }}" />
    <link href="{{ URL::asset('/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/datatables/css/tabelas.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('script_table')
    <x-botoes.js-textoUpper />
    {{-- script tabela --}}
    <script src="{{ URL::asset('/datatables/script/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('/datatables/script/dataTables.bootstrap5.min.js') }}"></script>
    {{-- script de formatar data na tabela com server side --}}
    <script src="{{ URL::asset('/datatables/script/moment.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#datatable_tabela').DataTable({
                language: {
                    sUrl: "{{ URL::asset('/datatables/pt_BR.json') }}"
                },
                "iDisplayLength": {{ $tamanho ?? '10' }},
                // order: [
                //     [1, 'asc']
                // ],
                //[ 1, 'asc' ]], //ordenaçao das colunas, nesse caso esta por ID
                paginate: true,
                filter: true,
                autoWidth: true,
                scrollCollapse: true,
                scrollX: true,
                scrollY: '350px',

                {{ $botoes ?? 'null' }}: 'Bfrtip',
                buttons: [
                    // para chamar os botoes na variavel e so colocar dom // 'copyHtml5',
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    }, {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    }, {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    }, {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':not(:last-child)',
                        }
                    },
                ],

            });
        });

        function perguntaDelete() {
            return confirm('Deseja realmente DELETAR?');
        }
    </script>
@endpush
