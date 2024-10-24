<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
		return [
			'title' => 'required|string', 
			'content' => 'required|string',
			'preview_image' => 'nullable|file', // меняю required на nullable
			'main_image' => 'nullable|file', // меняю required на nullable
			'category_id' => 'required|integer|exists:categories,id',
			'tag_ids' => 'nullable|array', // name = "tag_ids[]"
			'tag_ids.*' => 'nullable|integer|exists:tags,id', // 'tag_ids.*' - все элементы tag_ids[]
		];
	}
}
