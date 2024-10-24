<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB; // добавили

class StoreController extends Controller
{
	public function __invoke(StoreRequest $request)
	{
		try {

			DB::beginTransaction();
			$data = $request->validated();
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
			return $exception->getMessage();
			//abort(404); // LVC, 'DB::...' нет(?)
		}
		return redirect()->route('admin.post.index');
	}
}
