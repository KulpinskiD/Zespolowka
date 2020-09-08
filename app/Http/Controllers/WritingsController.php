<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Outer;
use App\Name;
use App\Company;
use App\Permission;
use Illuminate\Support\Facades\DB;


class WritingsController extends Controller
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
        if($permision=="Super user" or $permision=="Wychodzące zapis" or $permision=="Wychodzące odczyt")
        {
                $name_company=Company::latest()->get();
                $writings = Outer::latest()->get();
                return view('wypisz_pisma_zewneczne',compact('name_company','writings','permisions'));
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
        if($permision=="Super user" or $permision=="Wychodzące zapis")
        {
            $companyes = Company::pluck('name');
            $writing = Outer::findOrFail($id);
            return view('Wypisz_pojedyncze_pismo_zewneczne',compact('companyes','writing'));
        }
        }
 
            Session()->flash('permission_erorr ','masz za małe uprawnienia');
            return view('home')->with('permisions', $permisions);
        
        
    }
    public function preview($id)
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
        if($permision=="Super user" or $permision=="Wychodzące zapis" or $permision=="Wychodzące odczyt")
        {
            $companyes = Company::latest()->get();
            $writing = Outer::findOrFail($id);
            return view('Podglad_pism_wychodzacych',compact('companyes','writing'));
        }
        }
 
            Session()->flash('permission_erorr ','masz za małe uprawnienia');
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
        if($permision=="Super user" or $permision=="Wychodzące zapis")
        {
        $companyes = Company::pluck('name');
        return view ('create_writings')->with('companyes', $companyes);
        }
        }
            Session()->flash('permission_erorr ','masz za małe uprawnienia');
            return view('home')->with('permisions', $permisions);
    }
    public function store(Request $request)
    {
        $user=auth()->user();
        $id_company=$request['Company_list'];
        $id_company++;
        Outer::create([
                'title' => $request['title'],
                'description' => $request['description'],
                'from' => $user->id,
                'number_of_facture' => $request['number_of_facture'],
                'id_companies'=>$id_company
            ]);
            $companyes = Company::pluck('name');
            return view ('create_writings')->with('companyes', $companyes);       


    }
    public function update(Request $request)
    {
        $user=auth()->user()->id;
        $Company_list=$request->Company_list;
        $Company_list++;
            DB::table('outers')->where('id', $request->id)->update(
                [
                'id_companies' => $Company_list,
                'title'=>$request->title,
                'description'=>$request->description,
                'from'=>$user,
                'updated_at'=>$request->updated_at,
                'number_of_facture'=>$request->number_of_facture,
                ]


            
            );
            $users_auth = auth()->user();
            $uprawnienia=Permission::where('id_user', $users_auth->id)->get();
            $permisions = collect();
            foreach($uprawnienia as $uprawnienie)
            {
                $permisions->add($uprawnienie->permissions);
            }
            $name_company=Company::latest()->get();
            $writings = Outer::latest()->get();
            return view('wypisz_pisma_zewneczne',compact('name_company','writings','permisions'));
        
    }
        
    
}
