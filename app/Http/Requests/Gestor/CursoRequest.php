<?php namespace App\Http\Requests\Gestor;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'codigo'								=> 'required|unique:cursos,codigo,'.$this->id,
			'nome'								=> 'required|min:3',
			'carga_horaria'								=> 'required|numeric',
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
