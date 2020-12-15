<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $guarded = array("id");

    public static $rules = [
        "name" => "required",
        "price" => "required",
        "count" => "required",
    ];

    public function getData(){
        return $this->id . ":" . $this->name . "(".$this->price.")";
    }

    public function getName(){
        return $this->name;
    }

    public function scopeNameEqual($query, $str){
        return $query->where("name", $str);
    }

    public function scopeMaxPrice($query, $n){
        return $query->where("price", "<=", $n);
    }

    public function scopeMinPrice($query, $n){
        return $query->where("price", ">=", $n);
    }
}
