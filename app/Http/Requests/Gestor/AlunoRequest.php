<?php 
namespace App\Http\Requests\Gestor;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
                    'name' 		=> 'required|min:3',
                    'email' 	=> 'required|email|unique:alunos',
                    'password' 	=> 'required|confirmed|min:5',
                    'cpf'       => 'required'
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

}
