<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Users_task;
use App\Models\Users_specific_role;
use App\Models\Task;
use App\Models\Task_Category;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        //dd($request->all());
        $users_id = Users_specific_role::where('project_id', $request->project_id)->get();
        $users_task = Users_task::where('project_id', $request->project_id)->get();
        $ids_users = [];
        foreach ($users_id as $id) {
            array_push($ids_users, $id['user_id']);
        }
        $task_id = [];
        foreach ($users_task as $task) {
            array_push($task_id, $task['task_id']);
        }

        $users = User::whereIn('id', $ids_users)->get();
        $tasks = Task::whereIn('id', $task_id)->get();

        $user_name = [];
        foreach ($users as $user) {
            array_push($user_name, $user['name']);
            // array_push($user_id, $user['id']);
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
            array_push($notes, $task['notes']);
        }
        $task_categories = [];
        $pics = [];
        $task_executors = [];
        for ($i = 0; $i < count($task_categories_id); $i++) {
            array_push($task_categories, Task_Category::find($task_categories_id[$i])->task_category_name);
            array_push($pics, User::find($pics_id[$i])->name);
            array_push($task_executors, User::find($task_executors_id[$i])->name);
        }
        //dd(Task_Category::all()->toArray());
        $task_cat_list = Task_Category::all()->toArray();
        $task_cat_choice = [];
        foreach ($task_cat_list as $cat) {
            array_push($task_cat_choice, $cat['task_category_name']);
        }
        $data = [
            'title' => 'Task',
            'project_id' => $request->project_id,
            'name_lists' => $user_name,
            'task_cat_lists' => $task_cat_choice,
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
    public function editTask(Request $request)
    {
        $old_task = Task ::firstorCreate([
            'task_id' => request->identifier,
            'pic_id' => request->pic_id,
            'exec_id'=> request->exec_id,
        ]);
        $old_task->gitlab_id= $request->gitlab_id;
        $old_task->progress= $request->progress;
        $old_task->task_name= $request->task_name;
        $old_task->prev_task= $request->prev_task;
        $old_task->start_date= $request->start_date;
        $old_task->due_date= $request->due_date;
        $old_task->start_time=$request->start_time;
        $old_task->stop_time=$request->stop_time;
        $old_task->start_time=$request->start_time;


        $pic_id = (User::where('name', $request['pic-id'])->first())['id'];
        $task_exec_id = (User::where('name', $request['task_exec_id'])->first())['id'];
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


        $edit = Task_Category::destroy($request->task_category);
        if ($edit) {
            return back()->with('success', 'Your task has been deleted');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }
    }

    public function deleteTask(Request $request)
    {
        $delete = Task::where('task_id', $req['task_id'])->delete();
        if ($delete) {
            return back()->with('success', 'Your task has been deleted');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }

    }

}
