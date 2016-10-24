<?php 
namespace App\Http\Requests\Docente;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
            
		return [
                    'titulo'      	=> 'required',
                    'materia_id'	=> 'required',
                    'texto'			=> 'required'
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
