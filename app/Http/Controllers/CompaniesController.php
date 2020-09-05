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
        $companyes = Company::latest()->get();
    	return view('Wypisz_firmy')->with('companyes', $companyes);
    }
    public function create()
    {
        if(auth()->user()->permission>=3)
        {
        return view ('create_company');
        }
        else
        {

            Session()->flash('permission_erorr ','masz za małe uprawnienia');
            return view ('welcome');
        }
    }
    public function store(Request $request)
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
    public function edit($id)
    {
        $companyes = Company::findOrFail($id);
    	return view('edit_company')->with('companyes', $companyes);
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
            $companyes = Company::latest()->get();
    	    return view('Wypisz_firmy')->with('companyes', $companyes);
    }

}
