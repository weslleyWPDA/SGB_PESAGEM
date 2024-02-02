{{-- css datatables --}}
@push('css')
    <link rel="stylesheet" href="{{ URL::asset('/datatables/css/dataTables.bootstrap5.min.css') }}" />
    <link href="{{ URL::asset('/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/datatables/css/tabelas.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('script_table')
    {{-- script tabela --}}
    <script src="{{ URL::asset('/datatables/script/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('/datatables/script/dataTables.bootstrap5.min.js') }}"></script>
    {{-- script de formatar data na tabela com server side --}}
    <script src="{{ URL::asset('/datatables/script/moment.min.js') }}"></script>
    <!-- Script -->
    <script type="text/javascript">
        $(document).ready(function() {
            // DataTable
            $('#datatable_tabela').DataTable({
                language: {
                    sUrl: "{{ URL::asset('/datatables/pt_BR.json') }}"
                },
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
                iDisplayLength: {{ $tamanho ?? '10' }},
                order: [
                    [1, 'desc']
                ], //[ 1, 'asc' ]], //ordenaçao das colunas, nesse caso esta por ID
                paginate: true,
                filter: true,
                scrollX: true,
                scrollY: "350px",
                scrollCollapse: true,
                processing: false,
                serverSide: true,
                ajax: "{{ route('said_peso_ajax') }}",
                columns: [{
                        title: 'OPÇÕES',
                        data: 'pid',
                        name: 'pesagem.id',
                        width: 'auto',
                        render: function(data) {
                            return '<form action="{{ route('finalizado.show', 'show') }}" method="post" style="display:inline-block">@csrf @method('GET')<button class="bi bi-card-text table_icon" style="color:blue" title="Imprimir!" name="id" value="' +
                                data + '"></button></form>' +
                                '<form action="{{ route('reabrir') }}" method="POST" style="display:inline-block">@csrf @method('post')<button onclick="return perguntaReabrir();"class="bi bi-caret-left-square table_icon" title="Reabrir!" name="id" value="' +
                                data +
                                '" style="color:#B8860B;display:{{ Auth::user()->admin > null ? '' : 'none' }}"></button></form>' +
                                '<form action="{{ route('finalizado.destroy', 'delete') }}" method="POST" style="display:inline-block">@csrf @method('delete')<button onclick="return perguntaDelete();"class="bi bi-x-circle table_icon" title="Deletar!" name="id" value="' +
                                data +
                                '" style="color:red;display:{{ Auth::user()->admin > null ? '' : 'none' }}"></button></form>'
                        },
                    }, {
                        title: 'COD',
                        data: 'pid',
                        name: 'pesagem.id',
                        width: 'auto',
                    }, {
                        title: 'FORNEC.',
                        data: 'forn_name',
                        name: 'fornecedores.name',
                        width: 'auto',
                    },
                    {
                        title: 'PRODUTO',
                        data: 'prod_name',
                        name: 'produtos.name',
                        width: 'auto',

                    },
                    {
                        title: 'ENTRADA',
                        data: 'data_entrad_p',
                        name: 'pesagem.data_entrad',
                        width: 'auto',
                        render: DataTable.render.datetime('DD/MM/YYYY'),
                    },
                    {
                        title: 'SAÍDA',
                        data: 'data_saida_p',
                        name: 'pesagem.data_saida',
                        width: 'auto',
                        render: DataTable.render.datetime('DD/MM/YYYY'),
                    },
                    {
                        title: 'PESO_ENTRAD.',
                        data: 'peso_entrad_p',
                        name: 'pesagem.peso_entrad',
                        width: 'auto',
                        render: DataTable.render.number('.', ',', 0, '')
                    },
                    {
                        title: 'PESO_SAÍDA',
                        data: 'peso_saida_p',
                        name: 'pesagem.peso_saida',
                        width: 'auto',
                        render: DataTable.render.number('.', ',', 0, '')
                    },
                    {
                        title: 'FAZENDA',
                        data: 'faz_name',
                        name: 'fazendas.name',
                        width: 'auto',
                        visible: {{ Auth::user()->admin > null ? 'true' : 'false' }},
                    }
                ],
            });
        });

        function perguntaDelete() {
            return confirm('Deseja realmente DELETAR?');
        }

        function perguntaReabrir() {
            return confirm('Deseja realmente REABRIR?');
        }
    </script>
@endpush
