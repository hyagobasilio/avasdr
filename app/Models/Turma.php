<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'turmas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'serie_id', 'turno_id', 'hora_inicio', 'hora_fim', 'matriz_id'];

    public function serie()
    {
        return $this->belongsTo('\App\Models\Serie');
    }
    public function turno()
    {
        return $this->belongsTo('\App\Models\Turno');
    }

    public function matriz()
    {
        return $this->belongsTo('\App\Models\Matriz');
    }
}