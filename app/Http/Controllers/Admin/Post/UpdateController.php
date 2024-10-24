<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Admin\Post\UpdateRequest;
use Illuminate\Support\Facades\Storage; // добавили

class UpdateController extends Controller
{
  public function __invoke(UpdateRequest $request, Post $post)
	{
		// LVC: транзакций почему-то нет
		$data = $request->validated();
		$tagIds = $data['tag_ids'];
		unset($data['tag_ids']);

		// Переопределяем элементы массива $data:
		//dd($data);
		if(isset($data['preview_image'])) // BB
		$data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
		if(isset($data['main_image'])) // BB
		$data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
		
		//$post = Post::firstOrCreate($data); // удаляем, или будет(при изменениях) добавлять новый пост
		$post->update($data); // подымаем выше $post->tags()->sync($tagIds)
		$post->tags()->sync($tagIds); // в отличие от store в update метод sync(он удаляет не нужные привязки и добавляем те, которые мы указали)
	
		return view('admin.post.show', compact('post'));
	}
}
