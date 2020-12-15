<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\BuyItem;
use App\Product;

class BuyItemController extends Controller
{
    
    public function index(Request $request){
        $buyItems = BuyItem::all();
        return view("buyItem.index", ["buyItems" => $buyItems]);
    }

    public function add(Request $request){
        $products = Product::all();
        return view("buyItem.add", ["products" => $products]);
    }

    public function create(Request $request){
        $this->validate($request, BuyItem::$rules);
        $buyItem = new BuyItem;
        $buyItem->product_id = $request->product_id;
        $buyItem->seat_id = $request->seat_id;
        $buyItem->billed = false;
        $buyItem->save();
        return redirect("buy_item");
    }

}
