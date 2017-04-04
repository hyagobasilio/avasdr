<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Helpers\Utils;
class Aluno extends Authenticatable
{
    protected $table = 'alunos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'data_nascimento', 'pai_id', 'mae_id', 'rg', 'cpf', 'endereco', 'sexo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pai()
  	{
  		return $this->belongsTo('App\Models\Responsavel', 'pai_id');
  	}

    public function mae()
  	{
  		return $this->belongsTo('App\Models\Responsavel', 'mae_id');
  	}

    public function getDataNascimentoAttribute($value) {
        return Utils::data_to_br($value);
    }

    public function setDataNascimentoAttribute($value) {
        $this->attributes['data_nascimento'] = Utils::data_to_bd($value);
    }
}
