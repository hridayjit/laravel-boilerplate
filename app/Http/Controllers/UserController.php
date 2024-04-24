<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Users;
use App\Models\Role;
use App\Models\Event;

class UserController extends Controller
{
    public function get(Request $request){
        //var_dump($request->input('id'));
        if($request->filled('id') && $request->input('id')!=null && $request->input('id')!='' && $request->input('id')!=0){
            // $users = DB::table('user_master')->where('is_deleted', 0)->where('id', $request->input('id'))->get();
            $users = Users::where('is_deleted', 0)->where('id', $request->input('id'))->get();
        }
        else{
            if(session('role')==1){
                // $users = DB::table('user_master')->where('is_deleted', 0)->get();
                $users = Users::where('is_deleted', 0)->get();
            }
            else if(session('role')==2){
                $users = Users::where('is_deleted', 0)->where('role_id', '>', 1)->get();
            }
            else{
                $users = Users::where('is_deleted', 0)->where('id', session('user_id'))->get();
            }
        }
        
        $jsonArray=array();
        if(count($users)>0){
            foreach ($users as $user) {
                # code...
                $row['id']=$user->id;
                $row['role_id']=$user->role_id;
                $role_name=Role::where('id', $user->role_id)->get('name');
                
                $row['role_name']=$role_name[0]->name;
                
                $row['name']=$user->name;
                $row['phone']=$user->phone;
                $row['email']=$user->email;
                $jsonArray[]=$row;
            }
        }
        // var_dump($jsonArray);
        echo json_encode($jsonArray, JSON_UNESCAPED_SLASHES);
    }

    public function update(Request $request){
        $id = $request->input('current_id');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $roleid = $request->input('roleid');
        if($request->input('email')==null || $request->input('email')==''){
            $email='';
        }
        else{
            $email=$request->input('email');
        }
        if($request->input('pwd')==null || $request->input('pwd')==''){
            $pwd='';
        }
        else{
            $pwd = $request->input('pwd');
        }

        $srchsql = Users::where('is_deleted', 0)->where('id', '!=', $id)->where('phone', $phone)->get('id');
        if(count($srchsql)>0){
            echo 2;//already registered
        }
        else{
            if($pwd==''){
                // $arr = ['name'=>$name, 'role_id'=>$roleid, 'event_id'=>$eventid, 'phone'=>$phone, 'email'=>$email, 'updated_on'=>date('Y-m-d H:i:s')];
                $arr = [
                    'name' => $name,
                    'role_id' => $roleid,
                    'phone' => $phone,
                    'email' => $email,
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                
                $upd1 = Users::where('id', $id)->update($arr);
            }
            else {
                $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
                $password_hash=hash('sha256', $pwd . $salt);
                for($round = 0; $round < 65536; $round++)
                {
                    $password_hash = hash('sha256', $password_hash . $salt);
                }
                $arr = ['name'=>$name, 'role_id'=>$roleid, 'phone'=>$phone, 'email'=>$email, 'password'=>$password_hash, 'salt'=>$salt, 'updated_at'=>date('Y-m-d H:i:s')];
                $upd2 = Users::where('id', $id)->update($arr);
            }
            echo 1;
        }
    }

    public function create(Request $request){
        if($request->filled('name') && $request->filled('roleid') && $request->filled('phone') && $request->filled('password')){
            $name = $request->input('name');
            $phone = $request->input('phone');
            $pwd = $request->input('password');
            $roleid = $request->input('roleid');
            
            if($request->filled('email')){
                $email = $request->input('email');
            }
            else{
                $email = '';
            }
            
            //var_dump($name, $phone, $pwd, $roleid, $eventid, $email);
            // $srchsql="SELECT id FROM user_master WHERE phone=? AND is_deleted=0";
            // $sql="INSERT INTO user_master (`name`, phone, email, role_id, event_id, `password`, salt, created_on, updated_on) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $srchsql = Users::where('is_deleted', 0)->where('phone', $phone)->get(['id']);
            if(count($srchsql)){
                $param = 3;
                return redirect('/user')->with('param', $param);
            }
            else{
                $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
                $password_hash=hash('sha256', $pwd . $salt);
                for($round = 0; $round < 65536; $round++)
                {
                    $password_hash = hash('sha256', $password_hash . $salt);
                }
                $arr = ['name'=>$name, 'phone'=>$phone, 'email'=>$email, 'role_id'=>$roleid, 'password'=>$password_hash, 'salt'=>$salt, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')];
                $sql = Users::insert($arr);
                $param = 1;
                return redirect('/user')->with('param', $param);
            }
        }
        else{
            $param = 2;
            return redirect('/user')->with('param', $param);
        }
    }
}
