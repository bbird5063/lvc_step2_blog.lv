<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
	public function __invoke(StoreRequest $request)
	{
		$data = $request->validated();
		$data['password'] = Hash::make($data['password']); // переназначаем
		//dd($data);
		User::firstOrCreate(['email'=>$data['email']], $data); // 1 аргумент-признак, email: UNIQ

		return redirect()->route('admin.user.index');
	}
}
