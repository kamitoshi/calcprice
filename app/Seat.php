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

    public function setMenus(){
        return $this->belongsToMany("App\SetMenu");
    }

    public function atherMenus(){
        return $this->belongsToMany("App\AtherMenu", "seat_ather_menu");
    }

    public function casts(){
        return $this->belongsToMany("App\Cast", "seat_cast");
    }

    public function getName(){
        return $this->name;
    }

    public function getHasNotBilled(){
        $items = $this->buyItems;
        foreach($items as $item){
            if($item->billed == false){
                return true;
            }else{
                continue;
            }
        }
        return false;
    }

    public function getNotBilledItems(){
        $buyItems = $this->buyItems;
        $notBuyItems = [];
        foreach($buyItems as $buyItem){
            if($buyItem->billed === false){
                $notBuyItems[] = $buyItem;
            }else{
                continue;
            }
        }
        return $notBuyItems;
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

    public function getNotBilledProductAdjust(){
        $buyItems = $this->buyItems;
        $notBuyItems = [];
        foreach($buyItems as $buyItem){
            if($buyItem->billed == false){
                $notBuyItems[] = $buyItem;
            }else{
                continue;
            }
        }
        $array = [];
        $result = [];
        if($notBuyItems !== []){
            foreach($notBuyItems as $buyItem){
                if(!in_array($buyItem->product_id, $array)){
                    $array[] = $buyItem->product_id;
                    $result[] = $buyItem;
                }else{
                    continue;
                }
            }
            return $result;
        }else{
            return $notBuyItems;
        }
    }

    public function getSetMenuAdjust(){
        $setMenus = $this->setMenus;
        $array = [];
        $result = [];
        foreach($setMenus as $setMenu){
            if(!in_array($setMenu->name, $array)){
                $array[] = $setMenu->name;
                $result[] = $setMenu;
            }else{
                continue;
            }
        }
        return $result;
    }

    public function getSetMenuAdjustCount($name){
        $setMenus = $this->setMenus;
        $setMenuNames = [];
        foreach($setMenus as $setMenu){
            $setMenuNames[] = $setMenu->name;
        }
        $count = array_count_values($setMenuNames);
        return $count[$name];
    }

    public function getAtherMenuAdjust(){
        $atherMenus = $this->atherMenus;
        $array = [];
        $result = [];
        foreach($atherMenus as $atherMenu){
            if(!in_array($atherMenu->name, $array)){
                $array[] = $atherMenu->name;
                $result[] = $atherMenu;
            }else{
                continue;
            }
        }
        return $result;
    }

    public function getAtherMenuAdjustCount($name){
        $atherMenus = $this->atherMenus;
        $atherMenuNames = [];
        foreach($atherMenus as $atherMenu){
            $atherMenuNames[] = $atherMenu->name;
        }
        $count = array_count_values($atherMenuNames);
        return $count[$name];
    }

    public function getCastAdjust(){
        $casts = $this->casts;
        $array = [];
        $result = [];
        foreach($casts as $cast){
            if(!in_array($cast->name, $array)){
                $array[] = $cast->name;
                $result[] = $cast;
            }else{
                continue;
            }
        }
        return $result;
    }

    public function getCastAdjustCount($name){
        $casts = $this->casts;
        $castNames = [];
        foreach($casts as $cast){
            $castNames[] = $cast->name;
        }
        $count = array_count_values($castNames);
        return $count[$name];
    }

    public function getNotBilledTotalCount($name){
        $array = [];
        $buyItems = $this->buyItems;
        $notBuyItems = [];
        foreach($buyItems as $buyItem){
            if($buyItem->billed == false){
                $notBuyItems[] = $buyItem;
            }else{
                continue;
            }
        }
        foreach($notBuyItems as $buyItem){
            $array[] = $buyItem->product->name;
        }
        $buyCount = array_count_values($array);
        return $buyCount[$name];
    }

    public function getNotBilledTotalPrice(){
        $result = 0;
        $buyItems = $this->buyItems;
        $notBuyItems = [];
        foreach($buyItems as $buyItem){
            if($buyItem->billed == false){
                $notBuyItems[] = $buyItem;
            }else{
                continue;
            }
        }
        foreach($notBuyItems as $buyItem){
            $result += $buyItem->product->price;
        }
        foreach($this->setMenus as $setMenu){
            $result += $setMenu->price;
        }
        foreach($this->atherMenus as $atherMenu){
            $result += $atherMenu->price;
        }

        return $result;
    }

    public function getNotBilledServicePrice(){
        return $this->getNotBilledTotalPrice() * 0.15;
    }

    public function getDesignationPrice(){
        $seat = $this;
        return $casts = $seat->casts;
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
