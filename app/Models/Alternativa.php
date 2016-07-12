<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model 
{
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'alternativas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descricao', 
        'justificativa',
        'questao_id'
    ];
    
    public function questao()
    {
        return $this->belongsTo('App\Models\Questao');
    }
}