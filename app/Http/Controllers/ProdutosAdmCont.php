<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\produto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class ProdutosAdmCont extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produto = produto::whereNull('delete')->get();
        return view('admin.produto.listar', compact('produto'));
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
            'name' => Rule::unique('produtos')->whereNull('delete'),
        ], [
            "name.unique" => "Produto já existente!",
        ]);
        if (produto::create($validated)) {
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
            'name' => Rule::unique('produtos')->whereNull('delete')->ignore($id),
        ], [
            "name.unique" => "Produto já existente!",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            if (produto::where('id', $id)->update([
                'name' => $r->name,
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
        produto::where('id', $id)->update(['delete' => 1]);
        toast('Deletado com Sucesso!', 'error');
        return redirect()->back();
    }
}
