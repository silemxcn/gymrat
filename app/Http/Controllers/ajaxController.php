<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ajaxController extends Controller

{


    public function ajaxRequest()

    {

        return view('ajaxRequest');

    }


    public function ajaxRequestPost()

    {

        $input = request()->all();


        return response()->json(['success'=>$input]);

    }

}