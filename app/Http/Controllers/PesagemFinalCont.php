<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\pesagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PesagemFinalCont extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usuario.pesagem_saida.lista_final');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $r)
    {
        $data = pesagem::find($r->id);
        $pesol = $data->peso_entrad - $data->peso_saida;
        $pesoliquido = $pesol < 0 ? ($pesol) * (-1) : $pesol;
        return view('usuario.pesagem.pdf', compact('data', 'pesoliquido'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = pesagem::find($id);
        return view('usuario.pesagem_saida.saida_confirm', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $te = pesagem::where('id', 'like', $id)->first();
        if (pesagem::where('id', $id)->update([
            'peso_saida' => $r->peso_saida,
            'obs' => $r->observacao,
            'data_saida' => $te->data_saida == null ? $r->data_saida : $te->data_saida,
        ])) {
            toast('Saída Realizada!', 'success');
            return redirect()->route('pesagem.show', $id);
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $r)
    {
        if (Auth::user()->admin > null) {
            pesagem::where('id', $r->id)->delete();
            toast('Deletado com Sucesso!', 'error');
            return redirect()->back();
        } else {
            toast('Acesso Bloqueado', 'error');
            return redirect()->back();
        };
    }
    /**
     * .
     */
    public function reabrir(Request $r)
    {
        if (Auth::user()->admin > null) {
            pesagem::where('id', $r->id)->update([
                'peso_saida' => $r->peso_saida,
                'obs' => $r->observacao,
            ]);
            toast('Reaberto com Sucesso!', 'warning');
            return redirect()->route('pesagem.index');
        } else {
            toast('Acesso Bloqueado', 'error');
            return redirect()->back();
        };
    }
    /**
     * .
     */
    public function said_peso_ajax()
    {
        $data = pesagem::select(
            'fornecedores.name as forn_name',
            'produtos.name as prod_name',
            'pesagem.data_entrad as data_entrad_p',
            'pesagem.data_saida as data_saida_p',
            'pesagem.peso_entrad as peso_entrad_p',
            'pesagem.peso_saida as peso_saida_p',
            'fazendas.name as faz_name',
            'pesagem.id as pid',
        )
            ->whereNull('pesagem.delete')
            ->whereNotNull('pesagem.data_saida')
            ->whereNotNull('pesagem.obs')
            ->whereNotNull('pesagem.peso_saida')
            ->leftjoin('fazendas', 'pesagem.fazenda_id', '=', 'fazendas.id')
            ->leftjoin('fornecedores', 'pesagem.fornecedor_id', '=', 'fornecedores.id')
            ->leftjoin('produtos', 'pesagem.produto_id', '=', 'produtos.id')
            ->where('pesagem.fazenda_id', 'like', Auth::user()->admin > null ? '%' : Auth::user()->fazenda_id);

        return DataTables::of($data)->make(true);
    }
}
