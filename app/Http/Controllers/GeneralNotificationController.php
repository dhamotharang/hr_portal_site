<?php

namespace App\Http\Controllers;
use DB;
use App\general_note;

use Illuminate\Http\Request;

class GeneralNotificationController extends Controller
{
    
    public function index()
    {
        //$all_general_notes = DB::table('general_notes')->select('*')->orderBy('id')->get();
        $all_general_notes = general_note::orderBy('id')->paginate(4);

        // $all_users = User::orderBy('id' , 'desc')->paginate(5);
        $count = $all_general_notes->count();
        


        return view('general_note_pages.index' , compact('all_general_notes' , 'count' ));
    }

    public function create_note()
    {
        return view('general_note_pages.create');

    }


    public function store_note(Request $request)
    {
        $note = new general_note();

        if($request->hasFile('img1'))
        {
            $file1 = $request->file('img1');
            $ext1 = $file1->getClientOriginalExtension();
            $file_name1 = 'general_note_image1' . '_' . time() . '.' . $ext1 ;
            $file1->storeAs('public/GeneralNotificationImages' , $file_name1);
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
            $file_name2 = 'general_note_image2' . '_' . time() . '.' . $ext2 ;
            $file2->storeAs('public/GeneralNotificationImages' , $file_name2);
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


        $note->save();

        return redirect('/generaklNotifications')->with('status' , 'General Note was add Successfully !');
    }

    public function edit_note($id)
    {
        $note = general_note::find($id);
        return view('general_note_pages.edit' , compact('note'));
    }


    public function update_note(Request $request , $id)
    {


        $note = general_note::find($id);

        
        if($request->hasFile('img1'))
        {
            $file1 = $request->file('img1');
            $ext1 = $file1->getClientOriginalExtension();
            $file_name1 = 'general_note_image1' . '_' . time() . '.' . $ext1 ;
            $file1->storeAs('public/GeneralNotificationImages' , $file_name1);
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
            $file_name2 = 'general_note_image2' . '_' . time() . '.' . $ext2 ;
            $file2->storeAs('public/GeneralNotificationImages' , $file_name2);
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

        return redirect('/generaklNotifications')->with('status' , 'Notification was updated Successfully !');

    }

    public function destroy_note($id)
    {

        DB::table('general_notes')->where('id', '=', $id)->delete();

        return redirect('/generaklNotifications')->with('status' , 'Notification was deleted Successfully !');

        
    }
}
