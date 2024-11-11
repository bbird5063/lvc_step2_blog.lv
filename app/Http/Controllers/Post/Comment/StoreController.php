<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;

class StoreController extends Controller
{
	public function __invoke(Post $post, StoreRequest $request)
	{
		$data = $request->validated();
		/* В табл. 'comments'
		кроме 'message' есть 
		'post_id'
		'user_id'
		Нужно их добавить в '$data'
		можно отдельно, 
		но так не делают - неудобно */

		$data['user_id'] = auth()->user()->id;
		$data['post_id'] = $post->id;

		Comment::create($data);

		return redirect()->route('post.show', $post->id); // роут ждет '/{post}'
	}
}
