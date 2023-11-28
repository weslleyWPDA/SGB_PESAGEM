<x-layouts.layouts>
    <nav>
        <a href='{{ route('fazendas.index') }}' type="button" class="btn btn-secondary btns">VOLTAR</a>
    </nav>
    <div class="d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center"
        style="background: rgba(11,10,10,0);margin: 5px;padding: 20px;border-style: none;border-radius: 10px;margin-top:10px">
        <form method="POST" action="{{ route('fazendas.update', $fazenda->id) }}" class="text-center d-grid user"
            style="width: 700px;background:var(--fazenda-color);padding: 10px;border-radius: 10px;margin-top:2vh">
            @csrf
            @method('put')
            <h1 style="margin-bottom:20px;color: #ffffff;font-weight: bold;font-size: 20px;">EDITAR FAZENDA
            </h1>
            {{-- fazenda --}}
            <div class="mb-3">
                <div>
                    <x-inputs.input_faz type='text' place='Nome Fazenda' name='name'
                        value='{{ $fazenda->name }}' />
                    <x-inputs.input_faz type='text' place='Proprietario' name='proprietario'
                        value='{{ $fazenda->proprietario }}' />
                    <x-inputs.input_faz type='text' place='Cidade' name='cidade' value='{{ $fazenda->cidade }}' />
                    <input required class=" upper" type="text" name="cep" placeholder="CEP"
                        autocomplete="off"onkeyup="handleZipCode(event)" maxlength="9" value='{{ $fazenda->cep }}'
                        style="width:300px;color: rgb(0,0,0);font-size: 15px;text-align: left;height: 30px;border-radius: 0px; margin:5px 0 0 5px;padding: 7px">
                    <x-inputs.input_faz type='text' place='Zona' name='zona' value='{{ $fazenda->zona }}' />
                </div>
            </div>
            {{-- botoes --}}
            <div style="margin-top:10px;width: 100%;background: rgba(255,255,255,0);padding: 10px;border-radius: 10px;">
                <x-botoes.botoes type='submit' color='green' label='EDITAR' width='auto' />
                <a href='{{ route('fazendas.index') }}' type="button" class="btn btn-danger btns">CANCELAR</a>
            </div>
        </form>
    </div>
    @push('script')
        <x-botoes.js-textoUpper />
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
</x-layouts.layouts>
