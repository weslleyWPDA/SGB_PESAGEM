<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FornecedorAdmCont extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fornecedor = fornecedor::whereNull('delete')->get();
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
        $validated = $r->validate([
            'name' => ['required'],
            'cpf_cnpj' => ['required'],

        ]);
        if (fornecedor::create($validated)) {
            toast('Cadastrado!', 'success');
            return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $validator = Validator::make($r->all(), [
            'name' => ['required'],
            'cpf_cnpj' => ['required'],

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        fornecedor::where('id', $id)->update(['delete' => 1]);
        toast('Deletado com Sucesso!', 'error');
        return redirect()->back();
    }
}
