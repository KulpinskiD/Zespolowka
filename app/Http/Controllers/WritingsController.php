<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Writing;
use App\Company;


class WritingsController extends Controller
{
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
            Writing::create([
                'title' => $request['title'],
                'description' => $request['description'],
                'from' => $user->id,
                'number_of_facture' => $request['number_of_facture'],
                'id_companies'=>$request['Company_list']
            ]);
            return view ('create_writings');       


    }
}
