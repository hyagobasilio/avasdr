<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Utils;

class Questionario extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questionarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descricao',
        'docente_id',
        'turma_id',
        'vigencia',
        'qtd_questoes'
    ];
   

    public function docente() {
        return $this->belongsTo('App\Docente');
    }

    public function turma() {
        return $this->belongsTo('App\Models\Turma');
    }

    public function getVigenciaAttribute($value) {
        return Utils::data_to_br($value);
    }

    public function setVigenciaAttribute($value) {
        $this->attributes['vigencia'] = Utils::data_to_bd($value);
    }

}
