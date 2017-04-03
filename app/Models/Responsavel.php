<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Utils;
class Responsavel extends Model
{

    //public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'responsaveis';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'email', 'cpf', 'rg', 'sexo', 'telefone1', 'endereco', 'data_nascimento', 'telefone2'];

    public function alunos() {
        return $this->hasMany('App\Aluno');
    }

    public function getDataNascimentoAttribute($value) {
        return Utils::data_to_br($value);
    }

    public function setDataNascimentoAttribute($value) {
        $this->attributes['data_nascimento'] = Utils::data_to_bd($value);
    }
}
