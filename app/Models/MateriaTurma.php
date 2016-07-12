<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MateriaTurma extends Model 
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'materia_turma';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['materia_id', 'turma_id'];

    public function materias() {
        return $this->belongsTo('App\Models\Materia');
    }

    public function turmas() {
        return $this->hasMany('App\Models\Turma');
    }
}