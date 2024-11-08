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

	public function category() {
		/**
		 * belongsTo // 'Один К' (имя связанного столбца в родительской таблице)
		 * $related = Category::class (связанный)
		 * $foreignKey = 'category_id' (внешний ключ)
		 * $ownerKey = 'id' (ключ владельца)
		 * 
		 * $relation = null
		 */
		//$return = $this->belongsTo(Category::class, 'category_id', 'id');
		//dd($return);
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}

	public function likedUsers() {
		//отношение
		/**
		 * belongsToMany(аргументы):
		 * --------------------------
		 * ($related = User::class, // с кем связываемся(модель)
		 * $table = 'post_users', // таблица связи 
		 * $foreignPivotKey = 'post_id', // наш id в этой таблице
		 * $relatedPivotKey = 'user_id',  // id, с кем связываемся в этой таблице
		 * 
		 * $parentKey = null, 
		 * $relatedKey = null, 
		 * $relation = null)
		 */

		//$return = $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
		//dd($return);
		return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
	}

}
