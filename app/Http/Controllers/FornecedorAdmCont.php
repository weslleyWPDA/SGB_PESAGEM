<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FornecedorAdmCont extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fornecedor = fornecedor::whereNull('delete')
            ->where('fazenda_id', 'like', Auth::user()->admin > null ? '%' : Auth::user()->fazenda_id)
            ->get();
        return view('admin.fornecedor.listar', compact('fornecedor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        if (Auth::user()->admin == 1) {
            toast('Administrador não Cadastra!', 'error');
            return redirect()->back();
        } else {
            $validated = $r->validate([
                'name' => ['required'],
                'cpf_cnpj' => ['required'],
                'fazenda_id' => ['required'],

            ]);
            if (fornecedor::create($validated)) {
                toast('Cadastrado!', 'success');
                return redirect()->back();
            };
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $validator = $r->validate([
            'name' => ['required'],
            'cpf_cnpj' => ['required'],
        ]);

        if (fornecedor::where('id', $id)->update([
            'name' => $r->name,
            'cpf_cnpj' => $r->cpf_cnpj,
        ])) {
            toast('Editado com Sucesso!', 'success');
            return redirect()->back();
        } else {
            toast('Erro ao Editar!', 'error');
            return redirect()->back();
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->admin > null) {
            fornecedor::where('id', $id)->update(['delete' => 1]);
            toast('Deletado com Sucesso!', 'error');
            return redirect()->back();
        } else {
            toast('Acesso Bloqueado', 'error');
            return redirect()->back();
        };
    }
}
