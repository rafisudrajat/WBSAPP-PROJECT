<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Project_category;
use App\Models\Project_type;
use App\Models\Users_task;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Switch_;

class DetailProject extends Controller
{
    public function index(Request $request)
    {
        $req = $request->all();
        $project_id = $req['project_id'];
        $project = Project::find($project_id);
        $memberList = Users_task::where('project_id', $project_id)->get()->toArray();
        $listUserID = [];
        foreach ($memberList as $user_id) {
            array_push($listUserID, $user_id['user_id']);
        }

        $memberList = User::whereIn('id', $listUserID)->get()->toArray();
        $members = [];
        foreach ($memberList as $member) {
            array_push($members, ['name' => $member['name'], 'id' => $member['id']]);
        }

        $creator = User::find($project['creator_id']);
        $project_category = Project_category::find($project['category_id'])->project_category_name;
        $project_type = Project_type::find($project['type_id'])->project_type_name;
        $data = [
            'title' => "Project Details",
            'project_id' => $project["id"],
            'project_name' => $project["project_name"],
            'project_desc' => $project["project_desc"],
            'project_creator' => $creator["name"],
            'project_category' => $project_category,
            'project_type' => $project_type,
            'members' => $members,
        ];

        return view('detailproject', $data);
    }

    public function searchMember(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $csrf = csrf_token();
            $newUsers = [];
            $allUser2Check = [];

            $checkUser = Users_task::where('project_id', $request->project_id)->get();
            foreach ($checkUser as $key => $check) {
                array_push($allUser2Check, $check['user_id']);
            }

            $users = User::where('name', 'LIKE', '%' . $request->search . "%")
                ->orWhere('email', 'LIKE', '%' . $request->search . "%")
                ->get()->toArray();

            if (!$request->search)
                return Response('');
            if ($users) {
                foreach ($users as $user) {
                    if (!in_array($user['id'], $allUser2Check))
                        array_push($newUsers, $user);
                }
                foreach ($newUsers as $newUser) {
                    $output .=
                        "<div class='flex flex-row justify-between space-y-2'>" .
                        "<div class='flex flex-row justify-between space-x-4'>" .
                        "<li style='list-style: none;'>" . $newUser['name'] . '</li>' .
                        "<li style='list-style: none;'>(" . $newUser['email'] . ')</li>' .
                        '</div>' .
                        "<form action='/addMember' method='POST'>" .
                        "<input type='hidden' name='_token' value='$csrf'>" .
                        "<input type='hidden' name='user_id' value=" . $newUser['id'] . ">" .
                        "<input type='hidden' name='project_id' value='$request->project_id'>" .
                        "<button type='submit' class='AddBtn text-sm bg-blue-500 hover:bg-blue-700 text-white  rounded focus:outline-none focus:shadow-outline'>Add</button>" .
                        "</form>" .
                        "</div>";
                }
                return Response($output);
            }
        }
    }
    public function addMember(Request $request)
    {

        $req = $request->all();
        $users_task = new Users_task();
        $users_task->user_id = $req['user_id'];
        $users_task->project_id = $req['project_id'];
        $save = $users_task->save();
        if ($save) {
            return back()->with('success', 'Your account has been registered');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }
    }
    public function deleteMember(Request $request)
    {

        $req = $request->all();
        $delete = Users_task::where('user_id', $req['user_id'])->where('project_id', $req['project_id'])->delete();
        if ($delete) {
            return back()->with('success', 'Your account has been registered');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }
    }
    public function queryCategory_Type(Request $request)
    {
        $output =
            "<select name='general_input' id='general_input' class='change-input'>
            <option value='' selected>-Select Type-</option>";
        if ($request->ajax()) {
            if ($request->key == 'cat') {
                $categories = Project_category::all();
                foreach ($categories as $category) {
                    $output .= "<option value='$category->id'>$category->project_category_name</option>";
                }
                $output .= "</select>";
                return Response($output);
            }
            if ($request->key == 'type') {
                $types = Project_type::all();
                foreach ($types as $type) {
                    $output .= "<option value='$type->id'>$type->project_type_name</option>";
                }
                $output .= "</select>";
                return Response($output);
            }
        }
    }

    public function editProject(Request $request)
    {
        $project = Project::find($request->project_id);
        switch ($request->identifier) {
            case "btn1":
                $project->project_name = $request->general_input;
                break;
            case "btn2":
                $project->project_desc = $request->general_input;
                break;
            case "btn3":
                $project->category_id = $request->general_input;
                break;
            case "btn4":
                $project->type_id = $request->general_input;
                break;
        }
        $save = $project->save();
        if ($save) {
            return back()->with('success', 'Your account has been registered');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }
    }
}
