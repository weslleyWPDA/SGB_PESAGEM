<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta charset="utf-8">
    <title>{{ $titulo ?? config('app.name') }}</title>
    <link href="{{ URL::asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('publico/css/layout.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL::asset('publico/img/icon.png') }}">
    @stack('css')
    @stack('css_table')
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
            style="background:var(--layout-color)">
            <div class="container-fluid d-flex flex-column p-0">
                <ul class="navbar-nav text-center text-light w-100" id="accordionSidebar">
                    <li class="nav-item text-center">
                        <a href="{{ route('u_inicio') }}">
                            <img class="imagem" src="{{ URL::asset('/publico/img/Logo.png') }}" />
                        </a>
                        <section class="text-center"
                            style="background: #ffffff;border-style: none;font-weight: 900;font-size:10px">
                            <label> {{ Auth::user()->name }}</label>
                            <br>
                            <label style="color:red">
                                {{ Auth::user()->admin == null ? 'USUARIO' : 'ADM' }}</label>
                            <br>
                            <label>{{ Auth::user()->fazenda->name ?? 'ERRO' }}</label>
                            </label>
                        </section>
                        {{-- logout --}}
                        <a href="{{ route('logout') }}" class="btn btn-primary w-100 btn_sair" type="buttom">SAIR
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
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <x-alerts.time-alert-validator />
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</body>
<script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
@include('sweetalert::alert')
<x-scripts.js-textoUpper />
@stack('script')
@stack('script_table')

</html>
