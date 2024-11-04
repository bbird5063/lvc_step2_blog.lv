<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Post;
//use App\Models\User;

class DestroyController extends Controller
{
  public function __invoke(Post $post)
	{
		/**
		 * Нужно отсоединить этот от юзера
		 * likedPosts - полученная коллекция
		 * likedPosts() - запрос в БД
		 * detach - отделять
		 * 
		 * Метод detach удалит соответствующую запись из промежуточной таблицы; однако обе модели останутся в базе данных.
		 * 
		 * 
		 */
		auth()->user()->likedPosts()->detach($post->id);
		/**
		 * Почему redirect: если будет просто index, необходимо добавляеть ",compact('post')", posts\index.blade.php требует $posts.
		 *  
		 */ 
		return redirect()->route('personal.liked.index');
	}
}
