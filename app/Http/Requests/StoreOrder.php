<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			"billing_firstName" => 'required',
			"billing_lastName" => 'required',
			"email" => 'required',
			"billing_address1" => 'required',
			"billing_address2" => 'required',
			"billing_country" => 'required',
			"billing_state" => 'required',
			"billing_zip" => 'required',
		];
	}
}
