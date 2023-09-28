<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Team;

class TeamController extends Controller
{
    public function store(TeamRequest $request)
    {
        $name = $request->input('name');
        $company_id = $request->input('company_id');
        $department_id = $request->input('department_id');
        $total = Team::where([
            ['company_id', '=', $company_id],
            ['department_id', '=', $department_id],
        ])->count();

        $data = [
            'name' => $name,
            'company_id' => $company_id,
            'department_id' => $department_id,
            'count' => $total + 1
        ];

        Team::create($data);

        return response()->json([
            'success' => true
        ], 200);
    }

    public function destroy(Team $team)
    {
        $team->delete();

        return response()->json([
            'success' => true
        ], 200);
    }
}
