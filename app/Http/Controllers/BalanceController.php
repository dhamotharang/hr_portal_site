<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\employee_balance;


class BalanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Add new Balance
    public function create_balance($id)
    {
        return view('employee_balance_pages.create', compact('id'));
    }



    //edit balance
    public function edit_employee_balance($id)
    {
        $balance = employee_balance::find($id);
        return view('employee_balance_pages.edit' , compact('balance'));
    }


    //update balance
    public function update_employee_balance(Request $request , $id)
    {


        $balance = employee_balance::find($id);

        $balance->annual_leave = $request->annual_leave;
        $balance->sick_leave = $request->sick_leave;

        $balance->save();

        return redirect('/employees_balance/search_balance')->with('status' , 'Balance was updated Successfully !');

    }

    public function user_index()
    {
        
        $all_users = DB::table('users')->select('id','name' , 'email' , 'mobile' , 'Djv_Group' , 'Djv_Access' , 'title','user_pp','employee_code')->orderBy('ID')->get();
        // $all_users = User::orderBy('id' , 'desc')->paginate(5);
        $count = $all_users->count();
        return view('employee_balance_pages.index' , compact('all_users' , 'count'));
    }

        //store user Page
        public function search(Request $request)
        {
            $emp_name = $request->name;
            $emp_email =$request->email;
            $emp_mobile = $request->mobile;
            $emp_group = $request->emp_group;
            $emp_code = $request->employee_code;
            $dataarr = array(
                'name' => $emp_name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'Djv_Group' => $request->emp_group,
                'employee_code' =>$request->employee_code,
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
           return view('employee_balance_pages.index' , compact('all_users' , 'count'));
    
            //return redirect('/home')->with('status' , 'User Added Successfully !');
    
        }


    public function store_balance(Request $request,$id)
    {
        $balance = new employee_balance();
    
        $balance->annual_leave = $request->annual_leave;
        $balance->sick_leave = $request->sick_leave;
        $balance->emp_id = $id;


        $balance->save();

        return redirect('/employees_balance/'.$id.'')->with('status' , 'Balance was add Successfully !');
    }

    public function show_employee_balance($id)
    {

        $user = User::find($id);

        $all_emp_balances = employee_balance::where('emp_id' ,'=', $id)->orderBy('id')->paginate(4);
        //$all_emp_balances = User::orderBy('id' , 'desc')->paginate(5);
        $count = $all_emp_balances->count();
        return view('employee_balance_pages.show' , compact('user' , 'count' , 'all_emp_balances'));

    }

    public function destroy_employee_balance($user_id , $id)
    {

        DB::table('employee_balances')->where('id', '=', $id)->delete();

        return redirect('/employees_balance/'.$user_id.'')->with('status' , 'Balance was deleted Successfully !');

        
    }



    //show form upload
   public function showForm()
   {
    return view('employee_balance_pages.upload_file');
   }

   //store upload file

   public function storeData(Request $request)
   {
    
    if( $request->file('upload_file')) {

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
        $data = array_combine($escapedHeader , $columns);


        $emp_code = $data['code'];
        $annual_leave = $data['annualleave'];
        $sick_leave =$data['sickleave'];

        $emp_id = DB::table('users')->select('id')->where('employee_code', '=', $emp_code)->value('id');
        $check_user_count = DB::table('users')->where('employee_code', $emp_code)->count();

        if($check_user_count > 0)
        {
            $check_user_balance_count = DB::table('employee_balances')->where('emp_id', $emp_id)->count();

            if($check_user_balance_count > 0)
            {
                DB::table('employee_balances')->where('emp_id', $emp_id)->update(
                    ['annual_leave'=> $annual_leave ,
                    'sick_leave'=> $sick_leave,
                    'emp_id'=> $emp_id ,
                    ]
                );

            }else
            {
                $uploaded_emp_balance = new employee_balance();
        
                $uploaded_emp_balance->annual_leave = $annual_leave;
                $uploaded_emp_balance->sick_leave = $sick_leave;
                $uploaded_emp_balance->emp_id = $emp_id;
                $uploaded_emp_balance->save();
            }

        }
        else{
            return redirect('/employees_balance/search_balance')->with('status' , 'may one or more employee code not valid try again please!');
        }
       }
       return redirect('/employees_balance/search_balance')->with('status' , 'Employees balance file uploaded Successfully !');
    }else
    {
        return redirect()->back()->with('status' , 'No File Selected !');
    }
   }
}
