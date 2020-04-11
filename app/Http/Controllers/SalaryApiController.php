<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Salary;
use App\Employee;
use Illuminate\Http\Request;

class SalaryApiController extends Controller
{
    public function index(Employee $employee)
    {
        return $employee->salaries;
    }

    public function store(Request $request, Employee $employee)
    {
        $validated_data = $request->validate( ['salary' => 'integer|min:0']);
        
        $salary = $employee->salaries()->where('to_date','>',now())->update(['to_date'=>date_format(now(), 'Y-m-d')]);
        $new_salary = new Salary();
        $new_salary->emp_no = $employee->emp_no;
        $new_salary->salary = $validated_data->salary;
        $new_salary->from_date = date_format(now(), 'Y-m-d');
        $new_salary->to_date = '9999-01-01';
        $new_salary->save();
        return $new_salary
    }

    public function show(Salary $salary)
    {
        return $salary;
    }

    public function update(Request $request, Salary $salary)
    {
        $salary->update($request->all());
        return $salary;
    }

    public function destroy(Salary $salary)
    {
        $sale = $salary;
        $salary->delete();
        return $sale;
    }
}
