<x-layouts.layouts>
    {{-- <a href='javascript:history.back()' type="button" class="btn btn-secondary btns botoes">VOLTAR</a> --}}
    <x-botoes.botao_href color='gray' label='VOLTAR' link="{{ route('u_inicio') }}" />


    <div class='tabeladiv' style="border-radius:10px;padding:10px;margin:0 20px 0 20px;background:white">
        <label style='font-size:18px;color:black;text-align:center;width:100%;font-weight:600'>
            SAIDAS PENDENTES
        </label>
        <table id="datatable_tabela" class="display compact table-hover" style="width:100%">
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
                    <th style="text-align: center;display:{{ Auth::user()->admin > null ? '' : 'none' }}">FAZENDA
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesagem as $registro)
                    <tr class="text-center" style="font-size:12px!important">
                        <td class="tdtable">
                            <form action="{{ route('finalizado.edit', $registro->id) }}" method="get"
                                style="display:inline-block">
                                <button class="bi bi-truck" title="Saida!"
                                    style="color:green;font-size: 20px;background-color:rgba(255, 0, 0, 0);">
                                </button>
                            </form>
                            <form action="{{ route('pesagem.edit', $registro->id) }}" method="get"
                                style="display:inline-block">
                                <button class="bi bi-pencil-square" title="Editar!"
                                    style="margin-left:5px;color:rgb(219, 168, 17);font-size: 20px;background-color:rgba(255, 0, 0, 0);">
                                </button>
                            </form>
                        </td>
                        <td class="tdtable">{{ $registro->id }}</td>
                        <td class="tdtable">{{ $registro->fornecedor->name }}</td>
                        <td class="tdtable">{{ $registro->produto->name }}</td>
                        <td class="tdtable">{{ date('d/m/Y', strtotime($registro->data_entrad)) }}</td>
                        <td class="tdtable">{{ $registro->placa }}</td>
                        <td class="tdtable">{{ $registro->peso_entrad }}</td>
                        <td class="tdtable">{{ $registro->motorista }}</td>
                        <td style="text-align: center;display:{{ Auth::user()->admin > null ? '' : 'none' }}">
                            {{ $registro->fazenda->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @push('script')
            <x-datatables.datatables tamanho='10' botoes='null' />
        @endpush
</x-layouts.layouts>
