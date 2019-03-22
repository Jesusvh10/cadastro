<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class Module extends Model
{
    use SoftDeletes;
    protected $table = 'modules';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name'];
}
