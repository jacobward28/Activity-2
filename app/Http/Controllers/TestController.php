<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //create function to return a string from a controller
    public function test() {
        return "Hello World from my controller";
    }
    //create a function to return a view from a controller
    public function test2(){
        return view('helloworld');
    }
}
