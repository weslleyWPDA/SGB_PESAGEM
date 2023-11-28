<x-layouts.layouts>
    <nav>
        <a href='{{ route('u_inicio') }}' type="button" class="btn btn-secondary btns botoes">VOLTAR</a>
        <x-botoes.botao_href color='green' label='CADASTRAR' link="{{ route('fazendas.create') }}" />
    </nav>

    <div class='tabeladiv' style="border-radius:10px;padding:10px;margin:15px;background:white">
        <label style='font-size:2vw;color:black;text-align:center;width:100%;font-weight:600'>
            FAZENDAS
        </label>
        <table id="datatable_tabela" class="display compact" style="width:100%">
            <thead>
                <tr class="trtable">
                    <th style="text-align: center">OPÇOES</th>
                    <th style="text-align: center">ID</th>
                    <th style="text-align: center">FAZENDA</th>
                    <th style="text-align: center">PROPRIETARIO</th>
                    <th style="text-align: center">CIDADE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fazenda as $registro)
                    <tr>
                        <td class="tdtable">
                            <form action="{{ route('fazendas.edit', $registro->id) }}" method="get"
                                style="display:inline-block">
                                <button class="bi bi-pencil-square table_icon" title="Editar!"
                                    style="background-color:rgba(0,0,0,0);font-size:20px;color:#DAA520;
                                     display:{{ Auth::user()->admin > null ? '' : 'none' }}">
                                </button>
                            </form>
                            <form action="{{ route('fazendas.destroy', $registro->id) }}" method="POST"
                                style="display:inline-block;margin-left:5px">
                                @csrf
                                @method('delete')
                                <button onclick="return perguntaDelete();" class="bi bi-x-circle table_icon"
                                    title="Deletar!"
                                    style="background-color:rgba(0,0,0,0);font-size:20px;color:red;
                                     display:{{ Auth::user()->admin > null ? '' : 'none' }}">
                                </button>
                            </form>
                        </td>
                        <td class="tdtable">{{ $registro->id }}</td>
                        <td class="tdtable">{{ $registro->name }}</td>
                        <td class="tdtable">{{ $registro->proprietario }}</td>
                        <td class="tdtable">{{ $registro->cidade }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @push('script')
            <x-datatables.datatables tamanho='10' botoes='null' />
        @endpush
        </x-layouts.adm_layouts>
