<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth',['only'=>'create']);
    }
    /*protected function create(array $data)
    {
        return User::create([
            'isActiv' => $data['isActiv'],
            //'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }*/
    public function index()
    {   
        return view('t');
    }
    public function create()
    {   
        return view ('create');
    }
    public function store(CreateVideoRequest $request)
    {
        $user=User::create($request->all());
        return $user;
    }
}
