<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Salary;
use App\Cast;

class SalaryController extends Controller
{
    
    public function index($cast){
        $cast = Cast::find($cast);
        $salaries = Salary::where("cast_id", $cast->id)->orderBy("target_date", "desc")->get();
        return view("salary.index", ["cast" => $cast, "salaries" => $salaries]);
    }

    public function show($cast, $salary){
        $salary = Salary::find($salary);
        return view("salary.show", ["salary" => $salary]);
    }

    public function create($cast){
        $cast = Cast::find($cast);
        $date = new Datetime();
        return view("salary.create", ["cast" => $cast, "date" => $date]);
    }

    # createページを挟んだ場合の処理
    // public function store(Request $request, $cast){
    //     $cast = Cast::find($cast);
    //     $data = $request->all();
    //     unset($data["_token"]);
    //     $salary = new Salary;
    //     $salary->fill($data)->save();
    //     return redirect("/casts/$cast->id/salary/$salary->id");
    // }

    # createページを挟まない場合の処理
    public function store(Request $request, $cast){
        $cast = Cast::find($cast);
        $salary = new Salary;
        $date = new Datetime();
        $data = [
            "cast_id" => $cast->id,
            "target_date" => $date,
            "salary" => 0,
            "commission" => 0,
        ];
        $salary->fill($data)->save();
        return redirect("/casts/$cast->id/salary/$salary->id");
    }

}
