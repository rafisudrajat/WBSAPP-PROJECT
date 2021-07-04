<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;

class Users_task extends Model
{
    use HasFactory;
    protected $table = 'users_tasks';
    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function tasks()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
