<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
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
			'name'	=> 'required|string|max: ' . trans('app.employee.max_length'),
			'position_id'	=> 'required',
			'ip0'		=> 'required',
			'ip1'		=> 'required',
			'ip2'		=> 'required',
		];
	}
}
