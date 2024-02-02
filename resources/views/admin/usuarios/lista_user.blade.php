<x-layouts.layouts>
    <nav>
        <a href='{{ route('u_inicio') }}' type="button" class="btn btn-secondary botoes">VOLTAR</a>
        <a href='{{ route('usuarios.create') }}' type="button" class="btn btn-success botoes">CADASTRAR</a>
    </nav>

    <div class='tabeladiv' style="border-radius:10px;padding:10px;margin:15px;background:white">
        <label style='font-size:20px;color:black;text-align:left;width:100%;font-weight:600'>
            USUARIOS
        </label>
        <table id="datatable_tabela" class="display compact" style="width: 100%">
            <thead>
                <tr class="trtable">
                    <th>OPÇOES</th>
                    <th>ID</th>
                    <th>USUARIO</th>
                    <th>FAZENDA</th>
                    <th>NIVEL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $registro)
                    <tr>
                        <td class="tdtable">
                            <form action="{{ route('usuarios.edit', $registro->id) }}" method="get"
                                style="display:inline-block">
                                <button class="bi bi-pencil-square table_icon" title="Editar!" style="color:#DAA520">
                                </button>
                            </form>
                            <form action="{{ route('usuarios.destroy', $registro->id) }}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('delete')
                                <button onclick="return perguntaDelete();" class="bi bi-x-circle table_icon"
                                    title="Deletar!" style="color:red">
                                </button>
                            </form>
                        </td>
                        <td class="tdtable">{{ $registro->id }}</td>
                        <td class="tdtable">{{ $registro->name }}</td>
                        <td class="tdtable">{{ $registro->fazenda->name ?? null }}</td>
                        <td class="tdtable">{{ $registro->admin == 1 ? 'ADMIN' : 'USUARIO' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @push('script')
        <x-datatables.datatables tamanho='10' botoes='null' />
    @endpush
</x-layouts.layouts>
