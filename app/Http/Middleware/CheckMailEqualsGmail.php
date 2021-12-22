<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMailEqualsGmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
      // Verifica se está logado, se não tiver redireciona
      if ( !auth()->check() )
      return redirect()->route('login');

  /*
  * Verifica se o e-mail é Gmail
  */
  // Recupera o e-mail do usuário logado
  $email = auth()->user()->email;

  //Recupera o servidor do e-mail
  $dataMail = explode('@', $email);
  $serverMail = $dataMail[1];

  // Verifica se é gmail.com, caso não se redireciona para a Home Page
  if ( $serverMail != 'gmail.com' )
      return redirect('/');


  // Permite que continue (Caso não entre em nenhum dos if acima)...
  return $next($request);
    }
}
