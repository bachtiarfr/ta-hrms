<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AttendanceManager extends Model
{
    public static function getFilterdSearchResults($request)
    {
        $string = $request['string'];
        $column = $request['column'];
        if($column == 'status')
        {
            $string = convertAttendanceTo($string);
        }
        $dateTo =  date_format(date_create($request['dateTo']), 'Y-m-d');
        $dateFrom =  date_format(date_create($request['dateFrom']), 'Y-m-d');

        if(!empty($column) && !empty($string) && empty($dateFrom) && empty($dateTo)) {
            $attendances = AttendanceManager::whereRaw($column . " like '%" . $string . "%'")->paginate(20);
        } elseif(!empty($dateFrom) && !empty($dateTo) && empty($column) && empty($string)) {
            $attendances = AttendanceManager::whereBetween('date', [$dateFrom, $dateTo])->paginate(20);
        } elseif(!empty($column) && !empty($string) && !empty($dateFrom) && !empty($dateTo)) {
            $attendances = AttendanceManager::whereRaw($column . " like '%" . $string . "%'")->whereBetween('date', [$dateFrom, $dateTo])->paginate(20);
        } else {
            $attendances = AttendanceManager::paginate(20);
        }
        return $attendances;
    }

    public static function saveExcelData($row, $hoursWorked, $difference) {

        $point = 0;

        if ($row->hours_worked == "8:00") {
            $point = 5;
        } elseif ($row->hours_worked == "7:00" || $row->hours_worked == "7:30") {
            $point = 4;
        } elseif ($row->hours_worked == "6:00" || $row->hours_worked == "6:30") {
            $point = 3;
        } else {
            $point = 2;
        }

        $user = Employee::where('code', $row->code)->first();
        $currentAttendancePoints = $user->attendance_points;
        $attendance = new AttendanceManager();
        $attendance->name = $row->name;
        $attendance->code = $row->code;
        $attendance->date = date_format(date_create($row->date), 'Y-m-d');
        $attendance->day = covertDateToDay($row->days);
        \Log::info('inTime='.$row->in_time);
        $attendance->in_time = isset($row->in_time)? $row->in_time : 'H:i:s' ;
        $attendance->out_time = isset($row->out_time)? $row->out_time : 'H:i:s';
        $attendance->status = $point;
        $attendance->leave_status = $row->leave_status;
        $attendance->user_id = $user->user_id;
        $attendance->hours_worked = $hoursWorked;
        $attendance->difference = $difference;
        // $attendance->save();
        $userPoint = DB::table('employees')
            ->where('code', $row->code)
            ->update([
                'attendance_points' => $point + $currentAttendancePoints
            ]);
    }
}
