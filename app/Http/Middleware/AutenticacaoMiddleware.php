<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $metodo_autenticao, $perfil)
    {
        if ($metodo_autenticao == 'padrao') {
            echo("Buscar os dados no banco </br>");
        }
        if (!$perfil == 'visitante') {
            echo 'mostrar tudo que tem no site' . '<br>';
        }
        echo 'mostrar apenas algumas coisas do site' . '<br>';

        // return $next($request);
        return Response('Acesso Negado, rota precisa de autenticação!!!');
    }
}