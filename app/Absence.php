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

     public function getDateAttribute($value)
    {
        $date = date('m/Y', strtotime($value));
        $aux = explode("/",$date);

         if($aux[0] === '01'){
                    $month = 'Janeiro';
                  }else if($aux[0] === '02'){
                    $month = 'Fevereiro';
                  }else if($aux[0] === '03'){
                    $month = 'Março';
                  }else if($aux[0] === '04'){
                    $month = 'Abril';
                  }else if($aux[0] === '05'){
                    $month = 'Maio';
                  }else if($aux[0] === '06'){
                    $month = 'Junho';
                  }else if($aux[0] === '07'){
                    $month = 'Julho';
                  }else if($aux[0] === '08'){
                    $month = 'Agosto';
                  }else if($aux[0] === '09'){
                    $month = 'Setembro';
                  }else if($aux[0] === '10'){
                    $month = 'Outubro';
                  }else if($aux[0] === '11'){
                    $month = 'Novembro';
                  }else if($aux[0] === '12'){
                    $month = 'Dezembro';
                  }

                  return $month.'-'.$aux[1];

        
    }

    public function getTipeAttribute($value)
    {
    	if ($value == 0) {
    		return "Presente";
    	}else  {
    		return "Ausente";
    	}
    }

}
