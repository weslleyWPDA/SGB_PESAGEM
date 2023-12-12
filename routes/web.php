<?php

use App\Http\Controllers\ProdutosAdmCont;
use App\Http\Controllers\Adm_RelatorioCont;
use App\Http\Controllers\FazendaAdmCont;
use App\Http\Controllers\FornecedorAdmCont;
use App\Http\Controllers\PesagemFinalCont;
use App\Http\Controllers\PesagemPendenteCont;
use App\Http\Controllers\ULoginController;
use App\Http\Controllers\UsuarioAdmCont;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'UsuarioLogin',], function () {
    // logout / inicio
    Route::get('/inicio', [ULoginController::class, 'u_inicio'])->name('u_inicio');
    // pesagem
    Route::resource('pesagem', PesagemPendenteCont::class);
    // pesagem final
    Route::resource('finalizado', PesagemFinalCont::class);
    Route::get('/peso/listarajax', [PesagemFinalCont::class, 'said_peso_ajax'])->name('said_peso_ajax');
    Route::post('/reabrir', [PesagemFinalCont::class, 'reabrir'])->name('reabrir');
    // relatorio de pesagem /ADM
    Route::get('/relatorio', [Adm_RelatorioCont::class, 'adm_relatorio'])->name('adm_relatorio');
    Route::post('/relatorio/listagem', [Adm_RelatorioCont::class, 'adm_relatorio_ac'])->name('adm_relatorio_ac');
});
// ADM
Route::group(['middleware' => 'AdminLogin',], function () {
    // Usuarioa
    Route::resource('usuarios', UsuarioAdmCont::class);
    //Fazenda
    Route::resource('fazendas', FazendaAdmCont::class);
    // fornecedores
    Route::resource('fornecedor', FornecedorAdmCont::class);
    // produtos
    Route::resource('produtos', ProdutosAdmCont::class);
});
Route::get('/logout', [ULoginController::class, 'logout'])->name('logout');
Route::post('/login_user', [ULoginController::class, 'login_user'])->name('login_user');
Route::get('/', [ULoginController::class, 'login'])->name('login');
