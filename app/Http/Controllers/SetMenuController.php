<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SetMenu;

class SetMenuController extends Controller
{
    public function index(){
        $setMenus = SetMenu::all();
        return view("SetMenu.index", ["setMenus" => $setMenus]);
    }

    public function add(Request $request){
        $this->validate($request, SetMenu::$rules);
        $param = $request->all();
        unset($param["_token"]);
        $setMenu = new SetMenu;
        $setMenu->fill($param)->save();
        return redirect("set_menu");
    }

    public function edit(Request $request, $setMenu_id){
        $setMenu = SetMenu::find($setMenu_id);
        return view("setMenu.edit", ["setMenu" => $setMenu]);
    }

    public function update(Request $request, $setMenu_id){
        $setMenu = SetMenu::find($setMenu_id);
        $this->validate($request, SetMenu::$rules);
        $param = $request->all();
        unset($param["_token"]);
        $setMenu->fill($param)->save();
        return redirect("set_menu");
    }

    public function delete(Request $request, $setMenu_id){
        $setMenu = SetMenu::find($setMenu_id);
        return view("setMenu.delete", ["setMenu" => $setMenu]);
    }

    public function del(Request $request, $setMenu_id){
        SetMenu::find($setMenu_id)->delete();
        return redirect("set_menu");
    }

}
