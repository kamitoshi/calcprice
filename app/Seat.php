<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    public function getUseStatus(){
        if($this->hasUse == true){
            return "使用中";
        }else{
            return "使用可能";
        }
    }

    public function buyItems(){
        return $this->hasMany("App\BuyItem");
    }

    public function getName(){
        return $this->name;
    }

    public function getType(){
        if($this->type == "counter"){
            return "カウンター";
        }else{
            return "テーブル";
        }
    }

    public function getGuestCount(){
        if($this->guest_count == 0){
            return "-";
        }else{
            return $this->guest_count;
        }
    }

    public function getProductAdjust(){
        $array = [];
        $result = [];
        $buyItems = $this->buyItems;
        foreach($buyItems as $buyItem){
            if(!in_array($buyItem->product_id, $array)){
                $array[] = $buyItem->product_id;
                $result[] = $buyItem;
            }else{
                continue;
            }
        }
        return $result;
    }

    public function getTotalCount($name){
        $array = [];
        $buyItems = $this->buyItems;
        foreach($buyItems as $buyItem){
            $array[] = $buyItem->product->name;
        }
        $buyCount = array_count_values($array);
        return $buyCount[$name];
    }

    public function getTotalPrice(){
        $result = 0;
        foreach($this->buyItems as $buyItem){
            $result += $buyItem->product->price;
        }
        return $result;
    }

    public function getServicePrice(){
        return $this->getTotalPrice() * 0.15;
    }

}
