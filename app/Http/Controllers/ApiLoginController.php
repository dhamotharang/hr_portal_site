<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{
    public function my_first_api(Request $request)
    {

        // Check connection
        $password=$request->pass;
        $email=$request->email;
        
        if (!empty($request->all())) 
        { 
            if (empty($email))
            { // Create some data that will be the JSON response 
                $response["success"] = 0; 
                $response["message"] = "E-mail field is empty ."; 
                 $email=" "; 
 
            }
            if (empty($password))
            { // Create some data that will be the JSON response 
                $response["success"] = 0; 
                $response["message"] = "Password field is empty ."; 
                 $password=" "; 
            }
            $Hashedpass = '';    
            if (Auth::attempt(array('email' => $email,'password' => $password))) 
                {
                    $user = auth()->user();
                    $response["success"] = 1; 
                    $response["message"] = "You have been sucessfully login";
                    $response["email"] = $email; 
                    $response["password"] = $password;
                }else{
                    $response["success"] = 0; 
                    $response["message"] = "invalid email or password ";
                    $response["email"] = $email; 
                    $response["password"] = $password;
                }
        }else{ 
            $response["success"] = 0; 
            $response["message"] = " One or both of the fields are empty ";
            $response["email"] = $email; 
            $response["password"] = $password;
        }
        return json_encode($response);
     }
}
