<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Seat;
use App\BuyItem;
use App\Product;
use App\SetMenu;
use App\AtherMenu;
use App\Cast;
use App\Salary;

class SeatController extends Controller
{
    public function index(Request $request){
        $seats = Seat::all();
        return view("seat.index", ["seats" => $seats]);
    }

    public function coming(Request $request){
        $seat = Seat::find($request->seat_id);
        $seat->guest_count = $request->guest_count;
        $seat->hasUse = true;
        $seat->save();
        return redirect("seat");
    }

    public function buy_item(Request $request, $seat_id){
        $seat = Seat::find($seat_id);
        $products = Product::all();
        $setMenus = SetMenu::all();
        $atherMenus = AtherMenu::all();
        $casts = Cast::all();
        return view("seat.buy_item", ["seat" => $seat, "products" => $products, "setMenus" => $setMenus, "atherMenus" => $atherMenus, "casts" => $casts]);
    }

    public function add(Request $request, $seat_id){
        $seat = Seat::find($seat_id);
        $products = Product::all();
        $setMenus = SetMenu::all();
        $atherMenus = AtherMenu::all();
        $casts = Cast::all();
        foreach($products as $product){
            if($request->input($product->name) !== null){
                for($i = 1; $i<=$request->input($product->name); $i++){
                    $buyItem = new BuyItem;
                    $buyItem->product_id = $product->id;
                    $buyItem->seat_id = $seat->id;
                    $buyItem->billed = false;
                    $buyItem->save();
                }
                $product->count -= $request->input($product->name);
                $product->save();
            }else{
                continue;
            }
        }
        foreach($setMenus as $setMenu){
            if($request->input($setMenu->name) !== null){
                $seat->setMenus()->attach($setMenu->id);
            }else{
                continue;
            }
        }
        foreach($atherMenus as $atherMenu){
            if($request->input($atherMenu->name) !== null){
                $seat->atherMenus()->attach($atherMenu->id);
            }else{
                continue;
            }
        }
        foreach($casts as $cast){
            if($request->input($cast->name) !== null){
                $seat->casts()->attach($cast->id);
            }else{
                continue;
            }
        }
        return redirect("seat");
    }

    public function payment(Request $request, $seat_id){
        $seat = Seat::find($seat_id);
        return view("seat.payment", ["seat" => $seat]);
    }

    public function pay(Request $request, $seat_id){
        $seat = Seat::find($seat_id);
        $seat->guest_count = 0;
        $seat->hasUse = false;
        $seat->save();
        $buyItems = $seat->buyItems;
        foreach($buyItems as $buyItem){
            $buyItem->billed = true;
            $buyItem->save();
        }
        $casts = $seat->casts;
        $now = new Datetime();
        foreach($casts as $cast){
            foreach($cast->salaries as $salary){
                if($salary->target_date->format("Y年m月") === $now->format("Y年m月")){
                    $salary->commission = $salary->commission += 300;
                    $salary->save();
                }else{
                    continue;
                }
            }
        }
        $seat->setMenus()->detach();
        $seat->atherMenus()->detach();
        $seat->casts()->detach();
        return redirect("seat");
    }


}
