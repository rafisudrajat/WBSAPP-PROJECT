<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Project_category;
use App\Models\Project_type;
// use Illuminate\Support\Facades\DB;

class DetailProject extends Controller
{
    public function index(Request $request)
    {
        $req = $request->all();
        $project_id = $req['project_id'];
        $project = Project::find($project_id);
        $creator = User::find($project['creator_id']);
        $project_category = Project_category::find($project['category_id'])->project_category_name;
        $project_type = Project_type::find($project['type_id'])->project_type_name;
        $data = [
            'title' => "Project Details",
            'project_name' => $project["project_name"],
            'project_desc' => $project["project_desc"],
            'project_creator' => $creator["name"],
            'project_category' => $project_category,
            'project_type' => $project_type
        ];


        return view('detailproject', $data);
    }
    public function searchMember(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            if (!$request->search)
                return Response('');
            $users = User::where('name', 'LIKE', '%' . $request->search . "%")->get();
            if ($users) {
                foreach ($users as $key => $user) {
                    // return Response($product->name);
                    $output .=
                        "<div class='flex flex-row justify-between space-y-2'>" .
                        "<div class='flex flex-row justify-between space-x-4'>" .
                        "<li style='list-style: none;'>" . $user->name . '</li>' .
                        "<li style='list-style: none;'>(" . $user->email . ')</li>' .
                        '</div>' .
                        "<button type='submit' class='AddBtn text-sm bg-blue-500 hover:bg-blue-700 text-white  rounded focus:outline-none focus:shadow-outline'>Add</button>" .
                        "</div>";
                }
                return Response($output);
            }
        }
    }
}
