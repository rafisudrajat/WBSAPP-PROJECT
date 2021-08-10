<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Users_task;
use App\Models\Users_specific_role;
use App\Models\Task;
use App\Models\Task_Category;
use App\Models\Specific_role;
use PhpParser\Node\Stmt\Foreach_;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());

        $all_users_id = Users_specific_role::where('project_id', $request->project_id)->get();
        $users_task = Users_task::where('project_id', $request->project_id)->get();
        $current_user = User::find($request->session()->get('UserLogged'));
        $current_users_spec_role = Users_specific_role::where('user_id', $request->session()->get('UserLogged'))->where('project_id', $request->project_id)->get();
        $current_spec_role_ids = [];
        foreach ($current_users_spec_role as $csp_role) {
            array_push($current_spec_role_ids, $csp_role->spec_role_id);
        }

        $ids_users = [];
        $qc_id = [];
        foreach ($all_users_id as $id) {
            array_push($ids_users, $id['user_id']);
            if ($id['spec_role_id'] == 3)
                array_push($qc_id, $id['user_id']);
        }

        $task_id = [];
        $task_maker = [];
        foreach ($users_task as $task) {
            array_push($task_id, $task['task_id']);
            array_push($task_maker, $task['user_id']);
        }

        $users = User::whereIn('id', $ids_users)->get();
        $all_qc = User::whereIn('id', $qc_id)->get();
        $tasks = Task::whereIn('id', $task_id)->get();


        $user_name = [];
        foreach ($users as $user) {
            array_push($user_name, $user['name']);
            // array_push($user_id, $user['id']);
        }
        $qc_name = [];
        foreach ($all_qc as $qc) {
            array_push($qc_name, $qc['name']);
        }

        $gitlab_ids = [];
        $task_categories_id = [];
        $task_names = [];
        $pics_id = [];
        $task_executors_id = [];
        $start_dates = [];
        $due_dates = [];
        $start_times = [];
        $stop_times = [];
        $progress = [];
        $prev_tasks = [];
        $qc_testers_id = [];
        $qc_testdate = [];
        $qc_properness = [];
        $notes = [];
        foreach ($tasks as $task) {
            array_push($gitlab_ids, $task['gitlab_id']);
            array_push($task_categories_id, $task['task_cat_id']);
            array_push($task_names, $task['task_name']);
            array_push($pics_id, $task['pic_id']);
            array_push($task_executors_id, $task['exec_id']);
            array_push($start_dates, $task['start_date']);
            array_push($due_dates, $task['due_date']);
            array_push($start_times, $task['start_time']);
            array_push($stop_times, $task['stop_time']);
            array_push($progress, $task['progress']);
            array_push($prev_tasks, $task['prev_task']);
            array_push($qc_testers_id, $task['qc_tester_id']);
            array_push($qc_testdate, $task['qc_testdate']);
            array_push($qc_properness, $task['qc_properness']);
            array_push($notes, $task['notes']);
        }
        $task_categories = [];
        $pics = [];
        $task_executors = [];
        $qc_testers = [];
        for ($i = 0; $i < count($task_categories_id); $i++) {
            array_push($task_categories, Task_Category::find($task_categories_id[$i])->task_category_name);
            array_push($pics, User::find($pics_id[$i])->name);
            array_push($task_executors, User::find($task_executors_id[$i])->name);
            array_push($qc_testers, User::find($qc_testers_id[$i])->name);
        }
        // dd(Task_Category::all()->toArray());
        $task_cat_list = Task_Category::all()->toArray();
        $task_cat_choice = [];
        foreach ($task_cat_list as $cat) {
            array_push($task_cat_choice, $cat['task_category_name']);
        }
        $data = [
            'title' => 'Task',
            'gen_role' => $current_user->general_role,
            'spec_role' => $current_spec_role_ids,
            'project_id' => $request->project_id,
            'name_lists' => $user_name,
            'qc_lists' => $qc_name,
            'task_cat_lists' => $task_cat_choice,
            "task_maker" => $task_maker,
            "gitlab_id" => $gitlab_ids,
            "task_cat_id" => $task_categories,
            "task_name" => $task_names,
            "pic_id" => $pics,
            "exec_id" => $task_executors,
            "start_date" => $start_dates,
            "due_date" => $due_dates,
            "start_time" => $start_times,
            "stop_time" => $stop_times,
            "progress" => $progress,
            "prev_task" => $prev_tasks,
            "qc_tester" => $qc_testers,
            "qc_testdate" => $qc_testdate,
            "qc_properness" => $qc_properness,
            "notes" => $notes
        ];
        return view('seealltask', $data);
    }
    public function addTask(Request $request)
    {
        // dd($request->all());
        // --- Validation ---
        // $validated = $request->validate([
        //     'gitlab-ID' => 'required',
        //     'email' => 'required|unique:users,email|email',
        //     'password' => 'required|min:8'
        // ]);
        $pic_id = (User::where('name', $request['pic-id'])->first())['id'];
        $task_exec_id = (User::where('name', $request['task_exec_id'])->first())['id'];
        // $list_task
        $Task = new Task();
        $Task->gitlab_id = $request['gitlab-ID'];
        $Task->progress = $request['progress'];
        $Task->task_name = $request['task-name'];
        $Task->pic_id = $pic_id;
        $Task->exec_id = $task_exec_id;
        $Task->prev_task = $request['prev-task'];
        $Task->start_date = $request['start-date'];
        $Task->due_date = $request['due-date'];
        $Task->start_time = $request['start-time'];
        $Task->stop_time = $request['stop-time'];
        $Task->notes = $request['notes'];
        $Task->qc_tester_id = (User::where('name', $request['qc_tester_name'])->first())['id'];
        $Task->qc_testdate = $request['qc_test_date'];
        $Task->qc_properness = $request['qc_properness'];

        // $spec_role = Specific_role::firstOrCreate([
        //     'spec_role_name' => $request->general_input
        // ]);

        $task_cat = Task_Category::firstOrCreate([
            'task_category_name' => $request->task_category
        ]);
        $Task = $task_cat->task()->save($Task);
        $users_task = new Users_task();
        $users_task->user_id = $request->session()->get('UserLogged');
        $users_task->project_id = $request->project_id;
        $users_task->task_id = $Task->id;
        $save = $users_task->save();

        if ($save) {
            return back()->with('success', 'Your account has been registered');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }
    }
}
