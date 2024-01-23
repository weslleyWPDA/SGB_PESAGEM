<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta charset="utf-8">
    <title>{{ $titulo ?? 'SGB-Pesagem' }}</title>
    <link href="{{ URL::asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('publico/css/layout.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL::asset('publico/img/icon.png') }}">
    @stack('css')
    @stack('css_table')
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
            style="background:var(--layout-color);width:200px">
            <div class="container-fluid d-flex flex-column p-0">
                <ul class="navbar-nav text-center text-light" id="accordionSidebar" style="text-align: center; ">
                    <li class="nav-item text-center">
                        <a href="{{ route('u_inicio') }}">
                            <img src="{{ URL::asset('/publico/img/Logo.png') }}"
                                style="max-width: 60%;padding: 10px;padding-bottom: 10px; margin-top:10px" />
                        </a>
                        <section class="text-center" style="background: #ffffff;border-style: none">
                            <label class="labelinicio">
                                {{ Auth::user()->name }}
                                <br>
                                <a style="color:red">
                                    {{ Auth::user()->admin == null ? 'USUARIO' : 'ADM' }}
                                </a>
                                <br>
                                {{ Auth::user()->fazenda->name ?? 'ERRO' }}
                            </label>
                        </section>
                        {{-- logout --}}
                        <a href="{{ route('logout') }}" class="btn btn-primary btns w-100" type="buttom"
                            style="background-color:red;border:none;border-radius:0px;font-weight: 800; margin: 0 0 10px 0;">SAIR
                        </a>
                        {{-- dropdown --}}
                        <x-drop-navbar.drop-navbar label='PESAGEM'>
                            <a class="dropdown-item" href="{{ route('pesagem.create') }}">Entrada</a>
                            <a class="dropdown-item" href="{{ route('pesagem.index') }}">Saída Pendentes</a>
                            <a class="dropdown-item" href="{{ route('finalizado.index') }}">Saídas Finalizadas</a>
                        </x-drop-navbar.drop-navbar>
                        <x-drop-navbar.drop-navbar label='RELATÓRIOS'>
                            <a class="dropdown-item" href="{{ route('adm_relatorio') }}">Pesagem</a>
                        </x-drop-navbar.drop-navbar>
                        <x-drop-navbar.drop-navbar label='CADASTRO'>
                            <a class="dropdown-item" href="{{ route('fornecedor.index') }}">Fornecedores</a>
                            <a class="dropdown-item" href="{{ route('produtos.index') }}">Produtos</a>
                        </x-drop-navbar.drop-navbar>
                        <div style="display:{{ Auth::user()->admin == null ? 'none' : null }} ">
                            <x-drop-navbar.drop-navbar label='CONFIGURAÇÕES'>
                                <a class="dropdown-item" href="{{ route('usuarios.index') }}">Usuarios</a>
                                <a class="dropdown-item" href="{{ route('fazendas.index') }}">Fazendas</a>
                            </x-drop-navbar.drop-navbar>
                        </div>
                        {{-- fim dropdown --}}
                    </li>
                </ul>
            </div>
            <p style="color:white;font-size:10px;text-align:left;position:absolute">Feito por: WeslleyP.</p>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper" style="width: 100%;">
            <div id="content" style="width: 100%;">
                <x-alerts.time-alert-validator />
                <main style="margin:0px">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</body>
<script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
@include('sweetalert::alert')
<x-botoes.js-textoUpper />
@stack('script')
@stack('script_table')

</html>
