<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 
        'texto',
        'turma_id',
        'docente_id',
        'materia_id'
    ];
    
    public function docente()
    {
        return $this->belongsTo('App\Docente');
    }

    public function turma()
    {
        return $this->belongsTo('App\Models\Turma');
    }
    
    public function materia()
    {
        return $this->belongsTo('App\Models\Materia');
    }
}