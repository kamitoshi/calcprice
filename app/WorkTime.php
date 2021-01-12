<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class WorkTime extends Model
{
    protected $guarded = ["id"];
    protected $dates = [
        'target_date',
        'work_start',
        'rest_start',
        'rest_end',
        'work_end',
    ];
    

    public static $rules = [
        "target_date" => "required",
    ];

    public function cast(){
        return belongsTo("App\Cast");
    }

    public function getWorkStartTime(){
        if($this->work_start !== null){
            return $this->work_start->format("H:i");
        }else{
            return "";
        }
    }
    public function getRestStartTime(){
        if($this->rest_start !== null){
            return $this->rest_start->format("H:i");
        }else{
            return "";
        }
    }
    public function getRestEndTime(){
        if($this->rest_end !== null){
            return $this->rest_end->format("H:i");
        }else{
            return "";
        }
    }
    public function getWorkEndTime(){
        if($this->work_end !== null){
            return $this->work_end->format("H:i");
        }else{
            return "";
        }
    }



}
