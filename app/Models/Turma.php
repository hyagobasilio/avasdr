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
    protected $fillable = ['nome', 'ativo'];
}