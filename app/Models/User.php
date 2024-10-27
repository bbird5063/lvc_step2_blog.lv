<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes; // ДОБАВИЛИ

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable, SoftDeletes; // SoftDeletes ДОБАВИЛИ (LVC: 'HasApiTokens' нет)

	const ROLE_ADMIN = 0;
	const ROLE_READER = 1; // ПОСЕТИТЕЛИ (читатель)
	public static function getRoles()
	{ // непинг(?)
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
}
