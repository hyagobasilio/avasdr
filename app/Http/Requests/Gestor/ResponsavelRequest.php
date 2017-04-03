<?php
namespace App\Http\Requests\Gestor;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Responsavel;
use Illuminate\Support\Facades\Input;

class ResponsavelRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(Responsavel $responsavel)
	{
		return [
                    'nome' 						=> 'required|min:3',
                    'cpf' 						=> 'unique:responsaveis,cpf,'.$this->id,
                    'telefone1'       => 'required',
                    'data_nascimento' => 'required',
                    'sexo'       			=> 'required',
		];
	}

	/*
*	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

}
