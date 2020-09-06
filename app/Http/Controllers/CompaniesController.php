<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Company;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    public function index()
    {
        if(auth()->user()->permission>=1)
        {
            $permission=auth()->user()->permission;
            $companyes = Company::latest()->get();
            return view('Wypisz_firmy',compact('companyes', 'permission'));
            //return view('Wypisz_firmy')->with('companyes', $companyes);
        }
        else
        {

            Session()->flash('permission_erorr ','masz za małe uprawnienia');
            return view ('home');
        }
    }
    public function create()
    {
        if(auth()->user()->permission>=2)
        {
        return view ('create_company');
        }
        else
        {

            Session()->flash('permission_erorr ','masz za małe uprawnienia');
            return view ('home');
        }
    }
    public function store(Request $request)
    {
        if(auth()->user()->permission>=2)
        {
            Company::create([
                'name' => $request['name'],
                'nip' => $request['nip'],
                'adress' => $request['adress'],
                'city' => $request['city'],
                'activity' => $request['activity'],
            ]);
            return view ('create_company');  
        }
        else
        {

            Session()->flash('permission_erorr ','masz za małe uprawnienia');
            return view ('home');
        }
                 
    }
    public function edit($id)
    {
        if(auth()->user()->permission>=2)
        {
            $companyes = Company::findOrFail($id);
            return view('edit_company')->with('companyes', $companyes);
        }
        else
        {

            Session()->flash('permission_erorr ','masz za małe uprawnienia');
            return view ('home');
        }
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
