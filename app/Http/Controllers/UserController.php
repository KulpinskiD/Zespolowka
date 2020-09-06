<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Name;
use App\Section;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        if(auth()->user()->permission>=3)
        {
            $user = User::latest()->get();
            return view('wypisywanie')->with('user', $user);
        }
        else
        {

            Session()->flash('permission_erorr ','masz za małe uprawnienia');
            return view ('home');
        }
    }
    public function edit($id)
    {
        if(auth()->user()->permission>=3)
        {
            $sections = Name::pluck('name');
            $user = User::findOrFail($id);
            return view('wypisz_pojedynczy',compact('user','sections'));
        }
        else
        {

            Session()->flash('permission_erorr ','masz za małe uprawnienia');
            return view ('home');
        }
        
    }
    public function create()
    {
        //if(auth()->user()->permission>=3)
        //{
        $sections = Name::pluck('name');
        return view ('create')->with('section', $sections);
        /*}
        else
        {

            Session()->flash('permission_erorr ','masz za małe uprawnienia');
            return view ('home');
        }*/
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
                $number_section= $request['section'];
                $number_section++;
                    DB::table('sections')->where('id_users', $request->id)->update(
                    [
                    'id_section' => $number_section,
                ]);
                $user = User::latest()->get();
                return view('wypisywanie')->with('user', $user);
        }
        else
        {
            $password=$request->password;
            $password1=$request->password1;
            if($password!=$password1)
            {
            $user = User::findOrFail($request->id);
            $sections = Name::pluck('name');
            Session()->flash('bledne_haslo','Podane chasla ruznią się');
            return view('wypisz_pojedynczy',compact('user','sections'));
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
                $number_section= $request['section'];
                $number_section++;
                DB::table('sections')->where('id_users', $request->id)->update(
                    [
                    'id_section' => $number_section
                ]);
            }
            $user = User::latest()->get();
            return view('wypisywanie')->with('user', $user);
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
            $sections = Name::pluck('name');
            $password=$request->password;
            $password1=$request->password1;

            if($password==$password1)
            {
                
                User::create([
                    'isActiv' => $request['isActiv'],
                    'permission' => $request['permission'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                ]);
                $user = User::latest()->get();
                $ostatnie_id=$user[0];
                $test=$ostatnie_id->id;
                $number_section= $request['section'];
                $number_section++;
                Section::create([
                    'id_section' => $number_section,
                    'id_users' => $test,
                ]);
                return view ('create')->with('section', $sections); 
            }
            else
            {
                Session()->flash('bledne_haslo','Podane chasla ruznią się');
                return view ('create');
            }
        
    }
}
