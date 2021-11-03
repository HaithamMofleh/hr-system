<?php

namespace App;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaves extends Model
{
    protected $fillable = ['user_id', 'leave_type_id' , 'date_from' , 'date_to' , 'from_time' , 'to_time' , 'days'];
    
    public function leaveType()
    {
        return $this->hasOne('App\Models\LeaveType', 'id', 'leave_type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
