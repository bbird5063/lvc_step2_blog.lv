<?php

namespace App\Http\Controllers\Admin\Main; // добавляем '\Admin'

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function __invoke()
	{
		return view('admin.main.index');
	}
}
