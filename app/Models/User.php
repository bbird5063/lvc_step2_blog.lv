<?php

namespace App\Models;

use App\Notifications\SendVerifyWithQueueNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

// Не нужно:
//use App\Models\Post;
//use App\Models\Comment;

class User extends Authenticatable implements MustVerifyEmail
{
	use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

	const ROLE_ADMIN = 0;
	const ROLE_READER = 1;
	public static function getRoles()
	{
		return [
			self::ROLE_ADMIN => 'Админ',
			self::ROLE_READER => 'Читатель',
		];
	}

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [ // разрешить изменение
		'name',
		'email',
		'password',
		'role',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
		'password' => 'hashed',
	];

	/* перезапишим */
	public function sendEmailVerificationNotification() 
	{
		$this->notify(new SendVerifyWithQueueNotification());
	}

	public function likedPosts()
	{
		/**
		 * belongsToMany() // многие-ко-многим
		 * -----------------
		 * $related = Post::class // данные из какой таблицы берем данные
		 * $table = 'post_user_likes' // через какую таблицу
		 * $foreignPivotKey = 'user_id' // соответвие id этой модели(User)
		 * $relatedPivotKey = 'post_id' // соответвие id модели, из которой берем данные(Post)
		 * $parentKey = null
		 * $relatedKey = null
		 * $relation = null
		 */
		return $this->belongsToMany(Post::class, 'post_user_likes', 'user_id', 'post_id');
	}

	public function comments() 
	{
		/**
		 * hasMany() // один-ко-многим
		 * --------------------
		 * $related = Comment::class
		 * $foreignKey = 'user_id'
		 * $localKey = 'id'
		 */
		return $this->hasMany(Comment::class, 'user_id', 'id');
	}
}
