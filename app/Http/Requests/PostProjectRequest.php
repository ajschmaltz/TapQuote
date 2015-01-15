<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostProjectRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
      'project.tag' => 'required',
      'project.desc' => 'required',
      'project.zip' => 'required|numeric|digits:5',
      'project.cell' => 'required|numeric|digits:10',
      'photos' => 'required|array'
		];
	}

	/**
	 * Get the sanitized input for the request.
	 *
	 * @return array
	 */
	public function sanitize()
	{
		return $this->all();
	}

}
