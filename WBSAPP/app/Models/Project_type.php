<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Project_type extends Model
{
    use HasFactory;
    protected $table = 'projects_type';
    public $timestamps = false;
    public function projects()
    {
        return $this->hasMany(Project::class, 'type_id');
    }
}
