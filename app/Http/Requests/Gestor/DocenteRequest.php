<?php 
namespace App\Http\Requests\Gestor;

use Illuminate\Foundation\Http\FormRequest;

class DocenteRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
                    'name' 	=> 'required|min:3',
                    'email' 	=> 'required|email|unique:alunos',
                    'password' 	=> 'required|confirmed|min:5',
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
