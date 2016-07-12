<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestaoTemp extends Model 
{
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questoes_temp';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'questao_id',
        'docente_id'
    ];
    
    public function questao()
    {
        return $this->belongsTo('App\Models\Questao');
    }
}