<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fazenda;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsuarioAdmCont extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all()->whereNull('delete');
        return view('admin.usuarios.lista_user', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fazenda = Fazenda::all()->whereNull('delete');
        return view('admin.usuarios.cadastro', compact('fazenda'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $validated = $r->validate([
            'name' => ['required', Rule::unique('users')->whereNull('delete')],
            'password' => 'required',
            'fazenda_id' => 'required',
            'admin' => 'nullable',
        ], [
            "name.unique" => "Usuario já existente!",
            "name.required" => "Usuario vazio!",
            "password.required" => "Senha vazio!",
            "fazenda_id.required" => "Fazenda vazio!",


        ]);
        if (User::create($validated)) {
            toast('Cadastrado!', 'success');
            return redirect()->route('usuarios.index');
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = User::find($id);
        if (!$usuario) {
            toast('Erro!', 'error');
            return redirect(route('usuarios.index'));
        }
        $fazenda = fazenda::all();
        return view('admin.usuarios.edita_usuario', compact('fazenda', 'usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $validator = Validator::make($r->all(), [
            'name' => ['required', Rule::unique('users')->whereNull('delete')->ignore($id)],
            'password' => 'required',
            'fazenda_id' => 'required',
            'admin' => 'nullable',
        ], [
            "name.unique" => "Usuario já existente!",
            "name.required" => "Usuario vazio!",
            "password.required" => "Senha vazio!",
            "fazenda_id.required" => "Fazenda vazio!",
        ]);

        if ($validator->fails()) {
            return redirect()->route('usuarios.index')
                ->withErrors($validator)
                ->withInput();
        } else {
            if (User::where('id', $id)->update([
                'name' => $r->name, 'password' => Hash::make($r->password),
                'fazenda_id' => $r->fazenda_id, 'admin' =>  $r->admin,
            ])) {
                toast('Editado com Sucesso!', 'success');
                return redirect()->route('usuarios.index');
            } else {
                toast('Erro ao Editar!', 'error');
                return redirect()->route('usuarios.index');
            };
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->update(['delete' => 1]);
        toast('Deletado com Sucesso!', 'error');
        return redirect()->back();
    }
}
