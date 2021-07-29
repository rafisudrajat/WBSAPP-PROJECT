<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Project_type;
use App\Models\Project_category;
use App\Models\User;
use App\Models\Users_task;
use App\Models\Users_specific_role;
use App\Models\Specific_role;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        // $projects = Project::where('creator_id', $request->session()->get('UserLogged'))->get();
        // dd($request->session()->get('UserLogged'));
        $users_tasks = Users_specific_role::where('user_id', $request->session()->get('UserLogged'))->get()->toArray();
        $projects = [];
        foreach ($users_tasks as $users_task) {
            array_push($projects, $users_task['project_id']);
        }
        $projects = Project::whereIn('id', $projects)->get()->toArray();
        // dd($projects);
        $data = [
            'title' => 'Dashboard',
            'project_name' => [],
            'project_category' => [],
            'project_type' => [],
            'project_id' => []
        ];
        foreach ($projects as $project) {
            // echo $project;
            $project_category = Project_category::find($project['category_id']);
            $project_type = Project_type::find($project['type_id']);
            array_push($data['project_name'], $project['project_name']);
            array_push($data['project_category'], $project_category['project_category_name']);
            array_push($data['project_type'], $project_type['project_type_name']);
            array_push($data['project_id'], $project['id']);
        }
        // dd($data);
        return view('dashboard', $data);
    }

    public function NewProjectForm()
    {
        $type = Project_type::all();
        $category = Project_category::all();
        // dd($type);
        $data = [
            'title' => 'Add New Project',
            'type' => $type,
            'category' => $category
        ];
        return view('addnewproject', $data);
    }

    public function SubmitNewProject(Request $request)
    {
        $users_spec_role = new Users_specific_role();

        $validated = $request->validate([
            'project_name' => 'required',
            'project_desc' => 'required',
            'project_type' => 'required',
            'project_category' => 'required'
        ]);
        $data = $request->all();

        $user = User::find($request->session()->get('UserLogged'));

        $projects = new Project();
        $projects->project_name = $data['project_name'];
        $projects->project_desc = $data['project_desc'];

        $projects->type_id = $data['project_type'];
        $projects->category_id = $data['project_category'];
        $save = $user->creator_projects()->save($projects);
        $users_spec_role->project_id = $save->id;
        $users_spec_role->user_id = $request->session()->get('UserLogged');
        $save = $users_spec_role->save();

        if ($save) {
            return back()->with('success', 'Your account has been registered');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }
    }
    public function delete_project(Request $request)
    {

        $user_spec_roles = Users_specific_role::where('project_id', $request->id2Delete)->get()->toArray();
        $spec_role_2del = [];
        foreach ($user_spec_roles as $role) {
            if ($role['spec_role_id'])
                array_push($spec_role_2del, $role['spec_role_id']);
        }

        $check_spec_role = [];
        foreach ($spec_role_2del as $del) {
            $check = count(Users_specific_role::where('spec_role_id', $del)->get()->toArray());
            array_push($check_spec_role, $check);
        }
        for ($i = 0; $i < count($spec_role_2del); $i++) {
            if ($check_spec_role[$i] <= 1)
                Specific_role::destroy($spec_role_2del[$i]);
        }

        $delete = Project::destroy($request->id2Delete);
        if ($delete) {
            return back()->with('success', 'Your account has been registered');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }
    }

    public function add_ProjectType(Request $request)
    {
        $data = $request->all();
        $type = new Project_type();
        $type->project_type_name = $data['general_input'];
        $save = $type->save();
        if ($save) {
            return back()->with('success');
        } else {
            return back()->with('fail');
        }
    }
    public function add_ProjectCategory(Request $request)
    {
        $data = $request->all();

        $category = new Project_category();
        $category->project_category_name = $data['general_input'];
        $save = $category->save();
        if ($save) {
            return back()->with('success');
        } else {
            return back()->with('fail');
        }
    }
}
