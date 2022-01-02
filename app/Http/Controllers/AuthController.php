<?php

    namespace App\Http\Controllers;

    use App\Models\Event;
    use App\Models\Meeting;
    use App\Models\Role;
    use App\Models\Employee;
    use App\Models\UserRole;
    use App\Models\AssignProject;
    use App\User;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Contracts\Mail\Mailer;
    use App\Http\Requests;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\DB;

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
            $maleEmployee = Employee::where('gender', 0)->get();
            $femaleEmployee = Employee::where('gender', 1)->get();

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

            return view('hrms.dashboard', compact('events', 'meetings', 'user', 'greetings', 'dateNow', 'maleEmployee', 'femaleEmployee', 'roles', 'dataProjectStatus', 'runningProject', 'finishedProject'));
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
            $maleEmployee = Employee::where('gender', 0)->get();
            $femaleEmployee = Employee::where('gender', 1)->get();

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
