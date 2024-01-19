<x-layouts.layouts titulo="PESAGEM {{ Auth::user()->fazenda->name }}">
    <nav>
        <x-botoes.botao_href color='gray' label='VOLTAR' link="{{ route('adm_relatorio') }}" />
        <label class="" style="margin-left:60%;font-size:14px;font-weight:900">Peso
            Liq Total: <label style="color:red">{{ $pesoliqtotal }}</label>
        </label>
    </nav>

    <body>
        <div class='tabeladiv' style="border-radius:10px;padding:10px;margin:0 10px 0 10px;background:white">
            <label style='font-size:18px;color:black;text-align:center;width:100%;font-weight:600'>
                RELATÓRIO
            </label>
            <table id="datatable_tabela" class=" display compact">
                <thead>
                    <tr>
                        <th class="text-center">Cod.</th>
                        <th class="text-center">Fornec.</th>
                        <th class="text-center">Produto</th>
                        <th class="text-center">Nota</th>
                        <th class="text-center">Motorista</th>
                        <th class="text-center">Placa</th>
                        <th class="text-center">Data_Entrada</th>
                        <th class="text-center">Data_Saída</th>
                        <th class="text-center">Peso_Entrada</th>
                        <th class="text-center">Peso_Saída</th>
                        <th class="text-center">Peso_Líquido</th>
                        <th class="text-center" style="display:{{ Auth::user()->admin == null ? 'none' : null }}">
                            Fazenda</th>
                        <th style="display:none"></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($data as $registro)
                        <tr class="text-center">
                            <td class="tdtable">{{ $registro->p_id }}</td>
                            <td class="tdtable">{{ $registro->forn_name }}</td>
                            <td class="tdtable">{{ $registro->prod_name }}</td>
                            <td class="tdtable">{{ $registro->p_nf }}</td>
                            <td class="tdtable">{{ $registro->p_motorista }}</td>
                            <td class="tdtable">{{ $registro->p_placa }}</td>
                            <td class="tdtable">{{ date('d/m/Y', strtotime($registro->data_entrad_p)) }}</td>
                            <td class="tdtable">{{ date('d/m/Y', strtotime($registro->data_saida_p)) }}</td>
                            <td class="tdtable">{{ $registro->peso_entrad_p }}</td>
                            <td class="tdtable">{{ $registro->peso_saida_p }}</td>
                            <td class="tdtable">{{ $registro->peso_entrad_p - $registro->peso_saida_p }}</td>
                            <td class="tdtable" style="display:{{ Auth::user()->admin == null ? 'none' : null }}">
                                {{ $registro->faz_name }}</td>
                            <td style="display:none"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @push('script')
                <x-datatables.TableRelat tamanho='30' botoes='dom' />
            @endpush
            <style>
                .tdtable {
                    font-size: 11px !important
                }
            </style>
        </div>
    </body>
</x-layouts.layouts>
