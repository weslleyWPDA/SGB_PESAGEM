<x-layouts.layouts>
    <nav style="margin: 5px">
        <a href='{{ route('u_inicio') }}' type="button" class="btn btn-secondary btns botoes">VOLTAR</a>
        <!-- Button  modal -->
        <a class="btn btn-success btns botoes" data-bs-toggle="modal" data-bs-target="#exampleModal">
            CADASTRAR
        </a>
    </nav>
    <!-- Modal cadastro-->
    <div style="backdrop-filter: blur(5px);" class="modal fade" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color:var(--produto-color)">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:white">CADASTRAR PRODUTO</h5>
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
                                <button type='submit' class="btn btn-success btns">CADASTRAR</button>
                                <button type="button" class="btn btn-danger btns" data-bs-dismiss="modal"
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
        <label style='font-size:22px;color:black;text-align:center;width:100%;font-weight:600'>
            PRODUTOS
        </label>
        <table id="datatable_tabela" class="display compact" style="width:100%">
            <thead>
                <tr class="trtable">
                    <th style="text-align: center">OPÇOES</th>
                    <th style="text-align: center">ID</th>
                    <th style="text-align: center">NOME</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produto as $registro)
                    <tr>
                        <td class="tdtable">
                            {{-- inicio modal edit --}}
                            <div style="display: inline-block">
                                <button type="button" class="bi bi-pencil-square table_icon" title="Editar!"
                                    data-bs-toggle="modal"
                                    style="background-color:#00000000;color:rgb(219, 168, 17);font-size: 20px;display:inline-block;margin-right:5px"
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
                                                    <h5 class="modal-title" id="exampleModalLabel" style="color:white">
                                                        EDITAR PRODUTO</h5>
                                                </div>
                                                <div class="modal-body">
                                                    @csrf
                                                    @method('put')
                                                    {{-- nome fazenda --}}
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
                                                            <button type='submit'
                                                                class="btn btn-warning btns">EDITAR</button>
                                                            <button type="button" class="btn btn-danger btns"
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
                                style="display:inline-block;margin-left:5px">
                                @csrf
                                @method('delete')
                                <button onclick="return perguntaDelete();" class="bi bi-x-circle table_icon"
                                    title="Deletar!"
                                    style="background-color:rgba(0,0,0,0);font-size:20px;color:red; margin:0px;
                                     display:{{ Auth::user()->admin > null ? '' : 'none' }}">
                                </button>
                            </form>
                        </td>
                        <td class="tdtable">{{ $registro->id }}</td>
                        <td class="tdtable">{{ $registro->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @push('script')
            <x-datatables.datatables tamanho='50' botoes='null' />
        @endpush
        </x-layouts.adm_layouts>
