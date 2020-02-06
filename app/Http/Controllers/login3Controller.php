<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Services\Business\SecurityService;
use Illuminate\Validation\ValidationException;
use Exception;

class Login3Controller extends Controller
{
    public function onLogin3(Request $request) 
    {
        try
        {
          $this->validationForm($request);  
        
            
        
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
    catch(ValidationException $e1)
    {
        throw $e1;
    }
    catch(Exception $e2)
    {
        return view("systemException");
    }
    }
    


    
    private function validateForm(Request $request)
    {
        //BEST PRACTICE: Centralize your rules so you have a consistent architecture and even reuse rules
        //BAD PRACTICE: not using a defined data validation framework, putting rules all over your code
        //Setup data validation rules for login form
        $rules = ['username' => 'Required | Between:4,10 | Alpha',
                  'password' => 'Required | Between:4,10'];
        
        //Run data validation
        $this->validate($request, $rules);
                 
    }
}
