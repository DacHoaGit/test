<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function store(DepartmentRequest $request){
        $name = $request->input('name');
        $company_id = $request->input('company_id');
        $total = Department::where('company_id', $company_id)->count();

        $data = [
            'name' => $name,
            'company_id' => $company_id,
            'count' => $total + 1
        ];

        Department::create($data);

        return response()->json([
            'success' => true
        ],200);
    }

    public function destroy(Department $department){
        $department->delete();

        return response()->json([
            'success' => true
        ],200);
     }
}
