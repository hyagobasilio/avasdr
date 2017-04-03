<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Aluno extends Authenticatable
{
    protected $table = 'alunos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
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
}
