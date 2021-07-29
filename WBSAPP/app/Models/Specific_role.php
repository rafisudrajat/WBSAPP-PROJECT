<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Users_specific_role;

class Specific_role extends Model
{
    use HasFactory;
    protected $table = 'specific_roles';
    protected $fillable = ['id', 'spec_role_name'];
    public $timestamps = false;
    public function users_specific_roles()
    {
        return $this->hasMany(Users_specific_role::class, 'spec_role_id');
    }
}
