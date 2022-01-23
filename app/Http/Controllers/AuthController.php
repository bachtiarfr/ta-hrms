<?php

    namespace App\Http\Controllers;

    use App\Models\Event;
    use App\Models\Meeting;
    use App\Models\Role;
    use App\Models\Employee;
    use App\Models\UserRole;
    use App\Models\AssignProject;
    use App\Models\LeaveType;
    use App\User;
    use App\EmployeeLeaves;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Contracts\Mail\Mailer;
    use App\Http\Requests;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\DB;
    use PDF;

    class AuthController extends Controller
    {
        public function __construct(Mailer $mailer)
        {
            $this->mailer = $mailer;
        }

        public function showLogin()
        {
            return view('hrms.auth.login');
        }

        public function doLogin(Request $request)
        {
            $email    = $request->email;
            $password = $request->password;

            $user = User::where('email', $email)->first();
            if ($user) {

                if (\Auth::attempt(['email' => $email, 'password' => $password])) {
                    return redirect()->to('welcome');
                } else {
                    \Session::flash('class', 'alert-danger');
                    \Session::flash('message', 'User id or password does not match!');
                }
            } else {
                \Session::flash('class', 'alert-danger');
                \Session::flash('message', 'User id or password does not match!');
            }

            return redirect()->to('/');
        }

        public function doLogout()
        {
            \Auth::logout();

            return redirect()->to('/');
        }

        public function dashboard()
        {
            
            $dataFinishedProject = [];
            $dataRuningProject = [];

            $greetings = "";
            /* This sets the $time variable to the current hour in the 24 hour clock format */
            $time = date("H");
        
            /* Set the $timezone variable to become the current timezone */
            $timezone = date("e");
        
            /* If the time is less than 1200 hours, show good morning */
            if ($time < "12") {
                $greetings = "Good morning";
            } else
        
            /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
            if ($time >= "12" && $time < "17") {
                $greetings = "Good afternoon";
            } else
        
            /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
            if ($time >= "17" && $time < "19") {
                $greetings = "Good evening";
            } else
        
            /* Finally, show good night if the time is greater than or equal to 1900 hours */
            if ($time >= "19") {
                $greetings = "Good night";
            }

            $roles = Role::get();
            $maleEmployee = Employee::where('gender', 1)->get();
            $femaleEmployee = Employee::where('gender', 0)->get();

            $dateNow = \Carbon\Carbon::now()->format('l, jS \\of F Y');
            $user     = User::where('id', \Auth::user()->id)->first();
            $events   = $this->convertToArray(Event::where('date', '>', Carbon::now())->orderBy('date', 'desc')->take(3)->get());
            $meetings = $this->convertToArray(Meeting::where('date', '>', Carbon::now())->orderBy('date', 'desc')->take(3)->get());

            $dataProjects = DB::table('projects')
                ->select('name', 'date_of_release')
                ->join('assign_projects', 'projects.id', '=', 'assign_projects.project_id')
                ->orderBy('projects.name')
                ->distinct()
                ->get();

            if (count($dataProjects) > 0) {
                foreach ($dataProjects as $row) {
                    $date = new Carbon($row->date_of_release);
                    // dd($date);
                    $dateStatus = $date->isPast();
                    $dataProjectStatus[] = [ 
                        'project_name' => $row->name,
                        'release_date' => $row->date_of_release,
                        'finished_status' => $dateStatus
                    ];
                    
                    $countRunningProject = 0;
                    $countFinishedProject = 0;

                    foreach ($dataProjectStatus as $i) {
                        if ($i['finished_status'] == true) {
                            $countFinishedProject++;
                            $dataFinishedProject[] = $i['project_name'];
                        } else {
                            $countRunningProject++; 
                            $dataRuningProject[] = $i['project_name'];
                        }
                    }    
                }
                $dataFinishedProject = array_unique($dataFinishedProject);
                $dataRuningProject = array_unique($dataRuningProject);
            }

            $dataProjectStatus[] = [];

            $runningProject = $countRunningProject;
            $finishedProject = $countFinishedProject;
            
            // get who's take a leave
            $offEmps = DB::table('users')
                ->select('users.name', 'employee_leaves.date_from', 'employee_leaves.date_to', 'employee_leaves.status')
                ->join('employee_leaves', 'users.id', '=', 'employee_leaves.user_id')
                ->where('employee_leaves.status', '=', 1)
                ->whereDate('employee_leaves.date_from', '=', Carbon::now()->format('Y-m-d'))
                ->groupBy('users.name')
                ->get();                

                // dd($offEmps);

            // get leave balance
           $dataSickLeaves = DB::table('employee_leaves')
                ->select('employee_leaves.days', 'leave_types.number_of_days')
                ->join('leave_types', 'employee_leaves.leave_type_id', 'leave_types.id')
                ->where('employee_leaves.user_id', $user->id)
                ->where('employee_leaves.leave_type_id', 1)
                ->where('employee_leaves.status', 1)
                ->first();

           $dataCasualLeaves = DB::table('employee_leaves')
                ->select('employee_leaves.days', 'leave_types.number_of_days')
                ->join('leave_types', 'employee_leaves.leave_type_id', 'leave_types.id')
                ->where('employee_leaves.user_id', $user->id)
                ->where('employee_leaves.leave_type_id', 2)
                ->where('employee_leaves.status', 1)
                ->first();

           $dataMaternityLeaves = DB::table('employee_leaves')
                ->select('employee_leaves.days', 'leave_types.number_of_days')
                ->join('leave_types', 'employee_leaves.leave_type_id', 'leave_types.id')
                ->where('employee_leaves.user_id', $user->id)
                ->where('employee_leaves.leave_type_id', 3)
                ->where('employee_leaves.status', 1)
                ->first();

            if($dataSickLeaves == null) {
                $remainingSickLeave = 6;
            } else {
                $remainingSickLeave = $dataSickLeaves->number_of_days - $dataSickLeaves->days;
            }

            if($dataCasualLeaves == null) {
                $remainingCasualLeave = 12;
            } else {
                $remainingCasualLeave = $dataCasualLeaves->number_of_days - $dataCasualLeaves->days;
            }
            
            if($dataMaternityLeaves == null) {
                $remainingMaternityLeave = 30;
            } else {
                $remainingMaternityLeave = $dataMaternityLeaves->number_of_days - $dataMaternityLeaves->days;
            }
            $dataUserWhoOff = $offEmps;
            return view('hrms.dashboard', compact('events', 'meetings', 'user', 'greetings', 'dateNow', 'maleEmployee', 'femaleEmployee', 'roles', 'dataProjectStatus', 'runningProject', 'finishedProject', 'dataRuningProject', 'dataFinishedProject', 'dataUserWhoOff', 'remainingSickLeave', 'remainingCasualLeave', 'remainingMaternityLeave'));
        }

        public function exportPDF()
        {
            $dataFinishedProject = [];
            $dataRuningProject = [];

            $greetings = "";
            /* This sets the $time variable to the current hour in the 24 hour clock format */
            $time = date("H");
        
            /* Set the $timezone variable to become the current timezone */
            $timezone = date("e");
        
            /* If the time is less than 1200 hours, show good morning */
            if ($time < "12") {
                $greetings = "Good morning";
            } else
        
            /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
            if ($time >= "12" && $time < "17") {
                $greetings = "Good afternoon";
            } else
        
            /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
            if ($time >= "17" && $time < "19") {
                $greetings = "Good evening";
            } else
        
            /* Finally, show good night if the time is greater than or equal to 1900 hours */
            if ($time >= "19") {
                $greetings = "Good night";
            }

            $roles = Role::get();
            $maleEmployee = Employee::where('gender', 1)->get();
            $femaleEmployee = Employee::where('gender', 0)->get();

            $dateNow = \Carbon\Carbon::now()->format('l, jS \\of F Y');
            $user     = User::where('id', \Auth::user()->id)->first();
            $events   = $this->convertToArray(Event::where('date', '>', Carbon::now())->orderBy('date', 'desc')->take(3)->get());
            $meetings = $this->convertToArray(Meeting::where('date', '>', Carbon::now())->orderBy('date', 'desc')->take(3)->get());

            $dataProjects = DB::table('projects')
                ->select('name', 'date_of_release')
                ->join('assign_projects', 'projects.id', '=', 'assign_projects.project_id')
                ->orderBy('projects.name')
                ->distinct()
                ->get();

            if (count($dataProjects) > 0) {
                foreach ($dataProjects as $row) {
                    $date = new Carbon($row->date_of_release);
                    // dd($date);
                    $dateStatus = $date->isPast();
                    $dataProjectStatus[] = [ 
                        'project_name' => $row->name,
                        'release_date' => $row->date_of_release,
                        'finished_status' => $dateStatus
                    ];
                    
                    $countRunningProject = 0;
                    $countFinishedProject = 0;

                    foreach ($dataProjectStatus as $i) {
                        if ($i['finished_status'] == true) {
                            $countFinishedProject++;
                            $dataFinishedProject[] = $i['project_name'];
                        } else {
                            $countRunningProject++; 
                            $dataRuningProject[] = $i['project_name'];
                        }
                    }    
                }
                $dataFinishedProject = array_unique($dataFinishedProject);
                $dataRuningProject = array_unique($dataRuningProject);
            }

            $dataProjectStatus[] = [];

            $runningProject = $countRunningProject;
            $finishedProject = $countFinishedProject;
            
            // get who's take a leave
            // $offEmps = EmployeeLeaves::where('status', 1)->get();
            $offEmps = DB::table('users')
                ->select('users.name', 'employee_leaves.date_from', 'employee_leaves.date_to', 'employee_leaves.status')
                ->join('employee_leaves', 'users.id', '=', 'employee_leaves.user_id')
                ->where('employee_leaves.status', '=', 1)
                ->get();
            // dd($offEmps);

            // get who's take a leave
            $dateRange = [];
            $dataUserWhoOff = [];
            foreach ($offEmps as $emp) {
                $date_now = Carbon::now()->format('Y-m-d');
                $date_from = Carbon::parse($emp->date_from)->format('Y-m-d');
                $date_to = Carbon::parse($emp->date_to)->format('Y-m-d');
                if ($date_from == $date_now) {
                    $iDateFrom = mktime(1, 0, 0, substr($date_from, 5, 2), substr($date_from, 8, 2), substr($date_from, 0, 4));
                    $iDateTo = mktime(1, 0, 0, substr($date_to, 5, 2), substr($date_to, 8, 2), substr($date_to, 0, 4));
                    
                    if ($iDateTo >= $iDateFrom) {
                        array_push($dateRange, date('Y-m-d', $iDateFrom)); // first entry
                        while ($iDateFrom<$iDateTo) {
                            $iDateFrom += 86400; // add 24 hours
                            array_push($dateRange, date('Y-m-d', $iDateFrom));
                        }
                    }
                    
                    array_push($dataUserWhoOff, $emp->name);
                }                
            }

            // get leave balance
           $dataSickLeaves = DB::table('employee_leaves')
                ->select('employee_leaves.days', 'leave_types.number_of_days')
                ->join('leave_types', 'employee_leaves.leave_type_id', 'leave_types.id')
                ->join('employees', 'employee_leaves.user_id', 'employees.user_id')
                ->where('employee_leaves.user_id', 'employees.user_id')
                ->where('employee_leaves.leave_type_id', 1)
                ->first();

           $dataCasualLeaves = DB::table('employee_leaves')
                ->select('employee_leaves.days', 'leave_types.number_of_days')
                ->join('leave_types', 'employee_leaves.leave_type_id', 'leave_types.id')
                ->join('employees', 'employee_leaves.user_id', 'employees.user_id')
                ->where('employee_leaves.user_id', 'employees.user_id')
                ->where('employee_leaves.leave_type_id', 2)
                ->first();

           $dataMaternityLeaves = DB::table('employee_leaves')
                ->select('employee_leaves.days', 'leave_types.number_of_days')
                ->join('leave_types', 'employee_leaves.leave_type_id', 'leave_types.id')
                ->join('employees', 'employee_leaves.user_id', 'employees.user_id')
                ->where('employee_leaves.user_id', 'employees.user_id')
                ->where('employee_leaves.leave_type_id', 3)
                ->first();

            if($dataSickLeaves == null) {
                $remainingSickLeave = 0;
            } else {
                $remainingSickLeave = $dataSickLeaves->number_of_days - $dataSickLeaves->days;
            }

            if($dataCasualLeaves == null) {
                $remainingCasualLeave = 0;
            } else {
                $remainingCasualLeave = $dataCasualLeaves->number_of_days - $dataCasualLeaves->days;
            }
            
            if($dataMaternityLeaves == null) {
                $remainingMaternityLeave = 0;
            } else {
                $remainingMaternityLeave = $dataMaternityLeaves->number_of_days - $dataMaternityLeaves->days;
            }
            // $dataUserWhoOff = [];
            // $pdf = PDF::loadview('hrms.export-pdf');
            $pdf = PDF::loadview('hrms.dashboard', ['events', 'meetings', 'user', 'greetings', 'dateNow', 'maleEmployee', 'femaleEmployee', 'roles', 'dataProjectStatus', 'runningProject', 'finishedProject', 'dataRuningProject', 'dataFinishedProject', 'dataUserWhoOff', 'remainingSickLeave', 'remainingCasualLeave', 'remainingMaternityLeave']);
            return $pdf->stream();
            
        }

        public function getJsonDataUser()
        {
            $record = User::get();
            $userData = [];
            foreach($record as $row) {
                $userData['name'][] = $row->name;
                $userData['email'][] = $row->email;
            }        
            return $userData;
        }
        
        public function getJsonDataRole()
        {
            $roleAdmin = UserRole::where('role_id', 1)->get();
            $roleHR = UserRole::where('role_id', 2)->get();
            $rolePM = UserRole::where('role_id', 3)->get();
            $roleFE = UserRole::where('role_id', 4)->get();
            $roleBE = UserRole::where('role_id', 5)->get();

            $dataRoles = [count($roleAdmin), count($roleHR), count($rolePM), count($roleFE), count($roleBE)];

            return $dataRoles;
        }
        
        public function getJsonDataProjects()
        {
            $dataProjects = DB::table('projects')
                ->select('name', 'date_of_release')
                ->join('assign_projects', 'projects.id', '=', 'assign_projects.project_id')
                ->orderBy('projects.name')
                ->distinct()
                ->get();

            foreach ($dataProjects as $row) {
                $date = new Carbon($row->date_of_release);
                $dateStatus = $date->isPast();
                $dataProjectStatus[] = [ 
                    'project_name' => $row->name,
                    'release_date' => $row->date_of_release,
                    'finished_status' => $dateStatus
                ];

                $runningProject = 0;
                $finishedProject = 0;
                foreach ($dataProjectStatus as $i) {
                    if ($i['finished_status'] == true) {
                        $finishedProject++;
                    } elseif ($i['finished_status'] == false) {
                        $runningProject++; 
                    }
                }
            }

            $dataProject = [ $finishedProject, $runningProject ];            
            return $dataProject;
        }

        public function getJsonDataGender()
        {
            $maleEmployee = Employee::where('gender', 1)->get();
            $femaleEmployee = Employee::where('gender', 0)->get();

            $dataGender = [ count($maleEmployee), count($femaleEmployee) ];

            return $dataGender;
        }

        public function welcome()
        {
            return view('hrms.auth.welcome');
        }

        public function notFound()
        {
            return view('hrms.auth.not_found');
        }

        public function showRegister()
        {
            return view('hrms.auth.register');
        }

        public function doRegister(Request $request)
        {
            return view('hrms.auth.register');
        }

        public function calendar()
        {
            return view('hrms.auth.calendar');
        }

        public function changePassword()
        {
            return view('hrms.auth.change');
        }

        public function processPasswordChange(Request $request)
        {
            $password = $request->old;
            $user     = User::where('id', \Auth::user()->id)->first();


            if (Hash::check($password, $user->password)) {
                $user->password = bcrypt($request->new);
                $user->save();
                \Auth::logout();

                return redirect()->to('/')->with('message', 'Password updated! LOGIN again with updated password.');
            } else {
                \Session::flash('flash_message', 'The supplied password does not matches with the one we have in records');

                return redirect()->back();
            }
        }

        public function resetPassword()
        {
            return view('hrms.auth.reset');
        }

        public function createNewPassword()
        {
            return view('hrms.auth.create-new-password');
        }
        
        public function processNewPassword(Request $request)
        {
            $password = $request->password;
            $user  = User::where('email', $email)->first();

            if ($user) {
                $string = strtolower(str_random(6));


                $this->mailer->send('hrms.auth.reset_password', ['user' => $user, 'string' => $string], function ($message) use ($user) {
                    $message->from('no-reply@dipi-ip.com', 'Digital IP Insights');
                    $message->to($user->email, $user->name)->subject('Your new password');
                });

                \DB::table('users')->where('email', $email)->update(['password' => bcrypt($string)]);

                return redirect()->to('/')->with('message', 'Login with your new password received on your email');
            } else {
                return redirect()->to('/')->with('message', 'Your email is not registered');
            }

        }

        public function processPasswordReset(Request $request)
        {
            $email = $request->email;
            $user  = User::where('email', $email)->first();

            if ($user) {
                $string = strtolower(str_random(6));


                $this->mailer->send('hrms.auth.reset_password', ['user' => $user, 'string' => $string], function ($message) use ($user) {
                    $message->from('no-reply@dipi-ip.com', 'Digital IP Insights');
                    $message->to($user->email, $user->name)->subject('Your new password');
                });

                \DB::table('users')->where('email', $email)->update(['password' => bcrypt($string)]);

                return redirect()->to('/')->with('message', 'Login with your new password received on your email');
            } else {
                return redirect()->to('/')->with('message', 'Your email is not registered');
            }

        }

        public function convertToArray($values)
        {
            $result = [];
            foreach ($values as $key => $value) {
                $result[$key] = $value;
            }

            return $result;
        }

    }
