<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class Student extends Model
{
    use SoftDeletes;
    protected $table = 'students';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','surname','age','profession','course_id'];
}

