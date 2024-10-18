<?php

namespace App\Http\Controllers\Admin\Category; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; // добавил

class ShowController extends Controller
{
  public function __invoke(Category $category) // называем, как в '/{category}'! 
	{
		/**
		 * Если __invoke($category), то $category просто цифра id (как указано в Route::get('/{category}'),
		 * если __invoke(Category $category), то $category - объект model с указанным id($category)
		 */
		//dd($category);
		
		return view('admin.categories.show', compact('category'));  // изменил .index на .show, compact('categories') на compact('category')
	}
}
