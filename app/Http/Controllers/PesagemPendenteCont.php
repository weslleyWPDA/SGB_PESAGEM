<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\fornecedor;
use App\Models\pesagem;
use App\Models\produto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesagemPendenteCont extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesagem = pesagem::whereNUll('pesagem.data_saida')
            ->whereNull('pesagem.peso_saida')
            ->whereNull('pesagem.delete')
            ->where('pesagem.fazenda_id', 'like', Auth::user()->admin > null ? '%' : Auth::user()->fazenda_id)
            ->get();
        return view('usuario.pesagem.pesagem_pend', compact('pesagem'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fornecedor = fornecedor::whereNUll('delete')
            ->where('fazenda_id', 'like', Auth::user()->admin > null ? '%' : Auth::user()->fazenda_id)
            ->get();
        $produto = produto::whereNUll('delete')->get();
        return view('usuario.pesagem.cadastro', compact('fornecedor', 'produto',));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $validacao = $r->validate([
            "fornecedor_id" => 'required',
            "produto_id" => 'required',
            "nf" => 'required',
            "motorista" => 'required',
            "placa" => 'required',
            "peso_entrad" => 'required',
            "data_entrad" => 'required',
            "fazenda_id" => 'required',
            "user_id" => 'required',
        ]);
        try {
            pesagem::create($validacao);
        } catch (Exception) {
            toast('Erro ao Cadastrar!', 'error');
            return redirect()->back();
        }
        toast('Cadastrado com Sucesso!', 'success');
        return redirect()->route('pesagem.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = pesagem::find($id);
        $pesol = $data->peso_entrad - $data->peso_saida;
        $pesoliquido = $pesol < 0 ? ($pesol) * (-1) : $pesol;
        return view('usuario.pesagem.pdf', compact('data', 'pesoliquido'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dado = pesagem::find($id);
        $fornecedor = fornecedor::whereNUll('delete')
            ->where('fazenda_id', 'like', Auth::user()->admin > null ? '%' : Auth::user()->fazenda_id)
            ->get();
        $produto = produto::whereNUll('delete')->get();
        return view('usuario.pesagem.editar_peso', compact('fornecedor', 'produto', 'dado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        if (pesagem::where('id', $id)->update([
            "fornecedor_id" => $r->fornecedor_id,
            "produto_id" => $r->produto_id,
            "nf" => $r->nf,
            "motorista" => $r->motorista,
            "placa" => $r->placa,
            "peso_entrad" => $r->peso_entrad,
            "data_entrad" => $r->data_entrad,
            "user_id" => $r->user_id,
            "fazenda_id" => $r->fazenda_id,
        ])) {
            toast('Edição Realizada!', 'success');
            return redirect()->route('pesagem.index');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pesagem::where('id', $id)->update('delete', 1);
        toast('Deletado com Sucesso!', 'error');
        return redirect()->back();
    }
}
