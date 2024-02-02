<x-layouts.layouts>
    <nav>
        <a href='{{ route('pesagem.index') }}' type="button" class="btn btn-secondary btns botoes">VOLTAR</a>
    </nav>

    <body>
        <form method="POST" action="{{ route('finalizado.update', $data->id) }}" class="text-center d-grid user"
            style="width: 80%;background:var(--pesagem-color);padding: 5px;border-radius: 10px;display:flex;margin: 0 auto;margin-top: 2vh;">
            @csrf
            @method('put')
            <h1 style="color: #ffffff;font-weight: bold;font-size: 18px;width: 100%;margin-top: 5px;">
                CONFIRMAÇÃO DE SAÍDA {{ $data->cod_peso }}</h1>
            <hr style="width: 80%;margin-right: 10%;margin-left: 10%;" />
            <div class="d-inline-block d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
                style="width: 100%;margin: 0px;margin-bottom: 0px;"><label class="form-label text-start"
                    style="width: 40%;height: auto;color: rgb(255,255,255);font-size: 15px;margin-right: 10px;margin-left: 10px;">
                    Fornecedor:
                    <label class="texto">{{ $data->fornecedor->name }}</label>
                </label><label class="form-label text-start"
                    style="width: 40%;height: auto;color: rgb(255,255,255);font-size: 15px;margin-right: 10px;margin-left: 10px;">
                    Produto:
                    <label class="texto">{{ $data->produto->name }}</label>
                </label>
            </div>
            <div class="d-inline-block d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
                style="width: 100%;margin: 0px;margin-bottom: 0px;"><label class="form-label text-start"
                    style="width: 40%;height: auto;color: rgb(255,255,255);font-size: 15px;margin-right: 10px;margin-left: 10px;">
                    NF:
                    <label class="texto">{{ $data->nf }}</label>
                </label><label class="form-label text-start"
                    style="width: 40%;height: auto;color: rgb(255,255,255);font-size: 15px;margin-right: 10px;margin-left: 10px;">
                    Motorista:
                    <label class="texto">{{ $data->motorista }}</label>
                </label>
            </div>
            <div class="d-inline-block d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
                style="width: 100%;margin: 0px;margin-top: -10px;"><label class="form-label text-start"
                    style="width: 40%;height: auto;color: rgb(255,255,255);font-size: 15px;margin-right: 10px;margin-left: 10px;">
                    Placa:
                    <label class="texto">{{ $data->placa }}</label>
                </label><label class="form-label text-start"
                    style="width: 40%;height: auto;color: rgb(255,255,255);font-size: 15px;margin-right: 10px;margin-left: 10px;">
                    Data de Entrada:
                    <label class="texto">{{ date('d/m/Y', strtotime($data->data_entrad)) }}</label>
                </label>


            </div>
            <div class="d-inline-block d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
                style="width: 100%;margin-top: -10px;">
                <label class="form-label text-start"
                    style="width: 40%;height: auto;color: rgb(255,255,255);font-size: 15px;margin-right: 10px;margin-left: 10px;">
                    Peso de Entrada:
                    <label class="texto"> {{ $data->peso_entrad }} KG</label>
                </label>
                <label class="form-label text-start"
                    style="width:40%;height: auto;color: rgb(255,255,255);font-size: 15px;margin-right: 10px;margin-left: 10px;">
                    Peso
                    da Saida:<br />
                    <input id="peso_entrad" class="form-control upper" type="number"autocomplete="off"
                        style="width: 97%;height: 30px;color: rgb(0,0,0);" required name="peso_saida" />
                </label>
            </div>
            <div class="d-inline-block d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
                style="width: 100%;margin-top: -25px;">
                <label class="form-label text-start"
                    style="color: rgb(255,255,255);font-size: 11px;width: 80%;margin-left: 10%;margin-right: 10%;">Observação<br />
                    <input name="observacao" required autocomplete="off" class="form-control upper"
                        style="width: 100%;color: rgb(0,0,0);height: 30px;" />
                </label>
            </div>
            <input hidden value="{{ date('Y-m-d') }}" type="date" name="data_saida">

            {{-- botoes --}}
            <div style="width: 100%;background: rgba(255,255,255,0);">
                <x-botoes.botoes type='submit' color='green' label='REGISTRAR' width='auto' />
                <a href='{{ route('pesagem.index') }}' type="button" class="btn btn-danger btns botoes">CANCELAR</a>
            </div>
        </form>
        <style>
            .texto {
                font-size: 13px;
                color: white;
                font-weight: 700;
                text-decoration: underline
            }

            .form-label.text-start {
                font-size: 13px !important;
            }

            .form-control {
                border-radius: 0px
            }

            input {
                height: 30px !important;
            }
        </style>
        @push('script')
            <x-botoes.js-textoUpper />
        @endpush
    </body>
</x-layouts.layouts>
