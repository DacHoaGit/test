<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function store(EmployeeRequest $request){
        $name = $request->input('name');
        $company_id = $request->input('company_id');
        $department_id = $request->input('department_id');
        $team_id = $request->input('team_id');
        

        $data = [
            'name' => $name,
            'company_id' => $company_id,
            'department_id' => $department_id,
            'team_id' => $team_id,
        ];

        Employee::create($data);

        return response()->json([
            'success' => true
        ],200);
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json([
            'success' => true
        ], 200);
    }
}
