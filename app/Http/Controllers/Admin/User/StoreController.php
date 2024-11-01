<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreController extends Controller
{
	public function __invoke(StoreRequest $request)
	{
		$data = $request->validated();

		/*Создаем пароль:*/
		$password = Str::random(10);
		$data['password'] = Hash::make($password);
		//dd($data);
		$user = User::firstOrCreate(['email' => $data['email']], $data);/* 1 аргумент-признак, email: UNIQ, '$user=' для хелпера event(new Registered($user)) $user обязательно модель*/

		/*ПОСЛЕ создания аккаунта - отправляем пароль:*/
		Mail::to($data['email'])->send(new PasswordMail($password));
		event(new Registered($user)); /*event хелпер, который запускает определенный триггер связаный со сценарием(Registered), user обязательно модель*/

		return redirect()->route('admin.user.index');
	}
}
