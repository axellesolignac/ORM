<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Employee;
use App\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        foreach(Employee::all() as $emp) {
            User::create(['emp_no' => $emp->emp_no, 'email' => $emp->first_name . '.' . $emp->last_name . '.' . $emp->emp_no . '@employee.edu', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'api_token' => Str::random(80)]);
        }
    }
}