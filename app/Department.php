<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //protected $fillable = ['dept_no',  'dept_name'];
    protected $primaryKey = 'dept_no';
    public $timestamps = false;


    public function employees() {
        return $this->belongsToMany('App\Employee', 'dept_emp', 'dept_no', 'emp_no')->withPivot('from_date', 'to_date');
    }

    public function managers() {
        return $this->belongsToMany('App\Department', 'dept_manager', 'emp_no', 'dept_no')->withPivot('from_date', 'to_date');
    }
}
?>