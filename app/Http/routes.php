<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::group(['middleware' => ['web']], function () {

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest']], function () {

    Route::get('/', 'AuthController@showLogin');

    Route::post('/', 'AuthController@doLogin');

    Route::get('reset-password', 'AuthController@resetPassword');

    Route::post('reset-password', 'AuthController@processPasswordReset');

    Route::get('register', 'AuthController@showRegister');
});

Route::group(['middleware' => ['auth']], function () {

    

    Route::get('change-password', 'AuthController@changePassword');

    Route::post('change-password', 'AuthController@processPasswordChange');

    Route::get('logout', 'AuthController@doLogout');

    Route::get('welcome', 'AuthController@welcome');

    Route::get('not-found', 'AuthController@notFound');

    Route::get('dashboard',['as' => 'dashboard', 'uses' => 'AuthController@dashboard'] );

    //Routes for add-employees

    Route::get('add-employee', ['as' => 'add-employee', 'uses' => 'EmpController@addEmployee']);

    Route::post('add-employee', ['as' => 'add-employee', 'uses' => 'EmpController@processEmployee']);

    Route::get('employee-manager', ['as' => 'employee-manager', 'uses' => 'EmpController@showEmployee']);

    Route::get('edit-emp/{id}', ['as' => 'edit-emp', 'uses' => 'EmpController@showEdit']);

    Route::post('edit-emp/{id}', ['as' => 'edit-emp', 'uses' => 'EmpController@doEdit']);

    Route::get('delete-emp/{id}', ['as' => 'delete-emp', 'uses' => 'EmpController@doDelete']);



    //Routes for Role.

    Route::get('add-role', ['as' => 'add-role', 'uses' => 'RoleController@addRole']);

    Route::post('add-role', ['as' => 'add-role', 'uses' => 'RoleController@processRole']);

    Route::get('role-list', ['as' => 'role-list', 'uses' => 'RoleController@showRole']);

    Route::get('edit-role/{id}', ['as' => 'edit-role', 'uses' => 'RoleController@showEdit']);

    Route::post('edit-role/{id}', ['as' => 'edit-role', 'uses' => 'RoleController@doEdit']);

    Route::get('delete-role/{id}', ['as' => 'delete-role', 'uses' => 'RoleController@doDelete']);



    //Routes for Leave.

    Route::get('add-leave-type', ['as' => 'add-leave-type', 'uses' => 'LeaveController@addLeaveType']);

    Route::post('add-leave-type', ['as' => 'add-leave-type', 'uses' => 'LeaveController@processLeaveType']);

    Route::get('leave-type-listing', ['as' => 'leave-type-listing', 'uses' => 'LeaveController@showLeaveType']);

    Route::get('my-leave-list', ['as' => 'my-leave-list', 'uses' => 'LeaveController@showMyLeave']);
    Route::get('total-leave-list', ['as' => 'total-leave-list', 'uses' => 'LeaveController@showAllLeave']);

    Route::get('edit-leave-type/{id}', ['as' => 'edit-leave-type', 'uses' => 'LeaveController@showEdit']);

    Route::post('edit-leave-type/{id}', ['as' => 'edit-leave-type', 'uses' => 'LeaveController@doEdit']);

    Route::get('delete-leave-type/{id}', ['as' => 'delete-leave-type', 'uses' => 'LeaveController@doDelete']);

    //Routes for Attendance.
    Route::get('attendance-upload', ['as' => 'attendance-upload', 'uses' => 'AttendanceController@importAttendanceFile']);
    
    Route::post('attendance-upload', ['as' => 'attendance-upload', 'uses' => 'AttendanceController@uploadFile']);
});
