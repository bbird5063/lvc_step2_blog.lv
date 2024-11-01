<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Jobs\StoreUserJob; // ДОБАВИЛИ

//use App\Mail\User\PasswordMail;
//use App\Models\User;
//use Illuminate\Auth\Events\Registered;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Mail;
//use Illuminate\Support\Str;

class StoreController extends Controller
{
	public function __invoke(StoreRequest $request)
	{
		$data = $request->validated();

		StoreUserJob::dispatch($data); // вместо блока, который мы вырезали и вставили в Jobs\StoreUserJob.php

		return redirect()->route('admin.user.index');
	}
}
