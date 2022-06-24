<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [\App\Http\Controllers\PrincipalController::class , 'principal'])->name('site.index');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class , 'contato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class , 'salvar'])->name('site.contato');

Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class , 'sobreNos'])->name('site.sobrenos');
Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class , 'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class , 'autenticar'])->name('site.login');
// Route::get('/contato/{nome}/{categoria_id}', function (string $nome, int $categoria_id = 1) {
//     echo "ola $nome, a categoria desejada é - $categoria_id";
// })->where('categoria_id', '[0-9]+')->where('nome', '[\W]+');


//app
Route::middleware('autenticacao:padrao, visitante')->prefix('app')->group(function () {
    Route::get('/home', [\App\Http\Controllers\HomeController::class , 'index'])->name('app.home');
    Route::get('/sair', [\App\Http\Controllers\LoginController::class , 'sair'])->name('app.sair');
    Route::get('/cliente', [\App\Http\Controllers\ClienteController::class , 'index'])->name('app.cliente');

    Route::get('/fornecedor', [\App\Http\Controllers\FornecedorController::class , 'index'])->name('app.fornecedor');
    Route::post('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class , 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class , 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class , 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msgSucess?}', [\App\Http\Controllers\FornecedorController::class , 'editar'])->name('app.fornecedor.editar');

    Route::get('/produtos', [\App\Http\Controllers\ProdutoController::class , 'index'])->name('app.produto');
});

// redirect

// Route::redirect('/routa1', '/routa2');

Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class , 'teste'])->name('site.teste');

// Route::get('/rota2', function () {
//     return redirect()->route('site.rota1');
// })->name('site.rota2');

Route::fallback(function () {
    echo 'Pagina não encontrada, <a href="' . route('site.index') . '">Clique Aqui</a> para ser ir para a pagina principal';
});
