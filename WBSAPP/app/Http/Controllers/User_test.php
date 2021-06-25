<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specific_role;
use App\Models\User;

class User_test extends Controller
{
    public function addSPRole()
    {
        $roles = [
            ['spec_role_name' => 'Software Engineer'],
            ['spec_role_name' => 'Project Manager'],
            ['spec_role_name' => 'QC Engineer']
        ];
        Specific_role::insert($roles);
        return "specific roles created successfully";
    }

    public function addUser()
    {
        $user =  new User();
        $user->name = 'Lintang';
        $user->email = 'ratri2@gmail.com';
        $user->password = 'LCR19';
        $user->general_role = 'Admin';
        $user->save();
        $roleids = [1, 2];
        return 'ASDADASD';
    }
}
