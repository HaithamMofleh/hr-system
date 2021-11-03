<?php

/**
 * Created by PhpStorm.
 * User: Kanak
 * Date: 13/8/16
 * Time: 10:43 PM
 */

namespace App\Repositories;

use App\EmployeeLeaves;
use App\Models\LeaveType;

class LeaveRepository
{

    public function getAllLeaveType()
    {
        return LeaveType::paginate(10);
    }

    public function getMyLeaves()
    {
        return EmployeeLeaves::where('user_id', \Auth::user()->id)->paginate(15);
    }
}
