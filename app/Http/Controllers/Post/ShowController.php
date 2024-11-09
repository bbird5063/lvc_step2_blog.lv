<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;

class ShowController extends Controller
{
	public function __invoke(Post $post)
	{
		//Carbon::setLocale('ru_RU'); // чтобы каждый раз это не писать AppServiceProvider@boot
		$date = Carbon::parse($post->created_at);
		$relatedPosts = Post::where('category_id', $post->category_id)
			->where('id', '!=', $post->id) // чтобы в коллекцию не попадал текущий пост
			->get()
			->take(3);
		return view('post.show', compact('post', 'date', 'relatedPosts'));
	}
}
