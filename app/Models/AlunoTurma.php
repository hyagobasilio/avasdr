<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AlunoTurma extends Model 
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'aluno_turma';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['aluno_id', 'turma_id'];

    public function aluno() {
        return $this->belongsToMany('App\Aluno', 'aluno_turma', 'aluno_id', 'id');
    }

    public function turmas() {
        return $this->hasMany('App\Models\Turma');
    }
}