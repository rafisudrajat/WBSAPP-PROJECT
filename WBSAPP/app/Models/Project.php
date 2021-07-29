<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project_category;
use App\Models\Project_type;
use App\Models\User;
use App\Models\Users_task;
use App\Models\Users_specific_role;


class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    public $timestamps = false;
    public function creator_projects()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
    public function project_types()
    {
        return $this->belongsTo(Project_type::class, 'type_id');
    }
    public function project_categories()
    {
        return $this->belongsTo(Project_category::class, 'category_id');
    }
    public function users_task()
    {
        return $this->hasMany(Users_task::class, 'project_id');
    }
    public function users_specific_roles()
    {
        return $this->hasMany(Users_specific_role::class, 'project_id');
    }
}
