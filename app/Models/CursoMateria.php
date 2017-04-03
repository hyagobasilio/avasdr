<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CursoMateria extends Model
{

    //public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'curso_materias';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['materia_id', 'curso_id'];

    public function materia() {
        return $this->belongsTo('App\Models\Materia');
    }
    public function curso() {
        return $this->belongsTo('App\Models\Curso');
    }

}
