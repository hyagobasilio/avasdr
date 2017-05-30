<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'carga_horaria', 'codigo'];

    public function series()
    {
      return $this->hasMany('App\Models\Serie');
    }
}
