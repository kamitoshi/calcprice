<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtherMenu extends Model
{
    protected $guarded = array("id");

    public static $rules = [
        "name" => "required",
        "price" => "required",
    ];

    public function seats(){
        return $this->belongsToMany("App\Seat", "seat_ather_menu");
    }

    public function getSumPrice($count){
        return $this->price * $count;
    }
}
