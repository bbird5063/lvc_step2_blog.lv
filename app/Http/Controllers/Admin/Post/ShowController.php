<?php

namespace App\Http\Controllers\Admin\Post; 

use App\Http\Controllers\Controller;
use App\Models\Post;

class ShowController extends BaseController
{
  public function __invoke(post $post) // называем, как в '/{post}'! 
	{
		/**
		 * Если __invoke($post), то $post просто цифра id (как указано в Route::get('/{post}'),
		 * если __invoke(post $post), то $post - объект model с указанным id($post)
		 */
		
		return view('admin.post.show', compact('post'));
	}
}
