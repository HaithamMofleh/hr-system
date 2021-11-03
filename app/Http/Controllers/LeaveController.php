<?php

  namespace App\Http\Controllers;

  use App\EmployeeLeaves;

  use App\Models\LeaveType;
  use App\User;

  use Illuminate\Http\Request;
  use App\Http\Requests;


  class LeaveController extends Controller
  {
    /**
     * LeaveController constructor.
     * @param Mailer $mailer
     */
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addLeaveType()
    {
      return view('hrms.leave.add_leave_type');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    Public function processLeaveType(Request $request)
    {
      $leave = new LeaveType;
      $leave->leave_type = $request->leave_type;
      $leave->description = $request->description;
      $leave->save();

      \Session::flash('flash_message', 'Leave Type successfully added!');
      return redirect()->back();

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLeaveType()
    {
      $leaves = LeaveType::paginate(10);
      return view('hrms.leave.show_leave_type', compact('leaves'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEdit($id)
    {
      $result = LeaveType::whereid($id)->first();
      return view('hrms.leave.add_leave_type', compact('result'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    Public function doEdit(Request $request, $id)
    {
      $leave_type = $request->leave_type;
      $description = $request->description;

      $edit = LeaveType::findOrFail($id);
      if (!empty($leave_type)) {
        $edit->leave_type = $leave_type;
      }
      if (!empty($description)) {
        $edit->description = $description;
      }
      $edit->save();

      \Session::flash('flash_message', 'Leave Type successfully updated!');
      return redirect('leave-type-listing');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function doDelete($id)
    {
      $leave = LeaveType::find($id);
      $leave->delete();
      \Session::flash('flash_message1', 'Leave Type successfully Deleted!');
      return redirect('leave-type-listing');
    }

    

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showMyLeave()
    {

      $leaves = EmployeeLeaves::where('user_id', \Auth::user()->id)->paginate(15);
      return view('hrms.leave.show_my_leaves', compact('leaves'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllLeave()
    {
      $leaves = EmployeeLeaves::with('user.employee')->paginate(15);
      return view('hrms.leave.total_leave_request', compact('leaves'));
    }
     
  }

