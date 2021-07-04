<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Project_type;
use App\Models\Project_category;

class DashboardController extends Controller
{
    public function index()
    {
        // $data = [
        //     'title' => 'Dashboard',
        //     'project_name' => [
        //         'project 1',
        //         'project 2',
        //         'project 3'
        //     ],
        //     'project_desc' => [
        //         'This is the first project',
        //         'This is the second project',
        //         'This is the third project',
        //     ],
        // ];
        $projects = Project::all();
        dd($projects[0]->project_name);
        // return view('dashboard', $data);
    }

    public function NewProjectForm()
    {
        return view('addnewproject', ['title' => 'Add New Project']);
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
        $projects = new Project();
        $type = new Project_type();
        $category = new Project_category();
        $projects->project_name = $data['project_name'];
        $projects->project_desc = $data['project_desc'];

        $type->project_type_name = $data['project_type'];
        $category->project_category_name = $data['project_category'];

        $type->save();
        $type_id = $type->id;
        $category->save();
        $category_id = $category->id;

        $projects->type_id = $type_id;
        $projects->category_id = $category_id;
        $projects->save();
    }
}
