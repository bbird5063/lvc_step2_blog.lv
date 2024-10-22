<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage; // само добавилось (?)

class StoreController extends Controller
{
	public function __invoke(StoreRequest $request)
	{
		$data = $request->validated();
		// Переопределяем элементы массива $data:
		$data['preview_image'] = Storage::put('/images', $data['preview_image']);
		$data['main_image'] = Storage::put('/images', $data['main_image']);
		Post::firstOrCreate($data);
		return redirect()->route('admin.post.index');
	}
}
