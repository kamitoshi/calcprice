<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    protected $guarded = array("id");

    public static $rules = [
        "name" => "required",
    ];

    public function seats(){
        return $this->belongsToMany("App\Seat", "seat_cast");
    }

    public function salaries(){
        return $this->hasMany("App\Salary");
    }

    public function getAge(){
        if($this->age === null){
            return "秘密";
        }else{
            return $this->age."歳";
        }
    }
}
