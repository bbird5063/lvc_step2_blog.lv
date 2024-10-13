<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	use HasFactory;
	protected $guarded = false;  // НУЖНО! либо false, либо [] (Защита массового присвоения) Чтобы мы могли изменять данные в табл.
	protected $table = 'tags'; // LV и так привязывает, но так принято

}
