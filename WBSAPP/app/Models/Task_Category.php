<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Task_Category extends Model
{
    use HasFactory;
    protected $table = 'task_category';
    public $timestamps = false;
    protected $guarded = [];
    public function task()
    {
        return $this->hasMany(Task::class, 'task_cat_id');
    }
}
