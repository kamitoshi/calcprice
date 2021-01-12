<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cast;

class CastController extends Controller
{
    public function index(){
        $casts = Cast::all();
        return view("casts.index", ["casts" => $casts]);
    }

    public function show($cast){
        $cast = Cast::find($cast);
        return view("casts.show", ["cast" => $cast]);
    }

    public function create(){
        return view("casts.create");
    }

    public function store(Request $request){
        $this->validate($request, Cast::$rules);
        $data = $request->all();
        unset($data["_token"]);
        $cast = new Cast;
        $cast->fill($data)->save();
        return redirect("casts");
    }

    public function edit($cast){
        $cast = Cast::find($cast);
        return view("casts.edit", ["cast" => $cast]);
    }

    public function update(Request $request, $cast){
        $this->validate($request, Cast::$rules);
        $cast = Cast::find($cast);
        $data = $request->all();
        unset($data["_token"]);
        $cast->fill($data)->save();
        return redirect("casts/{$cast->id}");
    }

    public function delete($cast){
        $cast = Cast::find($cast);
        return view("casts.delete", ["cast" => $cast]);
    }

    public function destroy(Request $request, $cast){
        $cast = Cast::find($cast);
        $cast->delete();
        return redirect("casts");
    }

}
