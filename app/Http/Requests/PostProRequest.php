<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostProRequest extends Request {

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
			'pro.name' => 'required',
      'pro.zip' => 'required|numeric|digits:5',
      'pro.cell' => 'required|numeric|digits:10',
      'pro.tag' => 'required'
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
