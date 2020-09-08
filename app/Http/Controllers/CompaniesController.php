<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Company;
use App\Permission;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
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
            $permission=auth()->user()->permission;
            $companyes = Company::latest()->get();
            return view('Wypisz_firmy',compact('companyes', 'permission'));
            //return view('Wypisz_firmy')->with('companyes', $companyes);
        }
        }
            return view('home')->with('permisions', $permisions);
        
    }
    public function create()
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
        return view ('create_company');
        }
        }
            Session()->flash('permission_erorr ','masz za małe uprawnienia');
                return view('home')->with('permisions', $permisions);
    }
    public function store(Request $request)
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
            if($request->nip==null)
            {
                Company::create([
                    'name' => $request['name'],
                    'nip' => '',
                    'adress' => $request['adress'],
                    'city' => $request['city'],
                    'activity' => $request['activity'],
                ]);
            }
            else
            {
            Company::create([
                'name' => $request['name'],
                'nip' => $request['nip'],
                'adress' => $request['adress'],
                'city' => $request['city'],
                'activity' => $request['activity'],
            ]);
            }
            return view ('create_company');  
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
            $companyes = Company::findOrFail($id);
            return view('edit_company')->with('companyes', $companyes);
        }
        }

            Session()->flash('permission_erorr ','masz za małe uprawnienia');
            return view('home')->with('permisions', $permisions);
    }
    public function update(Request $request)
    {
            DB::table('companies')->where('id', $request->id)->update(
                [
                'name' => $request->name,
                'nip'=>$request->nip,
                'adress'=>$request->adress,
                'city'=>$request->city,
                'activity'=>$request->activity,
                'created_at'=>$request->created_at,
                'updated_at'=>$request->updated_at
                ]
                
            
            );
            $permission=auth()->user()->permission;
            $companyes = Company::latest()->get();
            return view('Wypisz_firmy',compact('companyes', 'permission'));
    }

}
