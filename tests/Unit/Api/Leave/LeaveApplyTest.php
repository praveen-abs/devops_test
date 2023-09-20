<?php

use App\Models\User;

use Tests\TestCase;

uses(TestCase::class);

beforeEach(function(){

    $this->user_data = User::factory()->create();

});

it('can apply single day leave', function(){

    $singleleave_data = [
                    'user_code'=>$this->user_data->user_code,
                    'leave_request_date'                =>  '2023-09-20 15:15:02',
                    'leave_type_name'                   =>  'Sick Leave',
                    'leave_session'                     =>  '',
                    'start_date'                        =>  '2023-09-20',
                    'end_date'                          =>  '2023-09-20',
                    'no_of_days'                        =>  '1',
                    'hours_diff'                        =>  '',
                    'compensatory_work_days_ids'        =>  [],
                    'notify_to'                         =>  '',
                    'leave_reason'                      =>  'This is test reason',
                    'user_type'                         =>  'Employee'
                ];


    $response = $this->actingAs($this->user_data)->postJson('/api/attendance/apply_leave', $singleleave_data);
    dd($response);
    $response->assertStatus(200)->assertJson([ 'status' => 'success']);
});

afterEach(function(){
    $this->user_data->delete();
    //$this->employee_office_details->delete();
});
