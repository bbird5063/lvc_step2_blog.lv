<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true; // заменяем false на true
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		//dd('реквест');
		return [
			'title' => 'required|string', 
			'content' => 'required|string',
			'preview_image' => 'required|file', // добавили
			'main_image' => 'required|file', // добавили
		];
	}
}
