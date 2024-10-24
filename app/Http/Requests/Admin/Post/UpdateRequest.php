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

	public function messages()
	{
		//return parent::messages(); // по умолчанию
		return [
			'title.required' => 'Это поле необходимо для заполнения', 
			'title.string' => 'Данные должны соответствовать строчному типу', 
			'content.required' => 'Это поле необходимо для заполнения', 
			'content.string' => 'Данные должны соответствовать строчному типу', 
			'preview_image.required' => 'Это поле необходимо для заполнения', 
			'preview_image.file' => 'Необходимо выбрать файл', 
			'main_image.required' => 'Это поле необходимо для заполнения', 
			'main_image.file' => 'Необходимо выбрать файл', 
			'category_id.required' => 'Это поле необходимо для заполнения', 
			'category_id.integer' => 'ID категории должен быть числом', 
			'category_id.exists' => 'ID категории должен быть в базе данных', 
			'tag_ids.array' => 'Необходимо отправить массив данных',
		];
	}
}
