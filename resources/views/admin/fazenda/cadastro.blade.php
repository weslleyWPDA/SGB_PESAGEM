<x-layouts.layouts>
    <nav>
        <a href='{{ route('fazendas.index') }}' type="button" class="btn btn-secondary botoes">VOLTAR</a>
    </nav>
    <div
        class="d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center">
        <form method="POST" action="{{ route('fazendas.store') }}" class="text-center d-grid user"
            style="width: 70%;background:var(--fazenda-color);padding: 10px;border-radius: 10px;margin-top:50px">
            @csrf
            <h1 style="margin-bottom:20px;color: #ffffff;font-weight: bold;font-size: 20px;">CADASTRO DE FAZENDA</h1>
            {{-- fazenda --}}
            <div class="mb-3">
                <div>
                    <x-inputs.input_faz type='text' place='Nome Fazenda' name='name' />
                    <x-inputs.input_faz type='text' place='Proprietario' name='proprietario' />
                    <x-inputs.input_faz type='text' place='Cidade' name='cidade' />
                    <input required class=" upper" type="text" name="cep" placeholder="CEP"
                        autocomplete="off"onkeyup="handleZipCode(event)" maxlength="9"
                        style="width:300px;color: rgb(0,0,0);font-size: 15px;text-align: left;height: 30px;border-radius: 0px; margin:5px 0 0 5px;padding: 7px">
                    <x-inputs.input_faz type='text' place='Zona' name='zona' />
                </div>
            </div>
            {{-- botoes --}}
            <div>
                <x-botoes.botoes type='submit' color='green' label='CADASTRAR' width='auto' />
                <a href='{{ route('fazendas.index') }}' type="button" class="btn btn-danger botoes">CANCELAR</a>
            </div>
        </form>
        @push('script')
            {{-- script CEP --}}
            <script>
                const handleZipCode = (event) => {
                    let input = event.target
                    input.value = zipCodeMask(input.value)
                }

                const zipCodeMask = (value) => {
                    if (!value) return ""
                    value = value.replace(/\D/g, '')
                    value = value.replace(/(\d{5})(\d)/, '$1-$2')
                    return value
                }
            </script>
        @endpush
    </div>
</x-layouts.layouts>
