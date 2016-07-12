<?php 
namespace App\Http\Requests\Docente;

use Illuminate\Foundation\Http\FormRequest;

class QuestionarioRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
            
		return [
                    'turma_id'      => 'required',
                    'descricao' 	=> 'required',
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
