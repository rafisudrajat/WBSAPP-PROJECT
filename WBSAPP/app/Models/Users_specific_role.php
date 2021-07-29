<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project;
use App\Models\Specific_role;

class Users_specific_role extends Model
{
    use HasFactory;
    protected $table = 'users_specific_roles';
    public $timestamps = false;
    protected $fillable = ['user_id', 'spec_role_id', 'project_id'];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function specific_roles()
    {
        return $this->belongsTo(Specific_role::class, 'spec_role_id');
    }
}
