<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\Request;
use App\User;
use App\Models\UserRole;
use App\Models\AssignProject;
use DB;
use App\Http\Requests;
use Carbon\Carbon;

class ProjectController extends Controller
{
    public function addProject()
    {

        $model = new \stdClass();
        $model->clients = Client::get();
        return view('hrms.projects.add', compact('model'));
    }

    public function saveProject(Requests\AddProjectRequest $request)
    {
        $project = new Project();
        $project->fill(array_except($request->all(), '_token'));
        $project->save();

        \Session::flash('flash_message', 'Project added successfully');

        return redirect()->back();
    }


//    public function assignProject()
//    {
//        $model = new \stdClass();
//        $model->projects = Project::get();
//        $model->employees = Employee::whereHas('userrole', function($q)
//        {
//            $q->whereIn('role_id', ['3', '4']);
//        })
//            ->get();
//
//        return view('hrms.projects.assign', compact('model'));
//
//    }

    public function validateCode($code)
    {

        $client = Client::where('code', $code)->first();
        if ($client) {
             json_encode(['status' => false]);
        }
        // json_encode(['status' => true]);
    }

    public function processProject(Request $request)
    {
        $project = new Project;
        $project->name = $request->project_name;
        $project->description = $request->description;
      //  $project->fill(array_except($request->all(),'_token'));
        $project->code= $request->code;
        $project->client_id = $request->client_id;
        $project->save();
        \Session::flash('flash_message', 'Project successfully added!');
        return redirect()->back();
    }

    public function listProject()
    {

        $projects = DB::table('projects')
            ->select(
                'projects.id',
                'projects.name',
                'projects.description',
                'projects.code',
                'clients.name as client_name',
                'assign_projects.date_of_release',
                'projects.status'
            )
            ->join('assign_projects', 'projects.id', '=', 'assign_projects.project_id')
            ->join('clients', 'clients.id', '=', '.projects.client_id')
            ->orderBy('projects.name')
            ->distinct()
            ->paginate(15);
            // ->get();
        // dd($projects);
            
        // dd($projects);
        // $dataFinishedProject = [];
        // $dataRuningProject = [];
        // $dataDelayedProject = [];

        // $countRunningProject = 0;
        // $countFinishedProject = 0;
        // $countDelayedProject = 0;

        // if (count($projects) > 0) {
        //     foreach ($projects as $row) {
        //         $date = new Carbon($row->date_of_release);
        //         $dateStatus = $date->isPast();
        //         if($row->status == 0 && $dateStatus == false) {
        //             $countRunningProject++;
        //             $dataRuningProject[] = $row->name;
        //         } 
                
        //         if ($row->status == 1 && $dateStatus == true) {
        //             $countFinishedProject++;
        //             $dataFinishedProject[] = $row->name;
        //         } 
                
        //         if ($row->status != 1 && $dateStatus == true) {
        //             $countDelayedProject++;
        //             $dataDelayedProject[] = $row->name;
        //         }
        //     }
        // }

        // $projects = Project::with('client')->paginate(15);
        return view('hrms.projects.list', compact('projects'));
    }


    public function showEdit($projectId)
    {

        $project = DB::table('projects')
            ->select(
                'projects.id',
                'projects.name',
                'projects.description',
                'projects.code',
                'clients.name as client_name',
                'clients.id as client_id',
                'assign_projects.date_of_release',
                'projects.status'
            )
            ->join('assign_projects', 'projects.id', '=', 'assign_projects.project_id')
            ->join('clients', 'clients.id', '=', '.projects.client_id')
            ->where('projects.id', '=', $projectId)
            ->first();

        $model = new \stdClass();
        // $project = Project::with('client')->where(['id' => $projectId])->first();
        // dd($project);
        $clients = Client::get();
        foreach($clients as $client)
        {
            $model->clients[$client->id] = $client->name;
        }
        return view('hrms.projects.edit', compact('project','model'));
    }


    public function doEdit(Request $request, $id)
    {
        $name = $request->name;
        $status = $request->status;
        $description = $request->description;
        $code = $request->code;
        $client_id = $request->client_id;
        $status = $request->status;
        $edit = project::findOrFail($id);
        if (!empty($name)) {
            $edit->name = $name;
        }
        if (!empty($status)) {
            $edit->status = $status;
        }
        if (!empty($description)) {
            $edit->description = $description;
        }
        if (!empty($code)) {
            $edit->code = $code;
        }
        if (!empty($client_id)) {
            $edit->client_id = $client_id;
        }
        if (!empty($status)) {
            $edit->status = $status;
        }

        $edit->save();
        \Session::flash('flash_message', 'project successfully updated!');
        return redirect('list-project');
    }

    public function doDelete($id)
    {
        $project = project::find($id);
        $project->delete();
        \Session::flash('flash_message', 'Project successfully Deleted!');
        return redirect('list-project');
    }

    public function doAssign()
    {
        $emps = User::get();
        $authority = DB::table('users')
            ->select('users.id', 'users.name')
            ->join('user_roles', 'user_roles.user_id', 'users.id')
            ->where('user_roles.role_id', '=', 1)
            ->get();
        // dd($authority);
        $projects = Project::get();
        return view('hrms.project.assign-project', compact('emps', 'projects', 'authority'));
    }

    public function processAssign(Request $request)
    {
        $employees = $request->member_id;
        // dd($request);
        foreach ($employees as $emp) {
            $assignment = new AssignProject();
            $assignment->project_id = $request->project_id;
            $assignment->user_id = $emp;
            $assignment->project_leader_id = $request->project_leader_id;
            $assignment->authority_id = $request->authority_id;
            $assignment->date_of_assignment = date_format(date_create($request->doa), 'Y-m-d');
            $assignment->date_of_release = date_format(date_create($request->dor), 'Y-m-d');
            $assignment->save();
        }

        \Session::flash('flash_message', 'Project successfully assigned!');
        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProjectAssignment()
    {
        $projects = AssignProject::with(['employee','authority', 'project'])->paginate(5);
        return view('hrms.project.show-project-assignment', compact('projects'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEditAssign($id)

    {
        $assigns = AssignProject::with(['employee', 'project'])->where('id', $id)->first();

        $emps = Employee::get();
        $projects = project::get();
        return view('hrms.project.edit-project-assignment', compact('assigns', 'emps', 'projects'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doEditAssign($id, Request $request)

    {
        $assignment = AssignProject::with(['employee', 'project'])->where('id', $id)->first();
        $assignment->user_id = $request->emp_id;
        $assignment->project_id = $request->project_id;
        $assignment->authority_id = $request->authority_id;
        $assignment->date_of_assignment = date_format(date_create($request->doa), 'Y-m-d');
        $assignment->date_of_release = date_format(date_create($request->dor), 'Y-m-d');
        $assignment->save();


        \Session::flash('flash_message', 'project Assignment successfully updated!');
        return redirect('project-assignment-listing');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doDeleteAssign($id)
    {
        $assign = AssignProject::find($id);
        $assign->delete();

        \Session::flash('flash_message', 'Project Assignment successfully Deleted!');
        return redirect('project-assignment-listing');
    }
}
