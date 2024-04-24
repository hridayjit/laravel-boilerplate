<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Software;

class LoginController extends Controller
{
    public function login(Request $request){
        //var_dump($request->input('username'));
        $username = $request->input('username');
        $password = $request->input('password');
        
        //$user = DB::select(`SELECT * FROM user_master WHERE is_deleted=0 AND phone=?`, [$username]);
        $user = Users::where('phone', $username)->where('is_deleted', 0)->get();

        $login_ok = false;
        if(count($user)>0){
            $pwd = $user[0]->password;
            $salt = $user[0]->salt;

            $check_password = hash('sha256', $password . $salt); 
            for($round = 0; $round < 65536; $round++){
                $check_password = hash('sha256', $check_password . $salt);
            } 
            if($check_password === $pwd){
                $login_ok = true;
            } 
        }

        if($login_ok){
            $software = Software::get(['project_name', 'project_logo', 'software_version']);
            session(['user_id' => $user[0]->id]);
            session(['user_name' => $user[0]->name]);
            session(['role' => $user[0]->role_id]);
            // session(['event' => $user[0]->event_id]);
            // session(['user_name' => $user[0]->name]);
            if(count($software)>0) {
                session(['software' => $software[0]]);
            }

            return redirect('home');
        }
        else{
            return redirect('/')->with('param', 0);
        }
    }
}
