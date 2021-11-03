<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddAttendanceRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
            
        return [
            'user_id' => 'required',
            'leave_type_id' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
            'from_time' => 'required',
            'to_time' => 'required',
            'days' => 'required',
        ];
    }
}
