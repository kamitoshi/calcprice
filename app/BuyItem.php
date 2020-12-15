<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyItem extends Model
{
    protected $guarded = array("id");

    public function product(){
        return $this->belongsTo("App\Product");
    }

    public function seat(){
        return $this->belongsTo("App\Seat");
    }

    // public static $rules = [
    //     "product_id" => "required",
    //     "seat_id" => "required",
    // ]

    public function billed(){
        if($this->billed == true){
            return "支払済";
        }else{
            return "未支払";
        }
    }

    public function getProductName(){
        return $this->product->name;
    }

    public function getSumPrice($count){
        return $this->product->price * $count;
    }

}
