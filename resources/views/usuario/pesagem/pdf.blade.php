<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link href="{{ URL::asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{ URL::asset('publico/img/icon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta charset="utf-8">
    <title>{{ $titulo ?? config('app.name') }}</title>
</head>
<div class="imprimir">
    <a href="{{ route('u_inicio') }}" style="text-decoration: none">
        <button type="button" style="font-weight: 800;" class="btn btn-secondary">VOLTAR</button>
    </a>
    <a href="javascript:;" onclick="window.print();return true">
        <button type="button" style="font-weight: 800;margin:5px;color:white" class="btn btn-success">IMPRIMIR</button>
    </a>
</div>

<div id="printable" class="printable" style="width: 100%">
    <div
        style="width: 710PX;margin-right: 2px;margin-left: 4px;margin-top: 0px;height: 500px;border: 1px solid rgb(0,0,0);border-radius: 5px;margin-bottom: 20px;">
        <div class="container d-inline-block float-start"
            style="width: 465px;height: auto;padding: 0px;margin-right: 2px;margin-bottom: 2px;border-width: 1px;border-style: none;margin-top: 7px;margin-left: 2px;">
            <div class="d-inline-block"
                style="border: 1px solid rgb(0,0,0);width: 449px;height: 155px;margin-left: 6px;"><img
                    class="d-inline-block float-start" src="{{ URL('publico/img/Logo-pdf.png') }}" width="150"
                    height="110"
                    style="width: 160px;margin-right: 10px;margin-left: 10px;margin-top: 15px;margin-bottom: 15px;" />
                <div class="d-inline" style="width: 52%;border-color: rgb(0,0,0);height: 150px">
                    <p
                        style="color: rgb(0,0,0);text-align: left;font-size: 13PX;font-weight: bold;margin-top: 30PX;width: 95%;">
                        {{ $data->fazenda->proprietario ?? null }}</p>
                    <p
                        style="margin-top: -18PX;color: rgb(0,0,0);text-align: left;font-size: 13PX;font-weight: bold;width: 95%;">
                        {{ $data->fazenda->name ?? null }}</p>
                    <p
                        style="margin-top: -18PX;color: rgb(0,0,0);text-align: left;font-size: 13PX;font-weight: bold;width: 95%;">
                        {{ $data->fazenda->zona ?? null }}</p>
                    <p
                        style="margin-top: -18PX;color: rgb(0,0,0);text-align: left;font-size: 13PX;font-weight: bold;width: 95%;">
                        {{ $data->fazenda->cidade ?? null }}</p>
                    <p
                        style="margin-top: -18PX;color: rgb(0,0,0);text-align: left;font-size: 13PX;font-weight: bold;width: 95%;">
                        CEP: {{ $data->fazenda->cep ?? null }}</p>
                </div>
            </div>
            <div class="d-inline-block" style="width: 460px;height: auto;border-width: 1px;border-color: rgb(0,0,0);">
                <div class="d-inline-block" style="margin-top: 5px;margin-left: 6px;height: 49px;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 221px;font-size: 13px;border-width: 1px;border-style: solid;">
                        DATA DE ENTRADA:</p>
                    <p class="text-center d-block textos1"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 221px;border-width: 1px;border-style: solid;border-top-style: none;font-weight: bold;">
                        {{ date('d/m/Y', strtotime($data->data_entrad)) ?? null }}</p>
                </div>
                <div class="d-inline-block" style="width: 49%;margin-top: 5px;height: 49px;margin-left: 0px;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 221px;font-size: 13px;border-width: 1px;border-style: solid;margin-left: 2px;">
                        DATA DE SAÍDA: </p>
                    <p class="text-center d-block textos1"
                        style="max-height:30px;margin-top: -17px;color: rgb(0,0,0);width: 221px;border-width: 1px;border-style: solid;border-top-style: none;font-weight: bold;margin-left: 2px;">
                        {{ date('d/m/Y', strtotime($data->data_saida)) ?? null }}</p>
                </div>
                <div class="d-inline-block" style="margin-top: 0px;margin-left: 6px;height: 49px;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 221px;font-size: 13px;border-width: 1px;border-style: solid;">
                        NOTA FISCAL: </p>
                    <p class="text-center d-block textos1"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 221px;border-width: 1px;border-style: solid;border-top-style: none;font-weight: bold;">
                        {{ $data->nf ?? null }}</p>
                </div>
                <div class="d-inline-block" style="margin-top: 0px;height: 49px;margin-left: 0px;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 221px;font-size: 13px;border-width: 1px;border-style: solid;margin-left: 2px;">
                        PLACA DO VEÍCULO:</p>
                    <p class="text-center d-block textos1"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 221px;border-width: 1px;border-style: solid;border-top-style: none;font-weight: bold;margin-left: 2px;">
                        {{ $data->placa ?? null }}</p>
                </div>
            </div>
            <div style="width: 525px;">
                <div class="d-inline-block" style="width: 450px;margin-top: 5px;height: 49px;margin-left: 6px;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 450px;font-size: 13px;border-width: 1px;border-style: solid;">
                        NOME DO MOTORISTA:</p>
                    <p class="text-center textos2"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 450px;border-width: 1px;border-style: solid;border-top-style: none;font-weight: bold;font-size: 12PX;">
                        {{ $data->motorista ?? null }}</p>
                </div>
            </div>
            <div style="width: 100%;">
                <div class="d-inline-block" style="width: 450px;margin-top: 5px;height: 49px;margin-left: 6px;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 450px;font-size: 13px;border-width: 1px;border-style: solid;">
                        CLIENTE / FORNECEDOR:</p>
                    <p class="text-center textos2"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 450px;border-width: 1px;border-style: solid;border-top-style: none;font-weight: bold;font-size: 12PX;">
                        {{ $data->fornecedor->name ?? null }}
                    </p>
                </div>
            </div>
            <div style="width: 525px;">
                <div class="d-inline-block" style="width: 450px;margin-top: 5px;height: 49px;margin-left: 6px;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 450px;font-size: 13px;border-width: 1px;border-style: solid;">
                        PRODUTO:</p>
                    <p class="text-center textos2"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 450px;border-width: 1px;border-style: solid;border-top-style: none;font-weight: bold;font-size: 12PX;">
                        {{ $data->produto->name ?? null }}</p>
                </div>
            </div>
            <div style="width: 393px;">
                <div class="d-inline-block" style="width: 450px;margin-top: 5px;height: 49px;margin-left: 6px;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 450px;font-size: 13px;border-width: 1px;border-style: solid;">
                        OBSERVAÇÃO:</p>
                    <p class="text-center textos-obs"
                        style="height:40px;margin-top: -17px;color: rgb(0,0,0);width: 450px;border-width: 1px;border-style: solid;border-top-style: none;font-weight: bold;font-size: 12PX;">
                        {{ $data->obs ?? null }}</p>
                </div>
            </div>
        </div>
        <div class="container d-inline-block float-start"
            style="width: 250px;height: 485px;padding: 0px;margin: 0px;margin-top: 5px;margin-left: -12px;margin-right: 0px;border-width: 1px;border-style: none;">
            <div class="d-inline-block float-start d-lg-flex"
                style="border: 1px solid rgb(0,0,0);width: 240px;height: 60px;margin-right: 5px;margin-left: 5px;margin-top: 2px;border-radius: 5PX;">
                <div class="d-inline-block" style="width: 100%;padding: 7px;border-radius: 5PX;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 100%;font-size: 12px;border-style: none;">
                        TICKET DE PESAGEM</p>
                    <p class="text-center"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 100%;font-weight: bold;font-size: 21PX;border-style: none;">
                        {{ $data->id ?? null }}</p>
                </div>
            </div>
            <div class="d-inline-block float-start d-lg-flex"
                style="border: 1px solid rgb(0,0,0);width: 240px;height: 60px;margin-right: 5px;margin-left: 5px;margin-top: 2px;border-radius: 5PX;">
                <div class="d-inline-block" style="width: 100%;padding: 7px;border-style: none;border-radius: 5PX;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 100%;font-size: 12px;border-style: none;">
                        PESO DE ENTRADA</p>
                    <p class="text-center"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 100%;font-size: 21PX;border-style: none;font-weight: bold;">
                        {{ number_format($data->peso_entrad, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="d-inline-block float-start d-lg-flex"
                style="border: 1px solid rgb(0,0,0);width: 240px;height: 60px;margin-right: 5px;margin-left: 5px;margin-top: 2px;border-radius: 5PX;">
                <div class="d-inline-block" style="width: 100%;padding: 7px;border-radius: 5PX;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 100%;font-size: 12px;border-style: none;">
                        PESO DE SAÍDA </p>
                    <p class="text-center"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 100%;font-size: 21PX;border-style: none;font-weight: bold;">
                        {{ number_format($data->peso_saida, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="d-inline-block float-start d-lg-flex"
                style="border: 1px solid rgb(0,0,0);width: 240px;height: 60px;margin-right: 5px;margin-left: 5px;margin-top: 2px;border-radius: 5PX;">
                <div class="d-inline-block" style="width: 100%;padding: 7px;border-radius: 5PX;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 100%;font-size: 12px;border-style: none;">
                        PESO LÍQUIDO</p>
                    <p class="text-center"
                        style="margin-top: -17px;color: rgb(0, 0, 0);width: 100%;font-weight: bold;font-size: 24PX;border-style: none;">
                        {{ number_format($pesoliquido, 0, ',', '.') }}
                    </p>
                </div>
            </div>
            <div class="d-inline-block float-start d-lg-flex"
                style="border: 1px solid rgb(0,0,0);width: 240px;height: 118px;margin-right: 5px;margin-left: 5px;margin-top: 2px;border-radius: 5PX;">
                <label class="form-label form-label"
                    style="width: 90%;border-top-width: 1px;border-top-style: solid;text-align: center;margin-left: 5%;height: 20px;margin-top: 95px;color: rgb(0,0,0);font-size: 13px;font-weight: bold;">MOTORISTA</label>
            </div>
            <div class="d-inline-block float-start d-lg-flex"
                style="border: 1px solid rgb(0,0,0);width: 240px;height: 118px;margin-right: 5px;margin-left: 5px;margin-top: 2px;border-radius: 5PX;">
                <label class="form-label form-label"
                    style="width: 90%;border-top-width: 1px;border-top-style: solid;text-align: center;margin-left: 5%;height: 20px;margin-top: 95px;color: rgb(0,0,0);font-size: 13px;font-weight: bold;">BALANCEIRO</label>
            </div>
        </div>
    </div>
    <hr class="form-label" style="padding-top: 5px;padding-bottom: 5px;width: 100%;" />
    <div
        style="width: 710PX;margin-right: 2px;margin-left: 4px;margin-top: 0px;height: 500px;border: 1px solid rgb(0,0,0);border-radius: 5px;margin-bottom: 20px;">
        <div class="container d-inline-block float-start"
            style="width: 465px;height: auto;padding: 0px;margin-right: 2px;margin-bottom: 2px;border-width: 1px;border-style: none;margin-top: 7px;margin-left: 2px;">
            <div class="d-inline-block"
                style="border: 1px solid rgb(0,0,0);width: 449px;height: 155px;margin-left: 6px;"><img
                    class="d-inline-block float-start" src="{{ URL('publico/img/Logo-pdf.png') }}" width="150"
                    height="110"
                    style="width: 160px;margin-right: 10px;margin-left: 10px;margin-top: 15px;margin-bottom: 15px;" />
                <div class="d-inline" style="width: 52%;border-color: rgb(0,0,0);height: 150px">
                    <p
                        style="color: rgb(0,0,0);text-align: left;font-size: 13PX;font-weight: bold;margin-top: 30PX;width: 95%;">
                        {{ $data->fazenda->proprietario ?? null }}</p>
                    <p
                        style="margin-top: -18PX;color: rgb(0,0,0);text-align: left;font-size: 13PX;font-weight: bold;width: 95%;">
                        {{ $data->fazenda->name ?? null }}</p>
                    <p
                        style="margin-top: -18PX;color: rgb(0,0,0);text-align: left;font-size: 13PX;font-weight: bold;width: 95%;">
                        {{ $data->fazenda->zona ?? null }}</p>
                    <p
                        style="margin-top: -18PX;color: rgb(0,0,0);text-align: left;font-size: 13PX;font-weight: bold;width: 95%;">
                        {{ $data->fazenda->cidade ?? null }}</p>
                    <p
                        style="margin-top: -18PX;color: rgb(0,0,0);text-align: left;font-size: 13PX;font-weight: bold;width: 95%;">
                        CEP: {{ $data->fazenda->cep ?? null }}</p>
                </div>
            </div>
            <div class="d-inline-block" style="width: 460px;height: auto;border-width: 1px;border-color: rgb(0,0,0);">
                <div class="d-inline-block" style="margin-top: 5px;margin-left: 6px;height: 49px;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 221px;font-size: 13px;border-width: 1px;border-style: solid;">
                        DATA DE ENTRADA:</p>
                    <p class="text-center d-block textos1"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 221px;border-width: 1px;border-style: solid;border-top-style: none;font-weight: bold;">
                        {{ date('d/m/Y', strtotime($data->data_entrad)) ?? null }}</p>
                </div>
                <div class="d-inline-block" style="width: 49%;margin-top: 5px;height: 49px;margin-left: 0px;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 221px;font-size: 13px;border-width: 1px;border-style: solid;margin-left: 2px;">
                        DATA DE SAÍDA: </p>
                    <p class="text-center d-block textos1"
                        style="max-height:30px;margin-top: -17px;color: rgb(0,0,0);width: 221px;border-width: 1px;border-style: solid;border-top-style: none;font-weight: bold;margin-left: 2px;">
                        {{ date('d/m/Y', strtotime($data->data_saida)) ?? null }}</p>
                </div>
                <div class="d-inline-block" style="margin-top: 0px;margin-left: 6px;height: 49px;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 221px;font-size: 13px;border-width: 1px;border-style: solid;">
                        NOTA FISCAL: </p>
                    <p class="text-center d-block textos1"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 221px;border-width: 1px;border-style: solid;border-top-style: none;font-weight: bold;">
                        {{ $data->nf ?? null }}</p>
                </div>
                <div class="d-inline-block" style="margin-top: 0px;height: 49px;margin-left: 0px;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 221px;font-size: 13px;border-width: 1px;border-style: solid;margin-left: 2px;">
                        PLACA DO VEÍCULO:</p>
                    <p class="text-center d-block textos1"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 221px;border-width: 1px;border-style: solid;border-top-style: none;font-weight: bold;margin-left: 2px;">
                        {{ $data->placa ?? null }}</p>
                </div>
            </div>
            <div style="width: 525px;">
                <div class="d-inline-block" style="width: 450px;margin-top: 5px;height: 49px;margin-left: 6px;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 450px;font-size: 13px;border-width: 1px;border-style: solid;">
                        NOME DO MOTORISTA:</p>
                    <p class="text-center textos2"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 450px;border-width: 1px;border-style: solid;border-top-style: none;font-weight: bold;font-size: 12PX;">
                        {{ $data->motorista ?? null }}</p>
                </div>
            </div>
            <div style="width: 100%;">
                <div class="d-inline-block" style="width: 450px;margin-top: 5px;height: 49px;margin-left: 6px;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 450px;font-size: 13px;border-width: 1px;border-style: solid;">
                        CLIENTE / FORNECEDOR:</p>
                    <p class="text-center textos2"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 450px;border-width: 1px;border-style: solid;border-top-style: none;font-weight: bold;font-size: 12PX;">
                        {{ $data->fornecedor->name ?? null }}
                    </p>
                </div>
            </div>
            <div style="width: 525px;">
                <div class="d-inline-block" style="width: 450px;margin-top: 5px;height: 49px;margin-left: 6px;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 450px;font-size: 13px;border-width: 1px;border-style: solid;">
                        PRODUTO:</p>
                    <p class="text-center textos2"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 450px;border-width: 1px;border-style: solid;border-top-style: none;font-weight: bold;font-size: 12PX;">
                        {{ $data->produto->name ?? null }}</p>
                </div>
            </div>
            <div style="width: 393px;">
                <div class="d-inline-block" style="width: 450px;margin-top: 5px;height: 49px;margin-left: 6px;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 450px;font-size: 13px;border-width: 1px;border-style: solid;">
                        OBSERVAÇÃO:</p>
                    <p class="text-center textos-obs"
                        style="height:40px;margin-top: -17px;color: rgb(0,0,0);width: 450px;border-width: 1px;border-style: solid;border-top-style: none;font-weight: bold;font-size: 12PX;">
                        {{ $data->obs ?? null }}</p>
                </div>
            </div>
        </div>
        <div class="container d-inline-block float-start"
            style="width: 250px;height: 485px;padding: 0px;margin: 0px;margin-top: 5px;margin-left: -12px;margin-right: 0px;border-width: 1px;border-style: none;">
            <div class="d-inline-block float-start d-lg-flex"
                style="border: 1px solid rgb(0,0,0);width: 240px;height: 60px;margin-right: 5px;margin-left: 5px;margin-top: 2px;border-radius: 5PX;">
                <div class="d-inline-block" style="width: 100%;padding: 7px;border-radius: 5PX;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 100%;font-size: 12px;border-style: none;">
                        TICKET DE PESAGEM</p>
                    <p class="text-center"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 100%;font-weight: bold;font-size: 21PX;border-style: none;">
                        {{ $data->id ?? null }}</p>
                </div>
            </div>
            <div class="d-inline-block float-start d-lg-flex"
                style="border: 1px solid rgb(0,0,0);width: 240px;height: 60px;margin-right: 5px;margin-left: 5px;margin-top: 2px;border-radius: 5PX;">
                <div class="d-inline-block" style="width: 100%;padding: 7px;border-style: none;border-radius: 5PX;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 100%;font-size: 12px;border-style: none;">
                        PESO DE ENTRADA</p>
                    <p class="text-center"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 100%;font-size: 21PX;border-style: none;font-weight: bold;">
                        {{ number_format($data->peso_entrad, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="d-inline-block float-start d-lg-flex"
                style="border: 1px solid rgb(0,0,0);width: 240px;height: 60px;margin-right: 5px;margin-left: 5px;margin-top: 2px;border-radius: 5PX;">
                <div class="d-inline-block" style="width: 100%;padding: 7px;border-radius: 5PX;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 100%;font-size: 12px;border-style: none;">
                        PESO DE SAÍDA </p>
                    <p class="text-center"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 100%;font-size: 21PX;border-style: none;font-weight: bold;">
                        {{ number_format($data->peso_saida, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="d-inline-block float-start d-lg-flex"
                style="border: 1px solid rgb(0,0,0);width: 240px;height: 60px;margin-right: 5px;margin-left: 5px;margin-top: 2px;border-radius: 5PX;">
                <div class="d-inline-block" style="width: 100%;padding: 7px;border-radius: 5PX;">
                    <p class="text-center titulo"
                        style="color: rgb(0,0,0);width: 100%;font-size: 12px;border-style: none;">
                        PESO LÍQUIDO</p>
                    <p class="text-center"
                        style="margin-top: -17px;color: rgb(0,0,0);width: 100%;font-weight: bold;font-size: 21PX;border-style: none;">
                        {{ number_format($pesoliquido, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="d-inline-block float-start d-lg-flex"
                style="border: 1px solid rgb(0,0,0);width: 240px;height: 118px;margin-right: 5px;margin-left: 5px;margin-top: 2px;border-radius: 5PX;">
                <label class="form-label form-label"
                    style="width: 90%;border-top-width: 1px;border-top-style: solid;text-align: center;margin-left: 5%;height: 20px;margin-top: 95px;color: rgb(0,0,0);font-size: 13px;font-weight: bold;">MOTORISTA</label>
            </div>
            <div class="d-inline-block float-start d-lg-flex"
                style="border: 1px solid rgb(0,0,0);width: 240px;height: 118px;margin-right: 5px;margin-left: 5px;margin-top: 2px;border-radius: 5PX;">
                <label class="form-label form-label"
                    style="width: 90%;border-top-width: 1px;border-top-style: solid;text-align: center;margin-left: 5%;height: 20px;margin-top: 95px;color: rgb(0,0,0);font-size: 13px;font-weight: bold;">BALANCEIRO</label>
            </div>
        </div>
    </div>
</div>
<style>
    button:hover {
        transform: scale(1.1)
    }

    .titulo {
        font-size: 11px !important;
        color: black !important;
        font-weight: 600
    }

    .textos1 {
        font-size: 15px !important
    }

    .textos2 {
        font-size: 12px !important
    }

    .textos-obs {
        font-size: 11px !important
    }

    .imprimir {
        margin: 15px;

    }

    @media print {
        body * {
            visibility: hidden;
        }

        #printable,
        #printable * {
            visibility: visible;
        }

        #printable {
            position: fixed;
            left: 0;
            top: 0;
        }

    }
</style>

</html>
