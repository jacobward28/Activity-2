<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Services\Business\SecurityService;

class Login2Controller extends Controller
{
    public function onLogin2(Request $request) 
    {
        //Get teh posted Form Data
        $username = $request->input('username');
        $password = $request->input('password');
        
        // Save posted Form Data in User Object Model
        $user = new userModel(-1, $username, $password);
        
        //call Security Business Service
        $service = new SecurityService();
        $status = $service->login($user);
        
        //render a failed or success response view and pass the User Model to it
        if($status)
        {
            $data = ['model' => $user];
            return view('loginPassed2')->with($data);
        }
        else 
        {
            return view('loginFailed2');
        }
    }
}
