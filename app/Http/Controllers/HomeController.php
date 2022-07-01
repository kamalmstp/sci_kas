<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sarana;

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
        if (auth()->user()->is_admin === 1) {
            return view('administrator.dashboard');
        }else if(auth()->user()->is_admin === 0){
            $sarana = Sarana::all();
            return view('driver.dashboard', compact('sarana'));
        }
    }
}
