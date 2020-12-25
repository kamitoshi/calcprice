<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $guarded = array("id");
    protected $dates = ['target_date'];

    public function cast(){
        return $this->belongsTo("App\Cast");
    }

    public function getTotalPrice(){
        return $this->fixed_salary + $this->changed_salary;
    }

}
