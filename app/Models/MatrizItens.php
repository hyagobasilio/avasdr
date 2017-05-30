<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatrizItens extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['matriz_id', 'materia_id', 'carga_horaria'];

    public function materia()
    {
      return $this->belongsTo('App\Models\Materia');
    }

    public function matriz()
    {
      return $this->belongsTo('App\Models\Matriz');
    }
}
