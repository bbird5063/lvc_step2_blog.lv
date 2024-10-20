<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // ДОБАВИЛИ

class Category extends Model
{
	use HasFactory;
	use SoftDeletes;  // ДОБАВИЛИ (без этого, только с '$table->softDeletes()', запись удаляется, но дата в 'deleted_at' не добавляется(т.е. удаляется польностю)
	protected $guarded = false;  // НУЖНО! либо false, либо [] (Защита массового присвоения) Чтобы мы могли изменять данные в табл.
	protected $table = 'categories'; // LV и так привязывает, но так принято

}
