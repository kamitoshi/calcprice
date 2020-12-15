<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class ProductController extends Controller
{
    public function index(Request $request){
        $items = product::all();
        return view("product.index", ["items"=>$items]);
    }

    public function post(Request $request){
        $items = DB::select("select * from products");
        return view("product.index", ["items"=>$items]);
    }

    public function show($id){
        $item = DB::table("products")->where("id", $id)->first();
        return view("product.show", ["item"=>$item]);
    }

    public function find(Request $request){
        $param = [
            "nameInput" => "",
            "minInput" => "",
            "maxInput" => "",
            "items"=>null,
        ];
        return view("product.find", $param);
    }

    public function search(Request $request){
        $name = $request->nameInput;
        $min = $request->minInput;
        $max = $request->maxInput;
        $items = Product::nameEqual($name)->minPrice($min)->maxPrice($max)->get();
        $param = [
            "nameInput" => $name,
            "minInput" => $min,
            "maxInput" => $max,
            "items" => $items,
        ];
        return view("product.find", $param);
    }

    public function add(Request $request){
        return view("product.add");
    }

    public function create(Request $request){
        $this->validate($request, Product::$rules);
        $product = new Product;
        $form = $request->all();
        unset($form["_token"]);
        $product->fill($form)->save();
        return redirect("product");
    }

    public function edit($id){
        $product = Product::find($id);
        return view("product.edit", ["form" => $product]);
    }

    public function update(Request $request){
        $this->validate($request, Product::$rules);
        $product = Product::find($request->id);
        $form = $request->all();
        unset($form["_token"]);
        $product->fill($form)->save();
        return redirect("product");
    }

    public function del($id){
        $product = Product::find($id);
        return view("product.del", ["form" => $product]);
    }

    public function delete(Request $request){
        $product = Product::find($request->id)->delete();
        return redirect("product");
    }

}
