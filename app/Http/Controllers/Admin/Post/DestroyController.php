<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DestroyController extends Controller
{
  public function __invoke(Post $post)
	{
		$post->delete();
		/**
		 * Почему redirect: если будет просто index, необходимо добавляеть ",compact('post')", posts\index.blade.php требует $posts.
		 *  
		 */ 
		return redirect()->route('admin.post.index');
	}
}
