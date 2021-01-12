<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use Carbon\Carbon;

class Cast extends Model
{
    protected $guarded = array("id");

    public static $rules = [
        "name" => "required",
        "hourly_wage" => "required",
    ];

    public function seats(){
        return $this->belongsToMany("App\Seat", "seat_cast");
    }

    public function salaries(){
        return $this->hasMany("App\Salary");
    }

    public function work_times(){
        return $this->hasMany("App\WorkTime");
    }

    public function getAge(){
        if($this->age === null){
            return "秘密";
        }else{
            return $this->age."歳";
        }
    }

    public function getCurrentMonthSalary(){
        $target_date = Carbon::today()->format("Y年m月");
        foreach($this->salaries as $salary){
            if($salary->target_date->format("Y年m月") === $target_date){
                return $salary->salary + $salary->commission;
            }
        }

    }

}
