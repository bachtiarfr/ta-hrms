<?php

function totalLeaves($leaveType)
{
    $result = [
        '1' => '6',//sick leave
        '2' => '12',//casual leave
        '3' => '30'//maternity leave
    ];
    dd($result[$leaveType]);

    return $result[$leaveType];
}


function convertRole($role)
{
    $data = [
        'Admin' => '1',
        'Director' => '2',
        'Research Analyst' => '3',
        'Senior Research Analyst' => '4',
        'Team Lead' => '5',
        'IT Executive' => '6',
        'HR Manager' => '7',
        'Associate-Enforcement' => '8',
        'Enforcement Head' => '9',
        'Finance Controller' => '10',
        'Consultant' => '11',
        'Front desk Executive' => '12',
        'Software Developer' => '13',
        'Senior Software Developer' => '14',
        'Accounts Executive' => '15',
        'Manager' => '16'
    ];
    if($role){
        return $data[$role];
    }
    return $data;
}


function convertStatus($emp_status)
{
    return $emp_status;
    $data = [
        'Present' => 1,
        'Ex' => 0
    ];
    return $data[$emp_status];
}

function convertStatusBack($emp_status)
{
    if($emp_status){}else{$emp_status=1;}

    $data = [
        '1' => 'Present',
        '0' => 'Ex'
    ];

    return $data;
}

function getLeaveType($leave_id)
{
    $result = \App\Models\LeaveType::where('id', $leave_id)->first();
    return $result->leave_type;
}

function covertDateToDay($date)
{
    $day = strtotime($date);
    $day = date("l", $day);
    return strtoupper($day);
}
/*
function getFormattedDate($date)
{
    $date = new DateTime($date);
    return date_format($date, 'l jS \\of F Y');
}*/


function getFormattedDate($date)
{
    $date =  strtotime($date);
    return date('Y-m-d', $date);
}

function getEmployeeDropDown()
{
    $data = [

        "" => "Select",
        'name' => 'Name',
        'code' => 'Code',
        'department' => 'Department',
        'email' => 'Email',
        'number' => 'Number'
    ];
    return $data;
}


function getLeaveColumns()
{
    $data = [
        "" => "Select",
        'name' => 'Name',
        'code' => 'Code',
        'days' => 'Days',
        'leave_type' => 'Leave type',
        'status' => 'Status'
    ];

    return $data;
}

function getAttendanceDropDown()
{
    $data = [

        "" => "Select",
        'name' => 'Name',
        'code' => 'Code',
    ];
    return $data;
}


function getHoursWorked($inTime, $outTime)
{

    $result = strtotime($outTime) - strtotime($inTime);
    $totalMinutes = abs($result) / 60;

    $minutes = $totalMinutes % '60';
    $hours = $totalMinutes - $minutes;
    $hours = $hours / 60;

    return $hours . ':00' . $minutes . ':00';

}

function convertAttendanceTo($status)
{
    $data = [
        'A' => '0',
        'P' => '1',
        'MIS' => '2',
        'WO' => '3',
        'HLF' => '4'
    ];
    return $data[$status];
}

function convertAttendanceFrom($status)
{
    $data = [
        '0' => 'A',
        '1' => 'P',
        '2' => 'MIS',
        '3' => 'WO',
        '4' => 'HLF'
    ];
    return $data[$status];
}

function qualification()
{
    $data = [
        '' => 'Select one',
        'SMA/SMK Sederajat' => 'SMA/SMK Sederajat',
        'D3' => 'D3',
        'S1' => 'S1',
        'S2' => 'S2',
        'S3' => 'S3',
        'Other' => 'Other'
    ];

        return $data;
    }

    function getGender($gender)
    {
        $data = [
            '0' => 'Male',
            '1' => 'Female',
        ];

        return $data[$gender];
    }

    function formatDate($date)
    {
        $created_at = $date;
        $today      = \Carbon\Carbon::now();
        $difference = date_diff($created_at, $today);

        if ($difference->days > 1) {
            //{{$job->created_at ? $job->created_at->format('l jS \\of F Y') : ''}}
            return $date->format('l jS \\of F Y H:m:s');
        }

        return $date->diffForHumans();
    }

    function getUserData($userId)
    {
        $user = \App\User::where('id', $userId)->with('employee')->first();

        return $user;
    }