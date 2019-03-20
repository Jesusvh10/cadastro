<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class Teacher extends Model
{
    use SoftDeletes;
    protected $table = 'teachers';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','surname','age','profession','course_id'];
}

    