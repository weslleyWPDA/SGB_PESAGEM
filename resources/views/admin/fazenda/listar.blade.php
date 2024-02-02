<x-layouts.layouts>
    <nav>
        <a href='{{ route('u_inicio') }}' type="button" class="btn btn-secondary botoes">VOLTAR</a>
        <a href='{{ route('fazendas.create') }}' type="button" class="btn btn-success botoes">CADASTRAR</a>
    </nav>

    <div class='tabeladiv' style="border-radius:10px;padding:10px;margin:15px;background:white">
        <label style='font-size:20px;color:black;text-align:left;width:100%;font-weight:600'>
            FAZENDAS
        </label>
        <table id="datatable_tabela" class="display compact" style="width:100%">
            <thead>
                <tr>
                    <th>OPÇOES</th>
                    <th>ID</th>
                    <th>FAZENDA</th>
                    <th>PROPRIETARIO</th>
                    <th>CIDADE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fazenda as $registro)
                    <tr>
                        <td class="tdtable">
                            <form action="{{ route('fazendas.edit', $registro->id) }}" method="get"
                                style="display:inline-block">
                                <button class="bi bi-pencil-square table_icon" title="Editar!" style="color:#DAA520">
                                </button>
                            </form>
                            <form action="{{ route('fazendas.destroy', $registro->id) }}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('delete')
                                <button onclick="return perguntaDelete();" class="bi bi-x-circle table_icon"
                                    title="Deletar!" style="color:red;">
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
