<x-layouts.layouts>
    <nav>
        <a href='{{ route('u_inicio') }}' type="button" class="btn btn-secondary btns botoes">VOLTAR</a>
    </nav>

    <body>
        <div class='tabeladiv' style="border-radius:10px;padding:10px;margin:15px;background:white">
            <label style='font-size:18px;color:black;text-align:center;width:100%;font-weight:600'>
                PESAGENS CONCLUIDAS
            </label>
            <table id="datatable_tabela" class="display compact" style="width:100%">

                <thead>
                    <tr class="trtable">
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    {{-- table ajax --}}
                </tbody>
            </table>
            @push('script')
                <x-datatables.saidas_peso_ajax tamanho='10' botoes='null' />
            @endpush
        </div>
    </body>
</x-layouts.layouts>
