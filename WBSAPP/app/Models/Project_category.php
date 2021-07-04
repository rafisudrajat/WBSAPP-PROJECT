<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Project_category extends Model
{
    use HasFactory;
    protected $table = 'projects_category';
    public $timestamps = false;
    public function projects()
    {
        return $this->hasMany(Project::class, 'category_id');
    }
}
