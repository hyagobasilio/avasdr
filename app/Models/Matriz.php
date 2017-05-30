<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matriz extends Model
{

  protected $table = 'matriz';
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = ['nome', 'codigo', 'curso_id'];

  public function series()
  {
    return $this->hasMany('App\Models\Serie');
  }
  public function curso()
  {
    return $this->belongsTo('App\Models\Curso');
  }
  public function itens()
  {
    return $this->hasMany('App\Models\MatrizItens', 'matriz_id', 'id');
  }
}
