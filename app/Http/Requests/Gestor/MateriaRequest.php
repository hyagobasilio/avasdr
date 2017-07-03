<?php namespace App\Http\Requests\Gestor;

use Illuminate\Foundation\Http\FormRequest;

class MateriaRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'codigo'	=> 'required|unique:materias,codigo,'.$this->id.',id',
      'nome' 		=> 'required|min:3',
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
