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
    public function index()
    {
        $user = User::latest()->get();
    	return view('wypisywanie')->with('user', $user);
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
    	return view('wypisz_pojedynczy')->with('user', $user);
    }
    public function create()
    {
        if(auth()->user()->permission>=3)
        {
        return view ('create');
        }
        else
        {

            Session()->flash('permission_erorr ','masz za małe uprawnienia');
            return view ('welcome');
        }
    }
    public function update(Request $request)
    {

        if($request->password==null)
        {
            
            $user = User::findOrFail($request->id);
            $password=$user->password;
            DB::table('users')->where('id', $request->id)->update(
                [
                'email' => $request->email,
                'password'=>$password,
                'isActiv'=>$request->isActiv,
                'permission'=>$request->permission,
                'created_at'=>$request->created_at,
                'updated_at'=>$request->updated_at
                ]
                
            
            );
            return view ('t'); 
        }
        else
        {
            $password=$request->password;
            $password1=$request->password1;
            if($password!=$password1)
            {
            $user = User::findOrFail($request->id);
            Session()->flash('bledne_haslo','Podane chasla ruznią się');
                return view ('wypisz_pojedynczy')->with('user', $user);
            }
            else
            {
                DB::table('users')->where('id', $request->id)->update(
                    [
                    'email' => $request->email,
                    'password'=>Hash::make($request['password']),
                    'isActiv'=>$request->isActiv,
                    'permission'=>$request->permission,
                    'created_at'=>$request->created_at,
                    'updated_at'=>$request->updated_at
                    ]
                );
            }
            return view ('t');
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
