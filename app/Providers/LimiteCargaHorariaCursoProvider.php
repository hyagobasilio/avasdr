<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Matriz;
use App\Models\MatrizItens;
use Validator;
class LimiteCargaHorariaCursoProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      Validator::extend('limitecargahorariacurso',
                 function($attribute, $value, $parameters, $validator)
     {

       //Recupera a Matriz com ID vindo do primeiro parametro da validação
       $matriz = Matriz::findOrFail(request()->get($parameters[0]));
       // Recupera a carga horária do curso através da matriz
       $cargaHorariaCurso = $matriz->curso->carga_horaria;
       // Recupera a valor da carga horária que está tentando ser registrada
       $cargaHorariaDisciplina = (int)request()->get($parameters[1]);

       // CargaHorária já Registrada nesta matriz
       $cargaHoriaRegistradaNaMatriz = $matriz->itens->sum('carga_horaria');
       return !(($cargaHoriaRegistradaNaMatriz + $cargaHorariaDisciplina) > $cargaHorariaCurso);


     });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
