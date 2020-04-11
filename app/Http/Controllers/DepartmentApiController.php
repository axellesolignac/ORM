<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentApiController extends Controller
{

    public function index()
    {
        return Department::all();
    }

    public function store(Request $request)
    {
        return Department::create($request->all());
    }

    public function show($id)
    {
        return Department::find($id);
    }

    public function update(Request $request, $id)
    {
        Department::find($id)->update($request->all());
        return Department::find($id);
    }

    public function destroy($id)
    {
        $dept = department::find($id);
        Department::find($id)->delete();
        return $dept;
    }
}
