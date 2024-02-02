<x-layouts.layouts>
    <nav>
        <a href='{{ route('u_inicio') }}' type="button" class="btn btn-secondary botoes">VOLTAR</a>
    </nav>

    <div class='tabeladiv' style="margin:0 20px 0 20px">
        <label class="w-100 text-left" style='font-size:20px;font-weight:600'>
            SAIDAS PENDENTES
        </label>
        <table id="datatable_tabela" class="display compact" style="width: 100%">
            <thead>
                <tr class="text-center trtabela">
                    <th>OPÇOES</th>
                    <th>COD</th>
                    <th>FORNECEDOR</th>
                    <th>PRODUTO</th>
                    <th>ENTRADA</th>
                    <th>PLACA</th>
                    <th>PESO_ENTRAD.</th>
                    <th>MOTORISTA</th>
                    <th style="display:{{ Auth::user()->admin > null ? '' : 'none' }}">FAZENDA
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesagem as $registro)
                    <tr class="text-center">
                        <td>
                            <form action="{{ route('finalizado.edit', $registro->id) }}" method="get"
                                style="display:inline-block">
                                <button class="bi bi-truck table_icon" title="Saida!" style="color:green">
                                </button>
                            </form>
                            <form action="{{ route('pesagem.edit', $registro->id) }}" method="get"
                                style="display:inline-block">
                                <button class="bi bi-pencil-square table_icon" title="Editar!"
                                    style="color:rgb(219, 168, 17);">
                                </button>
                            </form>
                        </td>
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->fornecedor->name }}</td>
                        <td>{{ $registro->produto->name }}</td>
                        <td>{{ date('d/m/Y', strtotime($registro->data_entrad)) }}</td>
                        <td>{{ $registro->placa }}</td>
                        <td> {{ number_format($registro->peso_entrad, 0, ',', '.') }}</td>
                        <td>{{ $registro->motorista }}</td>
                        <td style="display:{{ Auth::user()->admin > null ? '' : 'none' }}">
                            {{ $registro->fazenda->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @push('script')
            <x-datatables.datatables tamanho='50' botoes='null' />
        @endpush
</x-layouts.layouts>
