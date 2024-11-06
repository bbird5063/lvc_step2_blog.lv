<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class DestroyController extends Controller
{
	public function __invoke(Comment $comment)
	{
		$comment->delete();

		// у меня было так, тоже работало:
		//$comments = auth()->user()->comments;
		//return view('personal.comment.index', compact('comments'));
		
		return redirect()->route('personal.comment.index');
	}
}
