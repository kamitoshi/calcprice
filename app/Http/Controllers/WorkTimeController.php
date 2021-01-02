<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\WorkTime;
use App\Cast;
use App\Salary;
use Carbon\Carbon;

class WorkTimeController extends Controller
{
    public function index($cast){
        $cast = Cast::find($cast);
        $workTimes = WorkTime::where("cast_id", $cast->id)->get();
        $date = Carbon::now();
        return view("WorkTimes.index", ["cast" => $cast, "workTimes" => $workTimes, "date"=> $date]);
    }

    #検索バーから表示を押した時に、該当の月出勤一覧を表示させる
    public function find(Request $request, $cast){
        $cast = Cast::find($cast);
        $workTimes = WorkTime::where("cast_id", $cast->id)->get();
        $param = [
            "year" => $request->inputYear,
            "month" => $request->inputMonth,
        ];
        return view("WorkTimes.show", $param);
    }

    public function show(Request $request, $cast, $month){
        $cast = Cast::find($cast);
        $workTimes = WorkTime::where("cast_id", $cast->id)->get();
        return view("WorkTimes.{}", ["cast" => $cast, "workTimes" => $workTimes]);
    }

    public function create($cast){
        $cast = Cast::find($cast);
        return view("WorkTimes.create", ["cast" => $cast]);
    }

    public function store(Request $request, $cast){
        $cast = Cast::find($cast);
        $this->validate($request, WorkTime::$rules);
        $target_date = new Carbon($request->target_date);
        $result_salary = null;
        $data = [
            "cast_id" => $request->cast_id,
            "target_date" => $target_date,
        ];
        if(isset($request->work_start)){
            $work_start = new Carbon($request->work_start);
            $work_start = $target_date->toDateString().' '.$work_start->toTimeString();
            $data["work_start"] = $work_start;
        }
        if(isset($request->rest_start)){
            $rest_start = new Carbon($request->rest_start);
            $rest_start = $target_date->toDateString().' '.$rest_start->toTimeString();
            $data["rest_start"] = $rest_start;
        }
        if(isset($request->rest_end)){
            $rest_end = new Carbon($request->rest_end);
            $rest_end = $target_date->toDateString().' '.$rest_end->toTimeString();
            $data["rest_end"] = $rest_end;
        }
        if(isset($request->work_end)){
            $work_end = new Carbon($request->work_end);
            $work_end = $target_date->toDateString().' '.$work_end->toTimeString();
            $data["work_end"] = $work_end;
        }    
        $workTime = new WorkTime;
        $workTime->fill($data)->save();
        if($workTime->work_start !== null && $workTime->work_end !== null){
            $salaries = $cast->salaries;
            if($salaries !== []){
                foreach($salaries as $salary){
                    if($salary->target_date->format("Y-m") === $target_date->format("Y-m")){
                        $diff_hour = (strtotime($workTime->work_end) - strtotime($workTime->work_start)) / 3600;
                        $total_salary = $salary->salary + ($cast->hourly_wage * $diff_hour);
                        $salary->update(['salary' => $total_salary]);
                        $result_salary = $salary;
                    }
                }
            }else{
                $create_salary = new Salary();
                $diff_hour = (strtotime($workTime->work_end) - strtotime($workTime->work_start)) / 3600;
                // $create_salary["salary"] = $cast->hourly_wage * $diff_hour;
                $data = [
                    "cast_id" => $cast->id,
                    "target_date" => $target_date,
                    "salary" => $cast->hourly_wage * $diff_hour,
                    "commission" => 0,
                ];
                $create_salary->fill($data)->save();
            }
            if($result_salary === null){
                $create_salary = new Salary();
                $diff_hour = (strtotime($workTime->work_end) - strtotime($workTime->work_start)) / 3600;
                $data = [
                    "cast_id" => $cast->id,
                    "target_date" => $target_date,
                    "salary" => $cast->hourly_wage * $diff_hour,
                    "commission" => 0,
                ];
                $create_salary->fill($data)->save();
            }
        }
        return redirect("/casts/{$cast->id}/work_times");
    }

    public function edit($cast, $workTime){
        $cast = Cast::find($cast);
        $workTime = WorkTime::find($workTime);
        return view("WorkTimes.edit", ["cast" => $cast, "workTime" => $workTime]);
    }

    public function update(Request $request, $cast, $workTime){
        $cast = Cast::find($cast);
        $workTime = WorkTime::find($workTime);
        $target_date = $workTime->target_date;
        $result_salary = null;
        $data = [
            "cast_id" => $request->cast_id,
            "target_date" => $target_date,
        ];
        if($workTime->work_start !== null && $workTime->work_end !== null){
            $salaries = $cast->salaries;
            foreach($salaries as $salary){
                if($salary->target_date->format("Y-m") === $target_date->format("Y-m")){
                    $diff_hour = (strtotime($workTime->work_end) - strtotime($workTime->work_start)) / 3600;
                    $total_salary = $salary->salary - ($cast->hourly_wage * $diff_hour);
                    $salary->update(['salary' => $total_salary]);
                }
            }
        }
        if(isset($request->work_start)){
            $work_start = new Carbon($request->work_start);
            $work_start = $target_date->toDateString().' '.$work_start->toTimeString();
            $data["work_start"] = $work_start;
        }
        if(isset($request->rest_start)){
            $rest_start = new Carbon($request->rest_start);
            $rest_start = $target_date->toDateString().' '.$rest_start->toTimeString();
            $data["rest_start"] = $rest_start;
        }
        if(isset($request->rest_end)){
            $rest_end = new Carbon($request->rest_end);
            $rest_end = $target_date->toDateString().' '.$rest_end->toTimeString();
            $data["rest_end"] = $rest_end;
        }
        if(isset($request->work_end)){
            $work_end = new Carbon($request->work_end);
            $work_end = $target_date->toDateString().' '.$work_end->toTimeString();
            $data["work_end"] = $work_end;
        }
        $workTime->fill($data)->save();

        if($workTime->work_start !== null && $workTime->work_end !== null){
            $salaries = $cast->salaries;
            if($salaries !== []){
                foreach($salaries as $salary){
                    if($salary->target_date->format("Y-m") === $target_date->format("Y-m")){
                        $diff_hour = (strtotime($workTime->work_end) - strtotime($workTime->work_start)) / 3600;
                        $total_salary = $salary->salary + ($cast->hourly_wage * $diff_hour);
                        $salary->update(['salary' => $total_salary]);
                        $result_salary = $salary;
                    }
                }
            }else{
                $create_salary = new Salary();
                $diff_hour = (strtotime($workTime->work_end) - strtotime($workTime->work_start)) / 3600;
                // $create_salary["salary"] = $cast->hourly_wage * $diff_hour;
                $data = [
                    "cast_id" => $cast->id,
                    "target_date" => $target_date,
                    "salary" => $cast->hourly_wage * $diff_hour,
                    "commission" => 0,
                ];
                $create_salary->fill($data)->save();
            }
            if($result_salary === null){
                $create_salary = new Salary();
                $diff_hour = (strtotime($workTime->work_end) - strtotime($workTime->work_start)) / 3600;
                $data = [
                    "cast_id" => $cast->id,
                    "target_date" => $target_date,
                    "salary" => $cast->hourly_wage * $diff_hour,
                    "commission" => 0,
                ];
                $create_salary->fill($data)->save();
            }
        }
        return redirect("/casts/{$cast->id}/work_times");
    }
    
}
