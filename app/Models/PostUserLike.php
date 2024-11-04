<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUserLike extends Model
{
	use HasFactory;
	protected $table = 'post_user_likes'; // LV и так привязывает, но так принято
	protected $guarded = false;  // НУЖНО! либо false, либо [] (Защита массового присвоения) Чтобы мы могли изменять данные в табл.

}
