<?php

namespace App\Http\Controllers\Admin\Category; // переименовал из ...\Main 

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

class CreateController extends Controller
{
  public function __invoke()
	{
		//dd('111111111111111111');
		return view('admin.category.create');
	}
}
