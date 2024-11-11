<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	use HasFactory;
	protected $table = 'comments';
	protected $guarded = false;

	public function user() {
		/**
		 * Нам нужен один юзер к которому привязан комментарий
		 * 
		 * belongsTo // 'Один К' (имя связанного столбца в родительской таблице)
		 * $related = User::class (связанный)
		 * $foreignKey = 'user_id' (внешний ключ - в данной табл.)
		 * $ownerKey = 'id' (ключ владельца)
		 * 
		 * $relation = null
		 */
		return $this->belongsTo(User::class, 'user_id', 'id');
	}

	public function getDateAsCarbonAttribute() 
	{
		return Carbon::parse($this->created_at);
	}
}
