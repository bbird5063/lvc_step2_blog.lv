<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;

class StoreController extends Controller
{
	public function __invoke(Post $post)
	{
		//dd($post->id);

		/**
		 * ->toggle() (переключать)
		 * если пост уже выбран(вкл.) - отвяжет(откл.)
		 * 
		 */
		auth()->user()->likedPosts()->toggle($post->id); 

		//return redirect()->route('post.index');
		return redirect()->back(); // НОВЫЙ МЕТОД
	}
}
