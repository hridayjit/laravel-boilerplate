<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function getroles(){
       
        if(session('role')==1) {
            $roles = Role::get();
        }
        else if(session('role')==2) {
            $roles = Role::where('id', '>', 2)->get();
        }
        else if(session('role')==3) {
            $roles = Role::where('id', '>', 2)->get();
        }

        $jsonArray=array();
        foreach ($roles as $role) {
            # code...
            $row['id']=$role->id;
            $row['name']=$role->name;

            $jsonArray[]=$row;
        }
        echo json_encode($jsonArray, JSON_UNESCAPED_SLASHES);
    }
}
