<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'curso_id',
    ];
    public $timestamps = false;

    public function curso()
    {
        return $this->belongsTo('App\Models\Curso');
    }
}
