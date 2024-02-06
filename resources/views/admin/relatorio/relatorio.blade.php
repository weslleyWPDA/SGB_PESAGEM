<x-layouts.layouts>
    <nav>
        <a href='{{ route('u_inicio') }}' type="button" class="btn btn-secondary botoes">VOLTAR</a>
    </nav>

    <body>
        <form method="POST" action="{{ route('adm_relatorio_ac') }}" class="text-center"
            style="width: 60%;background: var( --relatorio-color);padding: 5px;border-radius: 10px; margin: 0 auto; margin-top:30px">
            @csrf
            <h1 style="margin:10px;color: #ffffff;font-weight: bold;font-size: 20px;">RELATÓRIO DE PESAGEM
            </h1>
            <label style="display:{{ Auth::user()->admin == null ? 'none' : null }} ">
                Fazendas:
                <select type="text" class="sel w-100" name="fazenda_id">
                    <option selected value="%">TODAS</option>
                    @foreach ($fazenda as $dados)
                        <option value="{{ $dados->id }}">{{ $dados->name }}
                        </option>
                    @endForeach
                </select>
            </label>
            {{-- fornecedores --}}
            <label style="">Fornecedor:
                <select type="text" class="sel w-100" name="fornecedor_id">
                    <option selected value="%">TODOS</option>
                    @foreach ($fornecedor as $dados)
                        <option value="{{ $dados->id }}">{{ $dados->name }} - {{ $dados->cpf_cnpj }}
                            {{ Auth::user()->admin > 0 ? '-' : '' }}
                            {{ Auth::user()->admin == null ? '' : $dados->fazenda->name }}
                        </option>
                    @endForeach
                </select>
            </label>
            {{-- produtos --}}
            <label style="">Produto:
                <select type="text" class="sel w-100" name="produto_id">
                    <option selected value="%">TODOS</option>
                    @foreach ($produto as $dados)
                        <option value="{{ $dados->id }}">{{ $dados->name }}
                        </option>
                    @endForeach
                </select>
            </label>
            {{-- Nota --}}
            <label style="">Nº Nota:
                <input type="number" class="upper w-100" style="font-size:15px;height:30px;padding-left:5px"
                    autocomplete="off" name="nfe">
            </label>
            {{-- periodo --}}
            <div class="w-100">
                <label class="datalabel text-center">Data de Inicio:</label>
                <label class="datalabel text-center">Data de Fim:</label>
            </div>
            <div style="width: 100%">
                <input type="date" required name="data_entrada" style="width:45%; text-align:center;height:30px">
                <input type="date" required name="data_saida" style="width: 45%; text-align:center;height:30px">
            </div>
            {{-- botoes --}}
            <div style="width: 100%;background: rgba(255,255,255,0);margin-top: 15px">
                <x-botoes.botoes type='submit' color='green' label='GERAR' width='auto' />
                <a href='{{ route('u_inicio') }}' type="button" class="btn btn-danger btns botoes">CANCELAR</a>
            </div>
        </form>
        <style>
            form label {
                font-size: 12px;
                color: white;
                text-align: left;
                width: 90%;
            }

            .datalabel {
                width: 48%;
                color: white;
                margin-top: 10px
            }

            form select {
                text-align: center;
                height: 30px;
                width: 100%;
            }
        </style>
    </body>
    @push('script')
        <x-select2.select2 />
    @endpush
</x-layouts.layouts>
