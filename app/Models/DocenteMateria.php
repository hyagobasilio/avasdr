<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class DocenteMateria extends Model 
{

    //public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'docente_materia';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['materia_id', 'docente_id'];

    public function materia() {
        return $this->belongsTo('App\Models\Materia');
    }
    public function docente() {
        return $this->belongsTo('App\Docente');
    }
    
}