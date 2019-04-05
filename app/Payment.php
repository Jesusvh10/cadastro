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
    protected $fillable = ['date', 'student_id','payment','name'];  

    public function getDateAttribute($value)
    {
        return date('m/Y', strtotime($value));
    }

}

//date('M  ', strtotime(