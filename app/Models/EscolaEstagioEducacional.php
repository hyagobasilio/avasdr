<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EscolaEstagioEducacional extends Model
{
  protected $table = 'escolas_estagio_educacional';

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'escola_id',
    'estagio_educacional',
  ];

  public function escola()
  {
    return $this->belongsTo('App\Models\Escola');
  }

  public function estagioEducacional()
  {
    return $this->belongsTo('App\Models\EstagioEducacional', 'estagio_educacional');
  }

  public function materia()
  {
    return $this->belongsTo('App\Models\Materia');
  }

}
