<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class Note extends Model
{
   use SoftDeletes;
    protected $table = 'notes';
    protected $dates = ['deleted_at'];
    protected $fillable = ['note'];
}
