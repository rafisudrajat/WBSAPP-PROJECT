<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specific_role;
use App\Models\Users_task;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    public $timestamps = false;
    public function specific_roles()
    {
        return $this->belongsToMany(Specific_role::class, 'users_specific_roles', 'user_id', 'spec_role_id');
    }
    public function users_task()
    {
        return $this->hasMany(Users_task::class, 'user_id');
    }
    public function creator_projects()
    {
        return $this->hasMany(Project::class, 'creator_id');
    }
}
