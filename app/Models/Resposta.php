<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model 
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         
        'resposta',
        'questao_id',
        'questionario_id',
        'aluno_id',
    ];
    
    
    public function questionario()
    {
        return $this->belongsTo('App\Models\Questionario');
    }
    public function aluno()
    {
        return $this->belongsTo('App\Aluno');
    }
    public function questao()
    {
        return $this->belongsTo('App\Models\Questao');
    }
}