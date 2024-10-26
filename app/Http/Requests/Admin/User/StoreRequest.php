<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Type\Integer;

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
		return [
			'name' => 'required|string',
			'email' => 'required|string|email|unique:users', // ДОБАВИЛИ 'unique:users'
			'password' => 'required|string',
			'role' => 'required|integer',
		];
	}

	public function messages()
	{
		//return parent::messages(); // по умолчанию
		return [
			'name.required' => 'Это поле необходимо для заполнения',
			'email.required' => 'Это поле необходимо для заполнения',
			'email.string' => 'Данные должны соответствовать строчному типу',
			'email.email' => 'Данные должны соответствовать формату mail@some.domain',
			'email.unique' => 'Пользователь с таким email уже существует',
			'password.required' => 'Это поле необходимо для заполнения',
			'password.string' => 'Данные должны соответствовать строчному типу',
			'role.required' => 'Это поле необходимо для заполнения',
		];
	}

}
