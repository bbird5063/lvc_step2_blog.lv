<?php

namespace App\Http\Controllers\Admin\Post;

//use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Admin\Post\UpdateRequest;
//use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
	public function __invoke(UpdateRequest $request, Post $post)
	{
		$data = $request->validated();
		/**
		 * Т.к. нам нужен '$post' (return view('admin.post.show', compact('post'));), 
		 * PostService@update нам вернет '$post' (return $post), поэтому мы здесь получаем '$post':
		 */
		$post = $this->service->update($data, $post);

		return view('admin.post.show', compact('post'));
	}
}
