<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specific_role;
use App\Models\Users_specific_role;
use Illuminate\Support\Facades\Hash;

class EntranceController extends Controller
{
    public function Regist_index(Request $request)
    {
        // dd($request->path());
        return view('register', ['title' => 'Register']);
    }

    public function Regist_submit(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:8'
        ]);

        $data = $request->all();
        $user =  new User();
        $user->name = $data['fullname'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        // TO DO: Change default general_role to NonAdmin
        $user->general_role = 'Admin';
        $save = $user->save();

        // Default Users_specific_role 
        // $users_spec_role = new Users_specific_role();
        // $users_spec_role->user_id = $user->id;
        // $save = $users_spec_role->save();
        // dd($save);
        if ($save) {
            return back()->with('success', 'Your account has been registered');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }
    }

    public function Login_index(Request $request)
    {
        // dd($request->path());
        return view('login', ['title' => 'Login']);
    }

    public function Login_submit(Request $request)
    {
        $data = $request->all();
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        $usermatch = User::where('email', '=', $data['email'])->first();
        if (!$usermatch) {
            return back()->with('fail', "Incorrect Password or Email");
        } else {
            if (Hash::check($data['password'], $usermatch->password)) {
                $request->session()->put('UserLogged', $usermatch->id);
                return redirect('/dashboard');
            } else {
                return back()->with('fail', "Incorrect Password or Email");
            }
        }
    }

    public function logout()
    {
        if (session()->has('UserLogged')) {
            session()->forget('UserLogged');
            return redirect('/');
        }
    }
}
