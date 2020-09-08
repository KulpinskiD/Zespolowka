<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Name;
use App\Section;
use Auth;
use App\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users_auth = auth()->user();
        $uprawnienia=Permission::where('id_user', $users_auth->id)->get();
        $permisions = collect();
        foreach($uprawnienia as $uprawnienie)
        {
            $permisions->add($uprawnienie->permissions);
        }
        foreach($permisions as $permision)
        {
        if($permision=="Super user")
        {
            $users = User::latest()->get();
            $permisions_user = Permission::latest()->get();
            return view('wypisywanie',compact('permisions_user','users'));
        }
        }
        
        
            Session()->flash('permission_erorr ','masz za małe uprawnienia');
            return view('home')->with('permisions', $permisions);
        
    }
    public function edit($id)
    {
        $users_auth = auth()->user();
        $uprawnienia=Permission::where('id_user', $users_auth->id)->get();
        $permisions = collect();
        foreach($uprawnienia as $uprawnienie)
        {
            $permisions->add($uprawnienie->permissions);
        }
        foreach($permisions as $permision)
        {
        if($permision=="Super user")
        {
            $sections = Name::pluck('name');
            $user = User::findOrFail($id);
            return view('wypisz_pojedynczy',compact('user','sections'));
        }
        }
        Session()->flash('permission_erorr ','masz za małe uprawnienia');
        return view('home')->with('permisions', $permisions);
        
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
                DB::table('permissions')->where('id_user', $request->id)->delete();
                foreach($request->permission_ as $permission)
                {
                    Permission::create([
                        'id_user' => $request->id,
                        'permissions' => $permission,
                    ]);
                }
                $users = User::latest()->get();
                $permisions_user = Permission::latest()->get();
                return view('wypisywanie',compact('permisions_user','users'));
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
                DB::table('permissions')->where('id_user', $request->id)->delete();
                foreach($request->permission_ as $permission)
                {
                    Permission::create([
                        'id_user' => $request->id,
                        'permissions' => $permission,
                    ]);
                }
                
            }
            $users = User::latest()->get();
                $permisions_user = Permission::latest()->get();
                return view('wypisywanie',compact('permisions_user','users'));
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
                foreach($request->permission_ as $permission)
                {
                Permission::create([
                    'id_user' => $test,
                    'permissions' => $permission,
                ]);
                }
                return view ('create')->with('section', $sections); 
            }
            else
            {
                Session()->flash('bledne_haslo','Podane chasla ruznią się');
                return view ('create');
            }
        
    }
}
