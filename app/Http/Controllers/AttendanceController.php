<?php

namespace App\Http\Controllers;

use App\Enums\StatusAttendanceEnum;
use App\Http\Requests\AttendanceRequest;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //

    public function attendance(AttendanceRequest $request)
    {
        $employee_id = $request->input('employee_id');
        $type = $request->input('type');

        $attendance = Attendance::where('employee_id', $employee_id)
            ->whereDate('date', '=', Carbon::now()->toDateString())
            ->first();


        if (!$attendance) {
            $data = [
                'date' => Carbon::now()->format('Y-m-d'),
                'employee_id' => $employee_id,
                'check_in' => now(),
                'type_check_in' => $type,
                'status' => StatusAttendanceEnum::NOT_CHECK_OUT,
            ];
            Attendance::create($data);
        } else {
            if (is_null($attendance->check_out)) {
                $attendance->check_out = now();
                $attendance->status =  StatusAttendanceEnum::FULL_TIME;
                $attendance->type_check_out = $type;
                $attendance->save();
            }
        }

        return response()->json([
            'success' => true
        ], 200);
    }
}
