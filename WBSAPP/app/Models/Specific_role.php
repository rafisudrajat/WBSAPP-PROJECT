<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Specific_role extends Model
{
    use HasFactory;
    protected $table = 'specific_roles';
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_specific_roles', 'spec_role_id');
    }
}
