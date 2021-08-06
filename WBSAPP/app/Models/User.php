<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specific_role;
use App\Models\Users_task;
use App\Models\Users_specific_role;
use App\Models\Task;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    public $timestamps = false;
    public function users_specific_roles()
    {
        return $this->hasMany(Users_specific_role::class, 'user_id');
    }
    public function users_task()
    {
        return $this->hasMany(Users_task::class, 'user_id');
    }
    public function creator_projects()
    {
        return $this->hasMany(Project::class, 'creator_id');
    }
    public function task_pic()
    {
        return $this->hasMany(Task::class, 'pic_id');
    }
    public function task_exec()
    {
        return $this->hasMany(Task::class, 'exec_id');
    }
}
