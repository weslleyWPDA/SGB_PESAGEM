<x-layouts.layouts>
    <nav>
        <a href='{{ route('u_inicio') }}' type="button" class="btn btn-secondary botoes">VOLTAR</a>
    </nav>

    <form method="POST" action="{{ route('pesagem.store') }}" class="text-center d-grid user formulario"
        style="margin-top:50px">
        @csrf
        <h1 style="color: #ffffff;font-weight: bold;font-size: 22px;width: 100%;margin-top: 5px;">
            ENTRADA</h1>
        <hr style="width: 80%;margin: 0 10% 0 10%" />
        <div class="d-inline-block d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
            style="width: 100%;margin: 0px;margin-bottom: 0px;">
            <label class="form-label text-start labels">Fornecedor:
                <select class="sel w-100" required name="fornecedor_id">
                    <option hidden selected value="">SELECIONE</option>
                    @foreach ($fornecedor as $dado)
                        <option value="{{ $dado->id }}">{{ $dado->name }} - {{ $dado->cpf_cnpj }}
                            {{ Auth::user()->admin < 1 ? '' : '-' }}
                            {{ Auth::user()->admin < 1 ? '' : $dado->fazenda->name }}
                        </option>
                    @endForeach
                </select>
            </label>
            <label class="form-label text-start labels">Produto:
                <select class="sel w-100" required name="produto_id">
                    <option hidden selected value="">SELECIONE</option>
                    @foreach ($produto as $faz)
                        <option value="{{ $faz->id }}">{{ $faz->name }}
                        </option>
                    @endForeach
                </select>
            </label>
        </div>
        <div class="d-inline-block d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
            style="width: 100%;margin: 0px;margin-top: -10px;">
            <label class="form-label text-start labels">NF:
                <input id="nf" class=" upper" autocomplete="off" type="number"
                    style="width: 100%;height: 30px;color:black" required name="nf" />
            </label>
            <label class="form-label text-start labels">Motorista:<input id="motorista" class=" upper"
                    autocomplete="off" type="text" style="width: 100%;height: 30px;color:black" required
                    name="motorista" />
            </label>
        </div>
        <div class="d-inline-block d-lg-flex justify-content-lg-center align-items-lg-center mb-3"
            style="width: 100%;margin-top: -10px;">
            <label class="form-label text-start labels">Placa
                do Veículo:
                <input id="placa" class=" upper" autocomplete="off" type="text"
                    style="width: 100%;height: 30px;color:black" required name="placa" />
            </label>
            <label class="form-label text-start labels">Peso
                de Entrada(KG):<br />
                <input id="peso_entrad" class=" upper" autocomplete="off" style="width: 100%;height: 30px;color:black"
                    type="number" inputmode="numeric" required name="peso_entrad" />
            </label>
        </div>
        <input hidden value="{{ date('Y-m-d') }}" type="date" name="data_entrad">
        <input hidden value="{{ Auth::user()->id }}" name="user_id">
        <input hidden value="{{ Auth::user()->fazenda->id }}" name="fazenda_id">

        {{-- botoes --}}
        <div>
            <x-botoes.botoes type='submit' color='green' label='REGISTRAR' width='auto' />
            <a href='{{ route('u_inicio') }}' type="button" class="btn btn-danger btns botoes">CANCELAR</a>
        </div>
    </form>
    @push('css')
        <style>
            . {
                border-radius: 0px
            }

            .formulario {
                width: 80%;
                margin: 1% 10% 0 10%;
                height: 80%;
                background: var(--pesagem-color);
                border-radius: 10px;
                padding: 5px
            }

            .labels {
                width: 50%;
                height: auto;
                color: rgb(255, 255, 255);
                font-size: 15px;
                margin-right: 10px;
                margin-left: 10px;
            }

            input {
                padding: 2px;
                height: 30px;
            }
        </style>
    @endpush
    @push('script')
        <x-select2.select2 />
    @endpush
</x-layouts.layouts>
