<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Outer;
use App\Name;
use App\Company;
use Illuminate\Support\Facades\DB;


class WritingsController extends Controller
{
    public function index()
        {
            if(auth()->user()->permission>=1)
            { 
                $permisin=auth()->user()->permission;
                $name_company=Name::latest()->get();
                $writings = Outer::latest()->get();
                return view('wypisz_pisma_zewneczne',compact('name_company','writings','permisin'));
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
            $companyes = Company::pluck('name');
            $writing = Outer::findOrFail($id);
            return view('Wypisz_pojedyncze_pismo_zewneczne',compact('companyes','writing'));
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
        $companyes = Company::pluck('name');
        return view ('create_writings')->with('companyes', $companyes);
        }
        else
        {

            Session()->flash('permission_erorr ','masz za małe uprawnienia');
            return view ('home');
        }
    }
    public function store(Request $request)
    {
        $user=auth()->user();
        Outer::create([
                'title' => $request['title'],
                'description' => $request['description'],
                'from' => $user->id,
                'number_of_facture' => $request['number_of_facture'],
                'id_companies'=>$request['Company_list']
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
                'number_of_facture'=>$request->number_of_facture,
                ]


            
            );
            $permisin=auth()->user()->permission;
                $name_company=Name::latest()->get();
                $writings = Outer::latest()->get();
                return view('wypisz_pisma_zewneczne',compact('name_company','writings','permisin'));
        
    }
        
    
}
