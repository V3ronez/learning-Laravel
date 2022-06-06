<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/login', function () {
    return 'Login';
})->name('site.login');

// Route::get('/contato/{nome}/{categoria_id}', function (string $nome, int $categoria_id = 1) {
//     echo "ola $nome, a categoria desejada é - $categoria_id";
// })->where('categoria_id', '[0-9]+')->where('nome', '[\W]+');


//app
Route::prefix('/app')->group(function () {
    Route::get('/clientes', function () {
        return 'Clientes';
    })->name('app.clientes');

    Route::get('/fornecedores', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedores');

    Route::get('/produtos', function () {
        return 'Produtos';
    })->name('app.produtos');
});

// redirect

// Route::redirect('/routa1', '/routa2');

Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('site.teste');

// Route::get('/rota2', function () {
//     return redirect()->route('site.rota1');
// })->name('site.rota2');

Route::fallback(function () {
    echo 'Pagina não encontrada, <a href="' . route('site.index') . '">Clique Aqui</a> para ser ir para a pagina principal';
});
