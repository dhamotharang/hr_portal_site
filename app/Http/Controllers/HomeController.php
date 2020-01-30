<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\employee_note;
use App\employee_balance;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth_user_annual_leave = DB::table('employee_balances')->where('emp_id', '=', auth()->user()->id)->latest()->value('annual_leave'); // considers created_at field by default.
        $auth_user_sick_leave = DB::table('employee_balances')->where('emp_id', '=', auth()->user()->id)->latest()->value('sick_leave'); // considers created_at field by default.

        // $auth_user_note1 = DB::table('employee_notes')->where('emp_id', '=', auth()->user()->id)->latest()->value('note_text1'); // considers created_at field by default.
        // $auth_user_note2 = DB::table('employee_notes')->where('emp_id', '=', auth()->user()->id)->latest()->value('note_text2'); // considers created_at field by default.        $auth_user_annual_leave = DB::table('employee_balances')->where('emp_id', '=', auth()->user()->id)->latest()->value('annual_leave'); // considers created_at field by default.
        // $auth_user_note_img1 = DB::table('employee_notes')->where('emp_id', '=', auth()->user()->id)->latest()->value('note_image1'); // considers created_at field by default.
        // $auth_user_note_img2 = DB::table('employee_notes')->where('emp_id', '=', auth()->user()->id)->latest()->value('note_image2'); // considers created_at field by default.
       
        $last_notes = DB::table('general_notes')->latest()->take(2)->get();
        $count_of_Gnotes = $last_notes->count();
        if($count_of_Gnotes == 0)
        {
            $last_notes = 'no any  General Notification yet'; 
        }
        if($count_of_Gnotes <= 2)
        {
            $last_notes = DB::table('general_notes')->latest()->take($count_of_Gnotes)->get();
        }

        //-------------------------------
        $last_hr_notes = DB::table('employee_notes')->where('emp_id', '=', auth()->user()->id)->latest()->take(1)->get();
        $count_of_Enotes = $last_hr_notes->count();
        if($count_of_Enotes == 0)
        {
            $last_hr_notes = 'no any  Hr Notification for you yet'; 
        }
        if($count_of_Enotes <= 1)
        {
            $last_hr_notes = DB::table('employee_notes')->where('emp_id', '=', auth()->user()->id)->latest()->take($count_of_Enotes)->get();
        }
        //-------------------------------

        if($auth_user_annual_leave == null)
        {
            $auth_user_annual_leave = 'no annual leave for you yet now';
        }

        if($auth_user_sick_leave == null)
        {
            $auth_user_sick_leave = 'no sick leave for you yet now';
        }

        // if($auth_user_note1 == null)
        // {
        //     $auth_user_note1 = 'no Hr Notification for you yet now';
        // }

        // if($auth_user_note2 == null)
        // {
        //     $auth_user_note2 = 'no Hr Notification for you yet now';
        // }

        // if($auth_user_note_img1 == null)
        // {
        //     $auth_user_note_img1 = 'NoImage.png';
        // }

        // if($auth_user_note_img2 == null)
        // {
        //     $auth_user_note_img2 = 'NoImage.png';
        // }

        return view('home' , compact('auth_user_annual_leave' , 'auth_user_sick_leave'  , 'auth_user_note2' , 'auth_user_note_img1' , 'auth_user_note_img2' , 'last_notes' , 'last_hr_notes'));
    }
}
