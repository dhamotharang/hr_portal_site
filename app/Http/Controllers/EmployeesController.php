<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class EmployeesController extends Controller
{
    // //index page
    public function index()
    {
        
        $all_users = DB::table('users')->select('id','name' , 'email' , 'mobile' , 'Djv_Group' , 'Djv_Access' , 'title','user_pp')->orderBy('id')->get();
        // $all_users = User::orderBy('id' , 'desc')->paginate(5);
        $count = $all_users->count();
        return view('employee_pages.index' , compact('all_users' , 'count'));
    }
    //store user Page
    public function search(Request $request)
    {
        $emp_name = $request->name;
        $emp_email =$request->email;
        $emp_mobile = $request->mobile;
        $emp_group = $request->emp_group;
        $dataarr = array(
            'name' => $emp_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'Djv_Group' => $request->emp_group,
        );
        $sql = '';
        foreach ($dataarr as $key => $item) {

            if($dataarr[$key]){

                $sql .= $key . ' Like ' . "'%" .$dataarr[$key] .  "%' and";
            }
        }
        $last3char = substr($sql, -3);
        if(strtolower($last3char) == 'and'){
            $sql = substr_replace($sql ,"",-3);
        }
        if($sql != ""){
            $all_users =  DB::select('select * from users where '.$sql.' order by id desc');
        }else{
            $all_users =  DB::select('select * from users order by id desc');
        }
        return view('employee_pages.index' , compact('all_users'));

        //return redirect('/home')->with('status' , 'User Added Successfully !');

    }

    public function edit_employee($id)
    {
        $user = User::find($id);
        $all_gNames = DB::select('select * from  djv_groups order by id desc');
        return view('employee_pages.edit' , compact('user' , 'all_gNames'));
    }

    // update user
    public function update_employee(Request $request , $id)
    {
        $user = User::find($id);

        if($request->hasFile('pp'))
        {
            $file = $request->file('pp');
            $ext = $file->getClientOriginalExtension();
            $file_name = 'pp' . '_' . time() . '.' . $ext ;
            $file->storeAs('public/EmployeeProfileImages' , $file_name);
            //dd($path1);
        }
        else
        {
            $file_name = $user->user_pp;
        }

        DB::table('users')->where('id', $id)->update(
            ['name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'Djv_Group' => $request->emp_group,
            'user_pp' => $file_name, ]
        );

        // $user->execute();

        return redirect('/home')->with('status' , 'Employee is updated Successfully !');

    }


    public function destroy_employee($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();

        
        return redirect('/employees')->with('status' , 'Employee was deleted Successfully !');
        
    }
    
   //show form upload
   public function showForm()
   {
    return view('employee_pages.upload_file');
   }

   //store upload file
   
   public function storeData(Request $request)
   {
       //get file
       $upload =$request->file('upload_file');
       $filePath = $upload->getRealPath();

       //open and read
       $file = fopen($filePath , 'r');
       $hrader = fgetcsv($file);

       $escapedHeader = [];

       //validate
       foreach ($hrader as $key => $value) 
       {
           $lheader = strtolower($value);
           $escapedItem = preg_replace('/[^a-z]/' , '' , $lheader);
           array_push($escapedHeader , $escapedItem);
       }

       //dd($escapedHeader);

       //loading other columns
       while($columns=fgetcsv($file))
       {
           if($columns[0] == "")
           {
               continue;
           }

           //trim data

        // foreach ($columns as $key => &$value) 
        // {
        //    $value = preg_replace('/\D/' , '' , $value);

        // }

        $data = array_combine($escapedHeader , $columns);

        $emp_name = $data['name'];
        $emp_email = $data['email'];
        //Hash::make($data['password'])
        $emp_password = Hash::make($data['password']);
        $emp_mobile = $data['mobile'];
        $emp_g = $data['group'];
        $emp_access = $data['access'];
        $emp_title = $data['title'];

      //dd($data);

        $uploaded_emp = new User();
    
        $uploaded_emp->name = $emp_name;
        $uploaded_emp->email = $emp_email;
        $uploaded_emp->password = $emp_password;
        $uploaded_emp->mobile = $emp_mobile;
        $uploaded_emp->Djv_Group = $emp_g;
        $uploaded_emp->Djv_Access = $emp_access;
        $uploaded_emp->title = $emp_title;

        
        $check_user = DB::table('users')->where('email', $emp_email)->get();
        $check_user_count = DB::table('users')->where('email', $emp_email)->count();

        //dd($check_user_count);

        if($check_user_count > 0)
        {
            DB::table('users')->where('email', $emp_email)->update(
                ['name'=> $emp_name ,
                'email'=> $emp_email,
                'password'=> $emp_password ,
                'mobile'=> $emp_mobile ,
                'Djv_Group'=> $emp_g,
                'Djv_Access'=> $emp_access,
                'title'=> $emp_title
                ]
            );
        }

        else
        {
            $uploaded_emp->save();
        }


       }
       return redirect('/employees')->with('status' , 'Employees file uploaded Successfully !');

   }

   public function showProfile()
   {
    return view('employee_pages.profile');
   }
}
