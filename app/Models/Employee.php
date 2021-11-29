<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	use HasFactory;

	protected $fillable =
	[
		'name',
		'position_id',
		'ip0',
		'ip1',
		'ip2',
	];

	public function position_id()
	{
		return $this->belongsTo(Position::class);
	}
}
