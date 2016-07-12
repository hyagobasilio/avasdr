<?php 
namespace App\Http\Requests\Docente;

use Illuminate\Foundation\Http\FormRequest;

class QuestaoRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
            
		return [
                    'capacidade'      => 'required|max:3',
                    'elemento_competencia'  => 'required|max:3',
                    'obj_conhecimento'  => 'required|max:3',
                    'dificuldade' 	=> 'required',
                    'resposta' 	=> 'required',
                    'questao' 	=> 'required',
                    'comando' 	=> 'required',
                    'curso_id' 	=> 'required',
                    'alternativa-a' 	=> 'required',
                    'alternativa-b' 	=> 'required',
                    'alternativa-c' 	=> 'required',
                    'alternativa-d' 	=> 'required',
                    'alternativa-e' 	=> 'required',
                    'justificativa-a' 	=> 'required',
                    'justificativa-b' 	=> 'required',
                    'justificativa-c' 	=> 'required',
                    'justificativa-d' 	=> 'required',
                    'justificativa-e' 	=> 'required'
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
