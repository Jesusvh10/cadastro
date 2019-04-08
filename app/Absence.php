<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class Absence extends Model
{
    use SoftDeletes;
    protected $table = 'absences';
    protected $dates = ['deleted_at'];
    protected $fillable = ['date', 'tipe','student_id','module_id'];  
}
