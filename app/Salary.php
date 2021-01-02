<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use App\Cast;

class Salary extends Model
{
    protected $guarded = array("id");
    protected $dates = ['target_date'];

    public function cast(){
        return $this->belongsTo("App\Cast");
    }

    public function getTotalPrice(){
        return $this->fixed_salary + $this->changed_salary;
    }

    public function getToMonthSalary($date){
        if($this->target_date->format("Y-m") === $date->format("Y-m")){
            return $this;
        }
    }

}
