<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\Models\Category;

class DestroyController extends Controller
{
  public function __invoke(Category $category)
	{
		$category->delete();
		//return view('admin.categories.index', compact('category'));
		/**
		 * Почему redirect: если будет просто index, необходимо добавляеть ",compact('category')", categories\index.blade.php требует $categories.
		 *  
		 */ 
		return redirect()->route('admin.category.index');
	}
}
