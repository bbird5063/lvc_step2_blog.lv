<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use HasFactory;
	use SoftDeletes;  // ДОБАВИЛИ
	protected $guarded = false;  // НУЖНО! либо false, либо [] (Защита массового присвоения) Чтобы мы могли изменять данные в табл.
	protected $table = 'posts'; // LV и так привязывает, но так принято

	public function tags() {
		//отношение
		/**
		 * belongsToMany(аргументы):
		 * --------------------------
		 * ($related = Tag::class, // с кем связываемся(модель)
		 * $table = 'post_tags', // таблица связи 
		 * $foreignPivotKey = 'post_id', // наш id в этой таблице
		 * $relatedPivotKey = 'tag_id',  // id, с кем связываемся в этой таблице
		 * 
		 * $parentKey = null, 
		 * $relatedKey = null, 
		 * $relation = null)
		 */
		return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');

	}
}
