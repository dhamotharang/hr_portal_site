<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\complain;
class ApiController extends Controller
{

    //login user-----------//
    public function user_login(Request $request)
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
    //---------------------//

    public function get_user_data(Request $request){
                // Create connection
        $con=mysqli_connect("localhost","root","","djv_hr1");
        
        // Check connection
        if (mysqli_connect_errno())
        {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        else
        {
           // echo "Connect To DB Successfully! <br>";
        }
            $Hashedpass = '';    
            $email = $request->email;
            $password = $request->pass;
            $username = $request->username;

            if (Auth::attempt(array(
                'username' => $username,
                'password' => $password
                    ))) 
                    {
                
                $user = auth()->user();
                $Hashedpass = $user->getAuthPassword();
            } 
            $sql = "SELECT * FROM users where username ='$username' and password= '$Hashedpass'";
            // Confirm there are results
            $result = mysqli_query($con, $sql);
            if ($result->num_rows > 0)
            {
            $resultArray = array();
            $tempUsersArray = array();
            $user_balance_array = array();
            $user_notes_array = array();
            $user_general_notes_array = array();

            $result2 = mysqli_query($con, $sql);
            $row_user = mysqli_fetch_assoc($result2);
            $user_id = $row_user['id'];
            $note_check = array();
            // echo $user_id;


            // Loop to fetch users
            while($row = $result->fetch_object())
            {
            // Add each result into the results array
                $tempUsersArray = $row;
                array_push($resultArray, $tempUsersArray);
            }

            //user_balance_query
            $sql_user_balance = "SELECT * FROM employee_balances where emp_id ='$user_id'";
            if ($result_balance = mysqli_query($con, $sql_user_balance))
            {
            $tempUsersBalanceArray = array();

                // Loop to fetch users balance
                while($row_user_balance = $result_balance->fetch_object())
                {
                // Add each result into the results array
                    $tempUsersBalanceArray = $row_user_balance;  
                    array_push($user_balance_array, $tempUsersBalanceArray);
                }

                if(!empty($user_balance_array))
                {
                    array_push($resultArray, $user_balance_array);

                }
                else
                {
                    $user_balance_array=array(['annual_leave'=>'null' , 'sick_leave'=>'null']);

                    array_push($resultArray, $user_balance_array);
                }
        
            }
            //user_hr_notification_query
            $sql_user_note = "SELECT * FROM employee_notes where emp_id ='$user_id'";
            if ($result_notes = mysqli_query($con, $sql_user_note))
            {
            $tempUsersNotesArray = array();

                // Loop to fetch users balance
                while($row_user_note = $result_notes->fetch_object())
                {
                    // Add each result into the results array
                    $row_user_note->user_notes = 'Notnull';
                    $tempUsersNotesArray = $row_user_note;
                    array_push($user_notes_array, $tempUsersNotesArray);
                }

                if(!empty($user_notes_array))
                {
                    array_push($resultArray, $user_notes_array);
                }
                else
                {
                    $user_notes_array=array(['user_notes'=> 'null']);
                    array_push($resultArray, $user_notes_array);
                }

            }

            
            //user_general_notification_query
            $sql_user_g_note = "SELECT * FROM general_notes order by id desc  limit 2";
            if ($result_g_notes = mysqli_query($con, $sql_user_g_note))
            {
            $tempUsersGeneralNotesArray = array();

                // Loop to fetch users balance
                while($row_user_g_note = $result_g_notes->fetch_object())
                {
                // Add each result into the results array
                    $tempUsersGeneralNotesArray = $row_user_g_note;
                    array_push($user_general_notes_array, $tempUsersGeneralNotesArray);
                }

                if(!empty($user_general_notes_array))
                {
                    array_push($resultArray, $user_general_notes_array);
                }
                else
                {
                    $user_general_notes_array=['user_general_notes' , 'null'];
                    array_push($resultArray, $user_general_notes_array);
                }
            }

            //print json results 
            $json = json_encode($resultArray);
            $json_user = json_encode($resultArray[0]);
            $json_user_balance = json_encode($resultArray[1]);
            $json_user_hr_notes = json_encode($resultArray[2]);
            $json_user_general_notes = '';
            if(!empty($resultArray[3]))
            {
                $json_user_general_notes = json_encode($resultArray[3]);
            }
            echo $json;
            }
    }


    public function user_complain(Request $request)
    {
        $complain_request=$request->complain;
        $complain = new complain();
        $complain->content = $complain_request;
        if($complain->save())
        {
            $response["message"] = "success"; 
        }else{
            $response["message"] = "faild";
        }

        return json_encode($response);
    }
}
?>