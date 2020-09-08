<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Permission;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $uprawnienia=Permission::where('id_user', $user->id)->get();
        $permisions = collect();
        foreach($uprawnienia as $uprawnienie)
        {
            $permisions->add($uprawnienie->permissions);
        }
        return view('home')->with('permisions', $permisions);
    }
}
