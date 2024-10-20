<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class DestroyController extends Controller
{
  public function __invoke(Tag $tag)
	{
		$tag->delete();
		//return view('admin.tags.index', compact('tag'));
		/**
		 * Почему redirect: если будет просто index, необходимо добавляеть ",compact('tag')", tags\index.blade.php требует $tags.
		 *  
		 */ 
		return redirect()->route('admin.tag.index');
	}
}
