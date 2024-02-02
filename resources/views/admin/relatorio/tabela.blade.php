<x-layouts.layouts titulo="PESAGEM {{ Auth::user()->fazenda->name }}">
    <nav>
        <a href='{{ route('adm_relatorio') }}' type="button" class="btn btn-secondary botoes">VOLTAR</a>
        <label class="" style="margin-left:60%;font-size:14px;font-weight:900">Peso
            Liq Total: <a style="color:red">{{ number_format($pesoliqtotal, 0, ',', '.') }}</a>
        </label>
    </nav>

    <body>
        <div class='tabeladiv' style="margin:0 10px 0 10px">
            <label class="w-100 text-left" style='font-size:18px;font-weight:600'>
                RELATÓRIO
            </label>
            <table id="datatable_tabela" class="display compact" style="width: 100%">
                <thead>
                    <tr>
                        <th>Cod.</th>
                        <th>Fornec.</th>
                        <th>Produto</th>
                        <th>Nota</th>
                        <th>Motorista</th>
                        <th>Placa</th>
                        <th>Data_Entrada</th>
                        <th>Data_Saída</th>
                        <th>Peso_Entrada</th>
                        <th>Peso_Saída</th>
                        <th>Peso_Líquido</th>
                        <th>Fazenda</th>
                        <th>Observação</th>
                        <th style="display:none"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $registro)
                        <tr>
                            <td class="tdtable">{{ $registro->p_id }}</td>
                            <td class="tdtable">{{ $registro->forn_name }}</td>
                            <td class="tdtable">{{ $registro->prod_name }}</td>
                            <td class="tdtable">{{ $registro->p_nf }}</td>
                            <td class="tdtable">{{ $registro->p_motorista }}</td>
                            <td class="tdtable">{{ $registro->p_placa }}</td>
                            <td class="tdtable">{{ date('d/m/Y', strtotime($registro->data_entrad_p)) }}</td>
                            <td class="tdtable">{{ date('d/m/Y', strtotime($registro->data_saida_p)) }}</td>
                            <td class="tdtable">{{ number_format($registro->peso_entrad_p, 0, ',', '.') }}</td>
                            <td class="tdtable">{{ number_format($registro->peso_saida_p, 0, ',', '.') }}</td>
                            <td class="tdtable" style="font-weight:900">
                                {{ number_format($registro->peso_entrad_p - $registro->peso_saida_p, 0, ',', '.') }}
                            </td>
                            <td class="tdtable">{{ $registro->faz_name }}</td>
                            <td class="tdtable obs">{{ $registro->observacao }}</td>
                            <td style="display:none"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @push('script')
                <x-datatables.TableRelat tamanho='50' botoes='dom' />
            @endpush
            @push('css')
                <style>
                    .tdtable {
                        font-size: 11px !important
                    }

                    .obs {
                        font-size: 10px !important
                    }
                </style>
            @endpush
        </div>
    </body>
</x-layouts.layouts>
