<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteRequest;
use App\Http\Requests\SwapRequest;
use App\Models\Company;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    
    public function index(Request $request)
    {


        $companies = Company::with([
            'departments' => function ($query) {
                $query->orderBy('count', 'asc');
            },
            'departments.teams' => function ($query) {
                $query->orderBy('count', 'asc');
            }
        ])->orderBy('count', 'asc')->get();

        $data = [
            'companies' => $companies
        ];

        $date = $request->input('date') ?? Carbon::now()->format('Y-m-d');

        if($request->input('team') && $request->input('department') && $request->input('company')){
            $employees = Employee::with(['dateAttendance' => function ($query) use ($date) {
                $query->whereDate('date', $date);
            }, 'attendances' => function ($query) use ($date) {
                $start_month = Carbon::parse($date)->startOfMonth();
                $end_month = Carbon::parse($date)->endOfMonth();
                $query->whereBetween('date', [$start_month, $end_month]);
            }])
            ->where([
                ['company_id', '=', $request->input('company')],
                ['department_id', '=', $request->input('department')],
                ['team_id', '=', $request->input('team')],
            ])->get();
            if($employees){
                $data['employees'] = $employees;
            }
        }

        $data['date'] = $date;

        return view('dashboard', $data);
    }


    public function swap(SwapRequest $request)
    {
        $type = $request->input('type');
        $id = $request->input('id');
        $swap_id = $request->input('swap_id');

        $record_current = DB::table($type)->where('id', $id)->first();
        $record_swap = DB::table($type)->where('id', $swap_id)->first();

        if ($record_current && $record_swap) {

            $temp = $record_current->count;

            DB::table($type)
                ->where('id', $id)
                ->update(['count' => $record_swap->count]);

            DB::table($type)
                ->where('id', $swap_id)
                ->update(['count' => $temp]);


            return response()->json([
                'success' => true
            ], 200);
        } else {
            return response()->json([
                'success' => false
            ], 200);
        }
    }

}
