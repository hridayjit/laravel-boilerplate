<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class DeleteController extends Controller
{
    //
    public function delete(Request $request){
        $id = $request->query('id');
        $table = $request->query('table');
        $redirect = $request->query('redirect');

        $result = DB::table($table)
        ->where('id', $id)
        ->update([
            'is_deleted' => 1
        ]);

        return redirect($redirect);

        //var_dump($result);
    }
}
