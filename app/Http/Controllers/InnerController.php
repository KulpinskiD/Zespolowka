<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Name;

class InnerController extends Controller
{
    public function chcek_setions()
    {
        if(auth()->user()->permission>=1)
        {
        $name_sections = Name::latest()->get();
        return view ('select_section')->with('name_sections', $name_sections);
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
}
