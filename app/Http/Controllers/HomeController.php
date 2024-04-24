<?php

namespace App\Http\Controllers;

// use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function get(){
        if(session()->has('role')){
            $role = session('role');
            
            // if($role==1){
            //     $registrations = Registration::where('is_deleted', 0)->get(['id']);
            // }
            // else if($role==2){
            //     $registrations = Registration::where('is_deleted', 0)->where('event_id', $eventid)->get(['id']);
            // }
            
            // $num_registrations = count($registrations);
            return view('home');
        }
    }
}
