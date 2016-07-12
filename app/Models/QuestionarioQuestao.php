<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionarioQuestao extends Model 
{
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questionario_questao';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         
        'questionario_id',
        'questao_id'
    ];
    
    public function questionario()
    {
        return $this->belongsTo('App\Models\Questionario');
    }
    
    public function questao()
    {
        return $this->belongsTo('App\Models\Questao');
    }
}