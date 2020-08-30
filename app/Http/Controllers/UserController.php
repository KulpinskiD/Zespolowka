<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /*public function __construct()
    {
        
        $this->middleware('auth',['only'=>'create']);
    }*/
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
        $user = User::latest()->get();
    	return view('wypisywanie')->with('user', $user);
    }
    public function create()
    {
        if(auth()->user()->permission>=3)
        {
        return view ('create');
        }
        else
        {

            Session()->flash('permission_erorr ','masz zamałe uprawnienia');
            return view ('welcome');
        }
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function store(Request $request)
    {
            $password=$request->password;
            $password1=$request->password1;
            if($password==$password1)
            {
                
                User::create([
                    'isActiv' => $request['isActiv'],
                    'permission' => $request['permission'],
                    //'name' => $data['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                ]);
                return view ('create'); 
            }
            else
            {
                Session()->flash('bledne_haslo','Podane chasla ruznią się');
                return view ('create');
            }
        
    }
}
