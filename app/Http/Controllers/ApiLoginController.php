<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{
    public function my_first_api(Request $request)
    {

        $password=$request->pass;
        $email=$request->email;
        $username=$request->username;

        if (!empty($request->all())) 
        { 
            if (empty($username))
            { 
                $response["success"] = 0; 
                $response["message"] = "username field is empty ."; 
                $username=" "; 
 
            }
            if (empty($password))
            { 
                $response["success"] = 0; 
                $response["message"] = "Password field is empty ."; 
                 $password=" "; 
            }
            $Hashedpass = '';
            
            $credentials = [
                'username' => $request['username'],
                'password' => $request['pass'],
            ];
            if (Auth::attempt($credentials)) 
                {
                    $user = auth()->user();
                    $response["success"] = 1; 
                    $response["message"] = "You have been sucessfully login";
                    $response["username"] = $username; 
                    $response["password"] = $password;
                }else{
                    $response["success"] = 0; 
                    $response["message"] = "invalid username or password ";
                    $response["username"] = $username; 
                    $response["password"] = $password;
                }
        }else{ 
            $response["success"] = 0; 
            $response["message"] = " One or both of the fields are empty ";
            $response["username"] = $username; 
            $response["password"] = $password;
        }
        return json_encode($response);
     }
}
