<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //
    public function welcome()
    {

        $list_of_labum = DB::table('album')->get();
        if(count($list_of_labum)>0)
        {
            return view('welcome',['list_of_labum' => $list_of_labum]);
        }
        else return view('welcome');
    }


}
