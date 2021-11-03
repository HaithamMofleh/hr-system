<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('employees')->insert([
            
            'name' => 'HR Manager',
            'gender' => '1',
            'date_of_birth' => '',
            'user_id' => '1'
        ]);

        \DB::table('leave_types')->insert([
            'leave_type' => 'Emergency',
            'description' => 'description',
        ]);
    }
}
