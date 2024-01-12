<x-layouts.layouts>
    <nav>
        <a href='{{ route('u_inicio') }}' type="button" class="btn btn-secondary btns botoes">VOLTAR</a>
    </nav>

    <body>
        <form method="POST" action="{{ route('adm_relatorio_ac') }}" class="text-center"
            style="width: 60%;background: var( --relatorio-color);padding: 5px;border-radius: 10px; margin: 0 auto;margin-top:2vh;">
            @csrf
            <h1 style="margin:10px 0 10px 0;color: #ffffff;font-weight: bold;font-size: 20px;">RELATÓRIO DE PESAGEM
            </h1>
            <label
                style="color:white;text-align:left;width:90%;display:{{ Auth::user()->admin == null ? 'none' : null }} ">
                Fazendas:
                <select type="text" class="sel" style="text-align:center;height:30px;width:100%;"
                    name="fazenda_id">
                    <option selected value="%">TODAS</option>
                    @foreach ($fazenda as $dados)
                        <option value="{{ $dados->id }}">{{ $dados->name }}
                        </option>
                    @endForeach
                </select>
            </label>
            {{-- fornecedores --}}
            <label style="color:white;text-align:left;width:90%">Fornecedor:
                <select type="text" class="sel" style="text-align:center;height:30px;width:100%;"
                    name="fornecedor_id">
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
            <label style="color:white;text-align:left;width:90%">Produto:
                <select type="text" class="sel" style="text-align:center;height:30px;width:100%;"
                    name="produto_id">
                    <option selected value="%">TODOS</option>
                    @foreach ($produto as $dados)
                        <option value="{{ $dados->id }}">{{ $dados->name }}
                        </option>
                    @endForeach
                </select>
            </label>
            {{-- periodo --}}
            <div style="width: 100%;margin-top:10px">
                <label style="width: 48%;color:white">Data de Inicio:</label>
                <label style="color:white"></label>
                <label style="width: 48%;color:white">Data de Fim:</label>
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
            label {
                font-size: 12px
            }
        </style>
    </body>
    @push('script')
        <x-select2.select2 /><x-botoes.js-textoUpper />
    @endpush
</x-layouts.layouts>
