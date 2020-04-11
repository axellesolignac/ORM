<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeApiController extends Controller
{
    public function index()
    {
        return Employee::paginate();
    }

    public function store(Request $request)
    {
        $emp = Employee::create($request->all());
        return $emp;
    }

    public function show(Employee $employee)
    {
        return $employee;
    }

    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());
        return $employee;
    }

    public function destroy(Employee $employee)
    {
        $emp = $employee;
        $employee->delete();
        return $emp;
    }
}
