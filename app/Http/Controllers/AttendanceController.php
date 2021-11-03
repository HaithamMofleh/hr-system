<?php

namespace App\Http\Controllers;


use App\Http\Requests\AddAttendanceRequest;

use App\Models\Employee;
use App\Models\LeaveType;
use App\Repositories\ExportRepository;
use App\Repositories\ImportAttendanceData;
use App\Repositories\UploadRepository;

use Illuminate\Http\Request;


class AttendanceController extends Controller
{
  public $attendanceData;

  /**
   * AttendanceController constructor.
   * @param ExportRepository $exportRepository
   * @param UploadRepository $uploadRepository
   * @param ImportAttendanceData $attendanceData
   */
  public function __construct(ImportAttendanceData $attendanceData)
  {
    $this->attendanceData = $attendanceData;
  }

  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function importAttendanceFile()
  {
    //$files = AttendanceFilename::paginate(10);
    $employees = Employee::all();
    $leaves = LeaveType::all();
    return view('hrms.attendance.add_attendance', compact('employees', 'leaves'));
  }

  /**
   * @param Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function uploadFile(AddAttendanceRequest $request)
  {
    $this->attendanceData->addAttendance($request);
    \Session::flash('flash_message1', 'Attendance successfully Added!');
    return redirect()->back();
  }
}
