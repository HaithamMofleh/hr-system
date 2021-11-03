<?php

namespace App\Http\Controllers;


use App\Models\Employee;

use App\Models\Role;
use App\Models\UserRole;

use App\User;

use Illuminate\Http\Request;



class EmpController extends Controller
{
    public function addEmployee()
    {
        $roles = Role::get();

        return view('hrms.employee.add', compact('roles'));
    }

    public function processEmployee(Request $request)
    {
        
        $user           = new User;
        $user->name     = $request->emp_name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $emp                       = new Employee;
        $emp->name                 = $request->emp_name;
        $emp->gender               = $request->gender;
        $emp->date_of_birth        = date_format(date_create($request->dob), 'Y-m-d');
        $emp->user_id              = $user->id;
        $emp->save();

        $userRole          = new UserRole();
        $userRole->role_id = $request->role;
        $userRole->user_id = $user->id;
        $userRole->save();
        //$emp->userrole()->create(['role_id' => $request->role]);
        \Session::flash('flash_message', 'Employee added successfully');
        return redirect()->back();

        
    }

    public function showEmployee()
    {
        $emps   = User::with('employee', 'role.role')->paginate(15);
       
        return view('hrms.employee.show_emp', compact('emps'));
    }

    public function showEdit($id)
    {
        
        //$emps = Employee::whereid($id)->with('userrole.role')->first();
        $emps = User::where('id', $id)->with('employee', 'role.role')->first();
        $roles = Role::get();
        
        return view('hrms.employee.add', compact('emps', 'roles'));
    }

    public function doEdit(Request $request, $id)
    { 
        $user           = User::findOrFail($id);
        
        $user->name     = $request->emp_name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $emp                       = $user->employee;
        $emp->name                 = $request->emp_name;
        $emp->gender               = $request->gender;
        $emp->date_of_birth        = date_format(date_create($request->dob), 'Y-m-d');
        $emp->user_id              = $user->id;
        $emp->save();

        \Session::flash('flash_message', 'Employee details successfully updated');
        return redirect()->back();
    }

    public function doDelete($id)
    {
        
        $emp = User::find($id);
        $emp->delete();

        \Session::flash('flash_message', 'Employee successfully Deleted!');

        return redirect()->back();
    }

    
}
