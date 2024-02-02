<x-layouts.layouts>
    <nav style="margin: 5px">
        <a href='{{ route('u_inicio') }}' type="button" class="btn btn-secondary botoes">VOLTAR</a>
        <!-- Button  modal -->
        <a class="btn btn-success botoes" style="color: white" data-bs-toggle="modal" data-bs-target="#exampleModal">
            CADASTRAR
        </a>
    </nav>
    <!-- Modal cadastro-->
    <div style="backdrop-filter: blur(5px);" class="modal fade" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color:var(--produto-color)">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:white;font-weight:900">CADASTRAR PRODUTO
                    </h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('produtos.store') }}">
                        @csrf
                        {{-- nome --}}
                        <div class="col-12">
                            <div class="input-group" style="margin:5px">
                                <input type="text" name="name" autocomplete="off" required minlength="4"
                                    class=" form-control form-control-sm upper" placeholder="Nome" style="color:black;">
                            </div>
                            {{-- botoes --}}
                            <div class="text-center"
                                style="margin-top:10px;width: 100%;padding: 10px;border-radius: 10px;">
                                <button type='submit' class="btn btn-success botoes"
                                    style="color: white">CADASTRAR</button>
                                <button type="button" class="btn btn-danger botoes" data-bs-dismiss="modal"
                                    aria-label="Close">SAIR
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- fim modal --}}

    <div class='tabeladiv' style="border-radius:10px;margin:0 30px 0 30px;background:white">
        <label style='font-size:20px;color:black;text-align:left;width:100%;font-weight:600'>
            PRODUTOS
        </label>
        <table id="datatable_tabela" class="display compact" style="width:100%">
            <thead>
                <tr class="trtable">
                    <th>OPÇOES</th>
                    <th>ID</th>
                    <th>NOME</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produto as $registro)
                    <tr>
                        <td>
                            {{-- inicio modal edit --}}
                            <div style="display: inline-block">
                                <button type="button" class="bi bi-pencil-square table_icon" title="Editar!"
                                    data-bs-toggle="modal" style="color:rgb(219, 168, 17)"
                                    data-bs-target="#ModalEditar{{ $registro->id }}">
                                </button>
                                <!-- Modal Editar-->
                                <form method="POST" action="{{ route('produtos.update', $registro->id) }}">
                                    <div style="backdrop-filter: blur(5px);" class="modal fade"
                                        id="ModalEditar{{ $registro->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="background-color:var(--produto-color)">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"
                                                        style="color:white;font-weight:900">
                                                        EDITAR PRODUTO</h5>
                                                </div>
                                                <div class="modal-body">
                                                    @csrf
                                                    @method('put')
                                                    {{-- nome  --}}
                                                    <div class="col-12">
                                                        <div class="input-group" style="margin:5px">
                                                            <input type="text" name="name" autocomplete="off"
                                                                required minlength="4" value="{{ $registro->name }}"
                                                                class=" form-control form-control-sm upper"
                                                                placeholder="Nome" style="color:black;">
                                                        </div>
                                                        {{-- botoes --}}
                                                        <div class="text-center"
                                                            style="margin-top:10px;width: 100%;padding: 10px;border-radius: 10px;">
                                                            <button type='submit' class="btn btn-warning botoes"
                                                                style="color: white">EDITAR</button>
                                                            <button type="button" class="btn btn-danger botoes"
                                                                data-bs-dismiss="modal" aria-label="Close">CANCELAR
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- fim modal edit --}}
                            <form action="{{ route('produtos.destroy', $registro->id) }}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('delete')
                                <button onclick="return perguntaDelete();" class="bi bi-x-circle table_icon"
                                    title="Deletar!"
                                    style="color:red;display:{{ Auth::user()->admin > null ? '' : 'none' }}">
                                </button>
                            </form>
                        </td>
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @push('script')
            <x-datatables.datatables tamanho='100' botoes='null' />
        @endpush
</x-layouts.layouts>
