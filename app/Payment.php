<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class Payment extends Model
{
  use SoftDeletes;
    protected $table = 'payments';
    protected $dates = ['deleted_at'];
    protected $fillable = ['date', 'student_id','payment'];  
}
