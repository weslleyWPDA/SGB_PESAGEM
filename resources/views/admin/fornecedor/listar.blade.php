<x-layouts.layouts>
    <nav style="margin: 5px">
        <a href='{{ route('u_inicio') }}' type="button" class="btn btn-secondary botoes">VOLTAR</a>
        <!-- Button  modal -->
        <a class="btn btn-success botoes" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color:white">
            CADASTRAR
        </a>
    </nav>
    <!-- Modal cadastro-->
    <div style="backdrop-filter: blur(5px);" class="modal fade" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color:var(--fornec-color)">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:white">CADASTRAR FORNECEDOR</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('fornecedor.store') }}">
                        @csrf
                        {{-- nome --}}
                        <div class="col-12">
                            <div class="input-group" style="margin:5px">
                                <input type="text" name="name" autocomplete="off" required minlength="4"
                                    class=" form-control form-control-sm upper" placeholder="NOME"
                                    style="color:black;" />
                            </div>
                            <div class="input-group" style="margin:5px">
                                <input type="text" name="cpf_cnpj" autocomplete="off" required
                                    class=" form-control form-control-sm mascara-cpfcnpj" placeholder="CPF/CNPJ"
                                    style="color:black;" />
                            </div>
                            <input hidden name="fazenda_id" value="{{ Auth::user()->fazenda_id }}" />
                            {{-- botoes --}}
                            <div class="text-center"
                                style="margin-top:10px;width: 100%;padding: 10px;border-radius: 10px;">
                                <button type='submit' class="btn btn-success botoes"
                                    style="color: white">CADASTRAR</button>
                                <button type="button" class="btn btn-danger botoes" data-bs-dismiss="modal"
                                    style="color: white" aria-label="Close">SAIR
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- fim modal --}}

    <div class='tabeladiv' style="margin:0 20px 0 20px">
        <label style='font-size:20px;color:black;text-align:left;width:100%;font-weight:600'>
            FORNECEDORES
        </label>
        <table id="datatable_tabela" class="display compact" style="width:100%">
            <thead>
                <tr class="trtable">
                    <th>OPÇOES</th>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>CPF/CNPJ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fornecedor as $registro)
                    <tr>
                        <td class="tdtable">
                            {{-- inicio modal edit --}}
                            <div style="display: inline-block">
                                <button type="button" class="bi bi-pencil-square table_icon" title="Editar!"
                                    data-bs-toggle="modal" style="color:rgb(219, 168, 17)"
                                    data-bs-target="#ModalEditar{{ $registro->id }}">
                                </button>
                                <!-- Modal Editar-->
                                <form method="POST" action="{{ route('fornecedor.update', $registro->id) }}">
                                    <div style="backdrop-filter: blur(5px);" class="modal fade"
                                        id="ModalEditar{{ $registro->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="background-color:var(--fornec-color)">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel" style="color:white">
                                                        EDITAR FORNECEDOR</h5>
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
                                                                placeholder="NOME" style="color:black;" />
                                                        </div>
                                                        <div class="input-group" style="margin:5px">
                                                            <input type="text" name="cpf_cnpj" autocomplete="off"
                                                                required value="{{ $registro->cpf_cnpj }}"
                                                                class=" form-control form-control-sm mascara-cpfcnpj"
                                                                placeholder="CPF/CNPJ" style="color:black;" />
                                                        </div>
                                                        <input hidden name="fazenda_id"
                                                            value="{{ Auth::user()->fazenda_id }}" />
                                                        {{-- botoes --}}
                                                        <div class="text-center"
                                                            style="margin-top:10px;width: 100%;padding: 10px;border-radius: 10px;">
                                                            <button type='submit' class="btn btn-warning botoes"
                                                                style="color: white">EDITAR</button>
                                                            <button type="button" class="btn btn-danger botoes"
                                                                data-bs-dismiss="modal" aria-label="Close"
                                                                style="color: white">SAIR
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
                            <form action="{{ route('fornecedor.destroy', $registro->id) }}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('delete')
                                <button onclick="return perguntaDelete();" class="bi bi-x-circle table_icon"
                                    title="Deletar!"
                                    style="color:red;
                                     display:{{ Auth::user()->admin > null ? '' : 'none' }}">
                                </button>
                            </form>
                        </td>
                        <td class="tdtable">{{ $registro->id }}</td>
                        <td class="tdtable">{{ $registro->name }}
                            <a style="font-weight:900;display:{{ Auth::user()->admin == null ? 'none' : null }} ">
                                - {{ $registro->fazenda->name }}
                            </a>
                        </td>
                        <td class="tdtable">{{ $registro->cpf_cnpj }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @push('script')
            <x-datatables.datatables tamanho='50' botoes='null' />
            <x-scripts.mask_cpfcnpj />
        @endpush
</x-layouts.layouts>
