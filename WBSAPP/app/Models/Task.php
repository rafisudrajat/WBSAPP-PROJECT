<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users_task;
use App\Models\Task_Category;
use App\Models\User;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    public $timestamps = false;

    public function users_task()
    {
        return $this->hasMany(Users_task::class, 'task_id');
    }
    public function task_category()
    {
        return $this->belongsTo(Task_Category::class, 'task_cat_id');
    }
    public function user_pic()
    {
        return $this->belongsTo(User::class, 'pic_id');
    }
    public function user_task_exec()
    {
        return $this->belongsTo(User::class, 'exec_id');
    }
    public function user_qc_tester()
    {
        return $this->belongsTo(User::class, 'qc_tester_id');
    }
}
