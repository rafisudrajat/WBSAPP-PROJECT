<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Project_type;
use App\Models\Project_category;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {

        $projects = Project::all();
        $data = [
            'title' => 'Dashboard',
            'project_name' => [],
            'project_category' => [],
            'project_type' => []
        ];
        foreach ($projects as $project) {
            // echo $project;
            $project_category = Project_category::find($project['category_id']);
            $project_type = Project_type::find($project['type_id']);
            array_push($data['project_name'], $project['project_name']);
            array_push($data['project_category'], $project_category['project_category_name']);
            array_push($data['project_type'], $project_type['project_type_name']);
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
        $validated = $request->validate([
            'project_name' => 'required',
            'project_desc' => 'required',
            'project_type' => 'required',
            'project_category' => 'required'
        ]);
        $data = $request->all();
        // dd($data);
        $user = User::find($request->session()->get('UserLogged'));

        $projects = new Project();
        $projects->project_name = $data['project_name'];
        $projects->project_desc = $data['project_desc'];

        $projects->type_id = $data['project_type'];
        $projects->category_id = $data['project_category'];
        $save = $user->creator_projects()->save($projects);
        if ($save) {
            return back()->with('success', 'Your account has been registered');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }
    }

    public function add_ProjectType(Request $request)
    {
        $data = $request->all();
        $type = new Project_type();
        $type->project_type_name = $data['type_or_cat'];
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
        $category->project_category_name = $data['type_or_cat'];
        $save = $category->save();
        if ($save) {
            return back()->with('success');
        } else {
            return back()->with('fail');
        }
    }
}
