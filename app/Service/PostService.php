<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
//use Exception

class PostService
{
	public function store($data)
	{
		try {
			DB::beginTransaction();
			$tagIds = $data['tag_ids'];
			unset($data['tag_ids']);

			// Переопределяем элементы массива $data:
			$data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
			$data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
			$post = Post::firstOrCreate($data); // получаем наш пост
			$post->tags()->attach($tagIds); // tags() в модели Post

			DB::commit();
		} catch (\Exception $exception) {
			DB::rollBack();
			//return $exception->getMessage(); // в прошлой лекции
			abort(404); // LVC
		}
	}

	public function update($data, $post)
	{
		try {
			DB::beginTransaction();
			$tagIds = $data['tag_ids'];
			unset($data['tag_ids']);

			if (isset($data['preview_image']))
				$data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
			if (isset($data['main_image']))
				$data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

			$post->update($data);
			$post->tags()->sync($tagIds); // в отличие от store в update метод sync(он удаляет не нужные привязки и добавляем те, которые мы указали)
			DB::commit();
		} catch (\Exception $exception) {
			DB::rollBack();
			//return $exception->getMessage(); // в прошлой лекции
			abort(500); // LVC
		}

		return $post;
	}
}
