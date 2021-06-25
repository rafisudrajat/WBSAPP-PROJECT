<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specific_role;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    public $timestamps = false;
    public function specific_roles()
    {
        return $this->belongsToMany(Specific_role::class, 'users_specific_roles', 'user_id', 'spec_role_id');
    }
}
