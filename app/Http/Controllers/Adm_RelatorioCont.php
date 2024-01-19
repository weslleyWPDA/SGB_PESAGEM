<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fazenda;
use App\Models\fornecedor;
use App\Models\pesagem;
use App\Models\produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Adm_RelatorioCont extends Controller
{
    public function adm_relatorio()
    {
        $fazenda = Fazenda::WhereNull('delete')->get();
        $fornecedor = fornecedor::WhereNull('delete')
            ->where('fazenda_id', 'like', Auth::user()->admin > null ? '%' : Auth::user()->fazenda_id)
            ->get();
        $produto = produto::WhereNull('delete')->get();
        return view('admin.relatorio.relatorio', compact('fornecedor', 'produto', 'fazenda'));
    }
    // =====================================
    public function adm_relatorio_ac(Request $r)
    {
        $data = pesagem::select(
            'fornecedores.name as forn_name',
            'produtos.name as prod_name',
            'pesagem.id as p_id',
            'pesagem.nf as p_nf',
            'pesagem.motorista as p_motorista',
            'pesagem.placa as p_placa',
            'pesagem.data_entrad as data_entrad_p',
            'pesagem.data_saida as data_saida_p',
            'pesagem.peso_entrad as peso_entrad_p',
            'pesagem.peso_saida as peso_saida_p',
            'fazendas.name as faz_name',


        )
            ->whereNull('pesagem.delete')
            ->whereNotNull('pesagem.data_saida')
            ->whereNotNull('pesagem.obs')
            ->whereNotNull('pesagem.peso_saida')

            ->leftjoin('fazendas', 'pesagem.fazenda_id', '=', 'fazendas.id')
            ->leftjoin('fornecedores', 'pesagem.fornecedor_id', '=', 'fornecedores.id')
            ->leftjoin('produtos', 'pesagem.produto_id', '=', 'produtos.id')

            ->where('pesagem.fazenda_id', 'like', Auth::user()->admin > null ? $r->fazenda_id : Auth::user()->fazenda_id)
            ->where('produtos.id', 'like', $r->produto_id ?? '%')
            ->where('pesagem.nf', 'like', $r->nfe ?? '%')
            ->where('fornecedores.id', 'like', $r->fornecedor_id ?? '%')
            ->whereBetween('pesagem.data_entrad', [$r->data_entrada, $r->data_saida])
            ->get();

        $dado = pesagem::select('peso_entrad', 'peso_saida')
            ->whereNull('delete')
            ->whereNotNull('peso_saida')
            ->whereBetween('data_entrad', [$r->data_entrada, $r->data_saida])->get();
        $s_peso_entrad = $dado->sum('peso_entrad');
        $s_peso_saida = $dado->sum('peso_saida');
        $pesoliqtotal = ($s_peso_entrad - $s_peso_saida);




        return view('admin.relatorio.tabela', compact('data', 'pesoliqtotal'));
    }
}
