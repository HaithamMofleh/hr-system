<?php

/**
 * Created by PhpStorm.
 * User: Kanak
 * Date: 13/8/16
 * Time: 10:43 PM
 */

namespace App\Repositories;


use App\EmployeeLeaves;
use App\Http\Requests\AddAttendanceRequest;
use App\Models\AttendanceManager;
use App\Models\Employee;
use App\Models\Holiday;
use Maatwebsite\Excel\Facades\Excel;

class ImportAttendanceData
{

    public function addAttendance(AddAttendanceRequest $request)
    {
        $user = Employee::find($request['user_id']);
       
        if (!$user) {
            abort(404);
        }
        $request['user_id'] = $user->user_id;
        $request['days'] = implode (", ", $request->days);
        return EmployeeLeaves::create($request->toArray());
    }
}
