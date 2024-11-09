<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
  public function __invoke()
	{
		/**
		 * у нас, пока, нет главной страницы,
		 * поэтому redirect:
		 */
			return redirect()->route('post.index');
	}
}
