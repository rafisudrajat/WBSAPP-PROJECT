<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users_task;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    public $timestamps = false;

    public function users_task()
    {
        return $this->hasMany(Users_task::class, 'task_id');
    }
}
