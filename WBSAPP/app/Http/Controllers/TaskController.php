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
    public function editTask($task_id)
    {
        $old_data=[
            'title' => 'Task',
            'project_id' => Task::find($task_id)->project_id,
            "gitlab_id" => Task::find($task_id)->gitlab_id,
            "task_cat_id" =>  Task::find($task_id)->task_cat_id,
            "task_name" =>  Task::find($task_id)->task_name,
            "pic_id" =>  Task::find($task_id)->pic_id,
            "exec_id" =>  Task::find($task_id)->exec_id,
            "start_date" =>  Task::find($task_id)->start_date,
            "due_date" =>  Task::find($task_id)->due_date,
            "start_time" =>  Task::find($task_id)->start_time,
            "stop_time" =>  Task::find($task_id)->stop_time,
            "progress" =>  Task::find($task_id)->progress,
            "prev_task" =>  Task::find($task_id)->prev_task,
            "notes" =>  Task::find($task_id)->notes
        ];
        return modal('editTask',$old_data);
    }

    public function updateTask($task_id)
    {
        $this->validate($request,[
            "gitlab_id" => 'required',
            "task_cat_id" => 'required',
            "task_name" => 'required',
            "pic_id" => 'required',
            "exec_id" => 'required',
            "start_date" => 'required',
            "due_date" => 'required',
            "start_time" => 'required',
            "stop_time" => 'required',
            "progress" => 'required',
            "prev_task" => 'required',
            "notes" => 'required'
        ]);
        
        $edited_task=Task::find($id);
        $edited_task->gitlab_id=$request->gitlab_id;
        $edited_task->task_cat_id=$request->task_cat_id;
        $edited_task->task_name_id=$request->task_name_id;
        $edited_task->pic_id=$request->pic_id;
        $edited_task->exec_id=$request->exec_id;
        $edited_task->start_data=$request->start_date;
        $edited_task->due_date=$request->due_date;
        $edited_task->start_time=$request->start_time;
        $edited_task->stop_time=$request->stop_time;
        $edited_task->progress=$request->progress;
        $edited_task->prev_task=$request->prev_task;
        $edited_task->notes=$request->notes;
        
        $edited_task->save();
        if ($edited_task) {
            return redirect('/seealltask')->with('success', 'Your task has been deleted');
        } else {
            return redirect('/seealltask')->with('fail', 'Something went wrong, please try again later');
        }
    }

    public function deleteTask($task_id)
    {
        $delete = Task::find($task_id)->delete();
        if ($delete) {
            return back()->with('success', 'Your task has been deleted');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }

    }

}
