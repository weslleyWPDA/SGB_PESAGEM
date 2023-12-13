<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{ URL::asset('publico/img/icon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pesagem</title>
    <link href="{{ URL::asset('publico/css/layout.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

</head>

<body class="bg-gradient-primary" style="background: var(--login)">
    <div class="container" style="margin-top:1%">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image"
                                    style="background: url('{{ URL::asset('publico/img/img-login.jpeg') }}') left / cover;">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark "
                                            style="width: 100%;font-size: 26px;font-weight: 900;color:black">SGB
                                            PESAGEM </h4>
                                    </div>
                                    <hr>
                                    <form method="POST" action="{{ route('login_user') }}" class="user">
                                        @csrf
                                        {{-- alerta de erros --}}
                                        <x-alerts.time-alert-validator />
                                        <div class="mb-3">
                                            <input autocomplete="off" class="upper input-user w-100"
                                                placeholder="Digite seu Usuario" name="name" required />
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="upper input-password w-100"
                                                placeholder="Digite sua Senha" name="password" required />
                                        </div>
                                        <div class="mb-3">
                                            <select class="sel w-100" name="fazenda_id" required>
                                                <option hidden selected value=""></option>
                                                @foreach ($faz as $faz)
                                                    <option value="{{ $faz->id }}">
                                                        {{ $faz->name }}</option>
                                                @endForeach
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn lbtn"
                                                style="color:white;font-weight:800;background-color:green;padding:5px 25px 5px 25px">LOGIN</button>
                                        </div>
                                        <hr />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- alertas pop up toast --}} {{-- textos maisculo no campo input --}}
    @include('sweetalert::alert')
    <x-botoes.js-textoUpper />
    <x-select2.select2 />
    @stack('script')
    @stack('css')
</body>

</html>

<style>
    .lbtn:hover {
        transform: scale(1.08);
    }

    .input-password {
        border: 1px solid black;
        padding: 1px;
        border-radius: 5px;
    }

    .input-user {
        border: 1px solid black;
        padding: 1px;
        border-radius: 5px;
    }
</style>
