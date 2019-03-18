<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class Course extends Model
{
	use SoftDeletes;
    protected $table = 'courses';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name'];


}
