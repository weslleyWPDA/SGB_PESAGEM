<x-layouts.layouts>
    <nav>
        <a href='{{ route('usuarios.index') }}' type="button" class="btn btn-secondary btns botoes">VOLTAR</a>
    </nav>
    <div
        class="d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center">
        <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}" class="text-center d-grid user"
            style="width: 350px;background:var(--usuario-color);padding: 20px;border-radius: 10px; margin-top:2vh">
            @csrf
            @method('put')
            <h1 style="margin-bottom:20px;color: #ffffff;font-weight: bold;font-size: 20px;">EDITAR USUARIO</h1>
            {{-- usuario --}}
            <label style="color:white;text-align:left;width:100%;font-size: 12px">Usuario:
                <input type="text" class="upper" style="height:30px;display: block;width:100%; padding-left:5px"
                    autocomplete="off" name="name" value="{{ $usuario->name }}">
            </label>
            {{-- password --}}
            <label style="color:white;text-align:left;width:100%;font-size: 12px">Senha:
                <input type="password" style="height:30px;display: block;width:100%; padding-left:5px"
                    autocomplete="off" name="password">
            </label>
            {{-- checkbox admin --}}
            <label style="color:white;font-weight: bold;">ADMIN
                <input type="checkbox" id="admin" {{ $usuario->admin == 1 ? 'checked' : '' }} value="1"
                    name="admin" style="margin-top:20px;min-width: 20px;min-height: 20px">
            </label>
            {{-- select fazenda --}}
            <label style="color:white;text-align:left;width:100%;font-size: 12px">Fazenda:
                <select class="sel" name="fazenda_id"
                    style="width:100%;text-align:center;color:black;font-weight: bold;height:30px" required>
                    <option disabled selected value="{{ $usuario->fazenda_id }}">{{ $usuario->fazenda->name }}</option>
                    @foreach ($fazenda as $faz)
                        <option value="{{ $faz->id }}">{{ $faz->name }}
                        </option>
                    @endForeach
                </select>
            </label>
            {{-- botoes --}}
            <div style="padding: 10px">
                <x-botoes.botoes type='submit' color='green' label='EDITAR' width='auto' />
                <a href='{{ route('usuarios.index') }}' type="button" class="btn btn-danger btns botoes">CANCELAR</a>
            </div>
        </form>
    </div>
    @push('script')
        <x-select2.select2 />
    @endpush
</x-layouts.layouts>
