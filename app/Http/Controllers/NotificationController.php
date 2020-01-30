<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\employee_note;
use DB;

class NotificationController extends Controller
{
    public function user_index()
    {
        $all_users = DB::table('users')->select('id','name' , 'email' , 'mobile' , 'Djv_Group' , 'Djv_Access' , 'title','user_pp')->orderBy('id')->get();
        // $all_users = User::orderBy('id' , 'desc')->paginate(5);
        $count = $all_users->count();
        


        return view('employee_note_pages.index' , compact('all_users' , 'count' ));
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
        return view('employee_note_pages.index' , compact('all_users' , 'count'));

        //return redirect('/home')->with('status' , 'User Added Successfully !');

    }

    public function show_employee_notes($id)
    {

        $user = User::find($id);

        $all_emp_notes = employee_note::where('emp_id' ,'=', $id)->orderBy('id')->paginate(4);
        //$all_emp_balances = User::orderBy('id' , 'desc')->paginate(5);
        $count = $all_emp_notes->count();
        return view('employee_note_pages.show' , compact('user' , 'count' , 'all_emp_notes'));

    }

    public function create_note($id)
    {
        return view('employee_note_pages.create', compact('id'));
    }


    public function store_note(Request $request,$id)
    {
        $note = new employee_note();

        if($request->hasFile('img1'))
        {
            $file1 = $request->file('img1');
            $ext1 = $file1->getClientOriginalExtension();
            $file_name1 = 'note_image1' . '_' . time() . '.' . $ext1 ;
            $file1->storeAs('public/EmployeeNotificationImages' , $file_name1);
            //dd($path1);
        }
        else
        {
            $file_name1 = 'NoImage.png';
        }

        if($request->hasFile('img2'))
        {
            $file2 = $request->file('img2');
            $ext2 = $file2->getClientOriginalExtension();
            $file_name2 = 'note_image2' . '_' . time() . '.' . $ext2 ;
            $file2->storeAs('public/EmployeeNotificationImages' , $file_name2);
           // dd($path2);
        }
        else
        {
            $file_name2 = 'NoImage.png';
        }
    
        $note->note_text1 = $request->note1;
        $note->note_text2 = $request->note2;
        $note->note_image1 = $file_name1;
        $note->note_image2 =$file_name2;
        $note->emp_id = $id;


        $note->save();

        return redirect('/employees_notify/'.$id.'')->with('status' , 'Note was add Successfully !');
    }

    public function edit_employee_note($id)
    {
        $note = employee_note::find($id);
        return view('employee_note_pages.edit' , compact('note'));
    }

    public function update_employee_note(Request $request , $id)
    {

        $note = employee_note::find($id);

        
        if($request->hasFile('img1'))
        {
            $file1 = $request->file('img1');
            $ext1 = $file1->getClientOriginalExtension();
            $file_name1 = 'note_image1' . '_' . time() . '.' . $ext1 ;
            $file1->storeAs('public/EmployeeNotificationImages' , $file_name1);
            //dd($path1);
        }
        else
        {
            $file_name1 = $note->note_image1;
        }

        if($request->hasFile('img2'))
        {
            $file2 = $request->file('img2');
            $ext2 = $file2->getClientOriginalExtension();
            $file_name2 = 'note_image2' . '_' . time() . '.' . $ext2 ;
            $file2->storeAs('public/EmployeeNotificationImages' , $file_name2);
           // dd($path2);
        }
        else
        {
            $file_name2 = $note->note_image2;
        }

        $note->note_text1 = $request->note1;
        $note->note_text2 = $request->note2;
        $note->note_image1 = $file_name1;
        $note->note_image2 = $file_name2;

        $note->save();

        return redirect('/employees_notify/search_notification')->with('status' , 'Notification was updated Successfully !');

    }

    public function destroy_employee_note($user_id , $id)
    {

        DB::table('employee_notes')->where('id', '=', $id)->delete();

        return redirect('/employees_notify/'.$user_id.'')->with('status' , 'Notification was deleted Successfully !');

        
    }

        //show form upload
   public function showForm()
   {
    return view('employee_note_pages.upload_file');
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

        //$emp_name = $data['name'];
        $emp_email = $data['email'];
        $note_text1 = $data['fnote'];
        $note_text2 =$data['snote'];

        $emp_id = DB::table('users')->select('id')->where('email', '=', $emp_email)->value('id');


        $uploaded_emp_note = new employee_note();
    
        $uploaded_emp_note->note_text1 = $note_text1;
        $uploaded_emp_note->note_text2 = $note_text2;
        $uploaded_emp_note->emp_id = $emp_id;
        $uploaded_emp_note->save();
        

       }
       return redirect('/employees_notify/search_notification')->with('status' , 'Employees Notification file uploaded Successfully !');

   }
}
