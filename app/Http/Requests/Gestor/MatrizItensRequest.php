<?php namespace App\Http\Requests\Gestor;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Matriz;
class MatrizItensRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'matriz_id'								=> 'required',
			'materia_id'								=> "required|unique:matriz_itens,materia_id,NULL,id,matriz_id,$this->matriz_id",
			'carga_horaria'								=> 'required|numeric|limitecargahorariacurso:matriz_id,carga_horaria',
		];
	}

	public function messages()
	{
		$matriz = Matriz::find($this->matriz_id);
		$cargaHorariaCurso = $matriz->curso->carga_horaria;
		$cargaHoriaRegistradaNaMatriz = $matriz->itens->sum('carga_horaria');
		$limiteDisponivel = $cargaHorariaCurso - $cargaHoriaRegistradaNaMatriz;
		return [
			'materia_id.required' => 'Informe a Disciplina!',
			'carga_horaria.limitecargahorariacurso' => "O valor inserido ultrapassa o limite disponível de $limiteDisponivel."
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
