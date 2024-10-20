<?php

namespace App\Http\Controllers\Admin\Tag; 

use App\Http\Controllers\Controller;
use App\Models\Tag;

class ShowController extends Controller
{
  public function __invoke(Tag $tag) // называем, как в '/{tag}'! 
	{
		/**
		 * Если __invoke($tag), то $tag просто цифра id (как указано в Route::get('/{tag}'),
		 * если __invoke(tag $tag), то $tag - объект model с указанным id($tag)
		 */
		
		return view('admin.tag.show', compact('tag'));
	}
}
