<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class DocenteTurma extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'docente_turma';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['turma_id', 'docente_id'];

    public function docente() {
        return $this->belongsTo('App\Docente');
    }

    public function turma() {
        return $this->hasMany('App\Models\Turma');
    }
}
