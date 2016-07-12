<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questao extends Model 
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questoes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'capacidade', 
        'elemento_competencia',
        'obj_conhecimento',
        'dificuldade',
        'resposta',
        'questao',
        'comando',
        'docente_id',
        'curso_id'
    ];
    
    public function docente()
    {
        return $this->belongsTo('App\Docente');
    }
    
    public function curso()
    {
        return $this->belongsTo('App\Models\Curso');
    }
    
    public function alternativas()
    {
        return $this->hasMany('App\Models\Alternativa');
    }
}