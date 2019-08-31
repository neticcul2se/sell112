<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
      function test(Request $request){
        $start=$request->get('start');
        $stop=$start+49;
        echo $stop;



      }
}
