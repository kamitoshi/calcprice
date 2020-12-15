<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Seat;
use App\BuyItem;
use App\Product;

class SeatController extends Controller
{
    public function index(Request $request){
        $seats = Seat::all();
        return view("seat.index", ["seats" => $seats]);
    }

    public function buy_item(Request $request, $seat_id){
        $seat = Seat::find($seat_id);
        $products = Product::all();
        return view("seat.buy_item", ["seat" => $seat, "products" => $products]);
    }

    public function add(Request $request, $seat_id){
        $seat = Seat::find($seat_id);
        $products = Product::all();
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
        return redirect("seat");
    }

    public function payment(Request $request, $seat_id){
        $seat = Seat::find($seat_id);
        $buyItems = $seat->buyItem;
        return view("seat.payment", ["seat" => $seat, "buyItems" => $buyItems]);
    }


}
