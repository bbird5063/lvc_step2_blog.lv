<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Exists;

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
		//dd($this->user_id); // мы можем получить любой атрибут
		return [
			'name' => 'required|string',
			/**
			 * Откуда мы берем $this->user_id? См.выше dd($this->user_id)
			 * email' => ...
			 * |unique:users - уникальный в табл.users
			 * ,email,X - ингорирум поля с id=X (поле <input type="hidden" name="user_id" value="{{ $user->id }}">)
			 */
			//'email' => 'required|string|email|unique:users', // было
			'email' => 'required|string|email|unique:users,email,' . $this->user_id,
			'user_id' => 'required|integer|exists:users,id',

			'role' => 'required|integer',
		];
	}

	public function messages()
	{
		//return parent::messages(); // по умолчанию
		return [
			'name.required' => 'Это поле необходимо для заполнения',
			'name.string' => 'Данные должны соответствовать строчному типу',
			'email.required' => 'Это поле необходимо для заполнения',
			'email.string' => 'Данные должны соответствовать строчному типу',
			'email.email' => 'Данные должны соответствовать формату mail@some.domain',
			'email.unique' => 'Пользователь с таким email уже существует',
			'role.required' => 'Это поле необходимо для заполнения',
		];
	}
}
