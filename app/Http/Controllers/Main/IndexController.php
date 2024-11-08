<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
//use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function __invoke()
	{
		$posts = Post::paginate(6);
		$randomPosts = Post::get()->random(4);
		/**
		 * 'likedUsers' - наш метод в модели 'Post', 
		 * '->get()' - отдай нам в коллекцию
		 * 'liked_users_count' - LV добавил это поле после 'withCount'
		 * '->take(4)' - первые 4 из коллекции (4 поста в самом шаблоне)
		 */
		$likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4); 

		//dd($likedPosts);
		return view('main.index', compact('posts', 'randomPosts', 'likedPosts'));
	}
}
