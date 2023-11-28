@push('css_table')
    <link href="{{ URL::asset('/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet" type="text/css">
    <style>
        :root {
            --bs-link-hover-color: green !important;
            --paginacao-ativa: green !important;
            --textos: black;
        }

        .page-link {
            font-size: 11px !important;
            color: var(--textos);
        }

        .pagination {
            width: 70%;
        }

        .divinfo {
            width: 27%;
            font-size: 12px;
            text-align: left
        }

        .tabela {
            width: 100%;
            font-size: 12px;
        }

        .divtabela {
            margin: 10px
        }

        .labeltitulo {
            font-size: 20px;
            color: var(--textos);
            font-weight: 600
        }

        .page-link.active,
        .active>.page-link {
            background: var(--paginacao-ativa) !important;
            border: var(--paginacao-ativa) !important;
        }

        .trtabela {
            background-color: black;
            text-align: center !important;
        }

        th {
            color: white;
            text-align: center !important;
        }

        td {
            color: var(--textos) !important;
        }

        .formpesq {
            text-align: right;
            width: 100%;
            padding-right: 15px;
            margin: 2px
        }

        .btntabela {
            background-color: var(--paginacao-ativa);
            width: 80px;
            height: 27px;
            color: white;
            border-radius: 3px;
        }

        .descricao {
            font-size: 10px !important;
        }
    </style>
@endpush
@push('script_table')
    <x-botoes.js-textoUpper />
    <script>
        function perguntaDelete() {
            return confirm('DESEJA REALMENTE DELETAR O REGISTRO?');
        }
    </script>
@endpush
