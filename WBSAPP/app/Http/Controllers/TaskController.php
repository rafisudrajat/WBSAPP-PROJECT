<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $data = ['title' => 'Task'];
        return view('seealltask', $data);
    }
}
