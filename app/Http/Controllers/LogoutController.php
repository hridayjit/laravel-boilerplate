<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
    public function logout(Request $request){
        session()->flush();
        //$user_id=session('user_id');
        //var_dump(session('user_id'));
        //var_dump($request->session()->get('user_id'));
        return redirect('/');
    }
}
