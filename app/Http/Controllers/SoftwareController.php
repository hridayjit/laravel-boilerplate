<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Software;

class SoftwareController extends Controller
{
    //
    public function get(Request $request) {
        if($request->filled('id') && $request->input('id')!=null && $request->input('id')!='' && $request->input('id')!=0) {
            $softwares = Software::where('id', $request->input('id'))->get();
        }
        else{
            $softwares = Software::get();
        }

        $jsonArray=array();
        if(count($softwares)>0){
            foreach ($softwares as $software) {
                # code...
                $row['id']=$software->id;
                $row['client_name']=$software->client_name;
                $row['project_name']=$software->project_name;
                $row['project_logo']=$software->project_logo;
                $row['software_version']=$software->software_version;
                $row['client_logo']=$software->client_logo;
                $jsonArray[]=$row;
            }
        }
        // var_dump($jsonArray);
        echo json_encode($jsonArray, JSON_UNESCAPED_SLASHES);
    }

    public function update(Request $request){
        $id = $request->input('current_id');
        $clientname = $request->input('clientname');
        $projectname = $request->input('projectname');
        $softwareversion = $request->input('softwareversion');

        $arr = ['client_name'=>$clientname, 'project_name'=>$projectname, 'software_version'=>$softwareversion];
        $upd = Software::where('id', $id)->update($arr);
            
        echo 1;
        
    }
}
