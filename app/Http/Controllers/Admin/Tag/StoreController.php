<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;

class StoreController extends Controller
{
	public function __invoke(StoreRequest $request)
	{
		$data = $request->validated();
		//tag::create($data); // по такому методу можно нарушить уникальность(т.к. в БД мы на указали уникльность поля 'title')
		Tag::firstOrCreate($data);
		/**
		 * firstOrCreate: 
		 * Два аргумента, два массива. 
		 * 1-массив полей(ключ) и значений. Если находит значение в табл.(в поле ключа элемента), которое равно значению элемента($data['...']), то новую запись создавать не будет.
		 * 2-массив новых значений полей.
		 * 
		 * Если массивы одинаковы, то можно один аргумент(массив). У нас один аргумент.
		 * А если у этого массива ключи равны ключам $data[], то можно просто $data.
		 * Мы так и сделали.
		 */

		return redirect()->route('admin.tag.index'); // redirect()
	}
}
