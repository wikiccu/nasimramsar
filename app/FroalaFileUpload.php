<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class FroalaFileUpload extends Model
{
    //
    //use SoftDeletes;

	protected $table = 'froalafileUploads';

	protected $fillable = [
		'title',
		'path'
	];

	protected $dates = [
		'deleted_at'
	];
}
