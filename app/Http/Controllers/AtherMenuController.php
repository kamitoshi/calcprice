<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AtherMenu;

class AtherMenuController extends Controller
{
    public function index(){
        $atherMenus = AtherMenu::all();
        return view("AtherMenu.index", ["atherMenus" => $atherMenus]);
    }

    public function add(Request $request){
        $this->validate($request, AtherMenu::$rules);
        $param = $request->all();
        unset($param["_token"]);
        $atherMenu = new AtherMenu;
        $atherMenu->fill($param)->save();
        return redirect("ather_menu");
    }

    public function edit(Request $request, $atherMenu_id){
        $atherMenu = AtherMenu::find($atherMenu_id);
        return view("atherMenu.edit", ["atherMenu" => $atherMenu]);
    }

    public function update(Request $request, $atherMenu_id){
        $atherMenu = AtherMenu::find($atherMenu_id);
        $this->validate($request, AtherMenu::$rules);
        $param = $request->all();
        unset($param["_token"]);
        $atherMenu->fill($param)->save();
        return redirect("ather_menu");
    }

    public function delete(Request $request, $atherMenu_id){
        $atherMenu = AtherMenu::find($atherMenu_id);
        return view("atherMenu.delete", ["atherMenu" => $atherMenu]);
    }

    public function del(Request $request, $atherMenu_id){
        AtherMenu::find($atherMenu_id)->delete();
        return redirect("ather_menu");
    }
}
