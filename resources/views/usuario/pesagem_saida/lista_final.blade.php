<x-layouts.layouts>
    <nav>
        <a href='{{ route('u_inicio') }}' type="button" class="btn btn-secondary btns botoes">VOLTAR</a>
    </nav>

    <body>
        <div class='tabeladiv' style="border-radius:10px;padding:10px;margin:15px">
            <label style='font-size:20px;color:black;text-align:left;width:100%;font-weight:600'>
                PESAGENS CONCLUIDAS
            </label>
            <table id="datatable_tabela" class="display compact" style="width: 100%">

                <thead>
                    <tr class="trtable">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- table ajax --}}
                </tbody>
            </table>
            @push('script')
                <x-datatables.saidas_peso_ajax tamanho='100' botoes='null' />
            @endpush
        </div>
    </body>
</x-layouts.layouts>
