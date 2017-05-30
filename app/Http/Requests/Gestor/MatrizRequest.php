<?php namespace App\Http\Requests\Gestor;

use Illuminate\Foundation\Http\FormRequest;

class MatrizRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'codigo'							=> 'required|unique:matriz,codigo,'.$this->id.',id',
			'nome'								=> 'required|min:3',
			'curso_id'						=> 'required',
		];
	}

	public function messages()
	{
		return [
			'curso_id.required' => 'O campo curso é obrigatório.'
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
