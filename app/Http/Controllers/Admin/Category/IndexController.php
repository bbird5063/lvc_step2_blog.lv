<?php

namespace App\Http\Controllers\Admin\Category; 

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\Models\Category; // добавил

class IndexController extends Controller
{
  public function __invoke()
	{
		$categories = Category::all(); // добавил
		return view('admin.categories.index', compact('categories'));  // добавил compact('categories') - АРГУМЕНТ СТРОКОВЫЙ!
	}
}
