<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
//use App\Models\User;
//use App\Models\Post;

class IndexController extends Controller
{
	public function __invoke()
	{
		$posts = auth()->user()->likedPosts;
		//dd(auth()->user());
		//dd($posts);
		return view('personal.liked.index', compact('posts'));
	}
}
