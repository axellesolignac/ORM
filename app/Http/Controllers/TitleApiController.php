<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Title;
use Illuminate\Http\Request;

class TitleApiController extends Controller
{
    public function index(Employee $employee)
    {
        return $employee->titles;
    }

    public function store(Request $request, Employee $employee)
    {
         $title = $employee->titles()->where('to_date','>',now())->update(['to_date'=>date_format(now(), 'Y-m-d')]);
                $new_title = new Title();
                $new_title->emp_no = $employee->emp_no;
                $new_title->title = $request->title;
                $new_title->from_date = date_format(now(), 'Y-m-d');
                $new_title->to_date = '9999-01-01';
                $new_title->save();
                return $new_title
    }

    public function show(Title $title)
    {
        return $title;
    }

    public function update(Request $request, Title $title)
    {
        $title->update($request->all());
        return $title;
    }

    public function destroy(Title $title)
    {
        $ti = $title;
        $title->delete();
        return $ti;
    }
}
