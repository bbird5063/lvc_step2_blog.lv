<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
	use HasFactory;
	protected $guarded = false;  // НУЖНО! либо false, либо [] (Защита массового присвоения) Чтобы мы могли изменять данные в табл.
	protected $table = 'post_tags'; // LV и так привязывает, но так принято

}
