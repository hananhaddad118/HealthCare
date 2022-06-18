<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        return view('layouts.app');
    } 
    public function doctorHome()
    {
        $conut_paient = User::where('doctor_id',auth()->user()->id)->count();   
        $paients = User::where('doctor_id',auth()->user()->id)->pluck('id')->toArray();
        return view('layouts.doctor1',compact('conut_paient','paients'));
    } 
    public function doctorHomee()
    {
        $users = User::all();   
        $paients = User::where('doctor_id',auth()->user()->id)->pluck('id')->toArray();
        return view('dashboard.doctor.all_patients',compact('users','paients'));
    } 
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('layouts.admin');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function patienHome()
    {
        return view('layouts.patient');
    }

}
