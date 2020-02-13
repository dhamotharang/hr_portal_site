<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\complain;

class ComplainController extends Controller
{

    public function index()
    {
     $all_complain = complain::get();
     return view('complain_pages.index',compact('all_complain'));
    }

    public function create()
    {
        return view('complain_pages.create');
    }

    public function store(Request $request)
    {
        $complain = new complain();

        if($request->hasFile('img1'))
        {
            $file1 = $request->file('img1');
            $ext1 = $file1->getClientOriginalExtension();
            $file_name1 = 'complain_image1' . '_' . time() . '.' . $ext1 ;
            $file1->storeAs('public/complainImages' , $file_name1);
            //dd($path1);
        }
        else
        {
            $file_name1 = 'NoImage.png';
        }

        if (isset($request->chek_identy)) {
            $complain->secret = 'yes';
        }
        else{
            $complain->secret = 'no';
        }
    
        $complain->content = $request->content;
        $complain->complain_image = $file_name1;
        $complain->emp_code = Auth::user()->employee_code;
        $complain->user()->associate($request->user());

        $complain->save();

        return redirect('/home')->with('status' , 'complain was sent Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $complain = complain::find($id);
        $complain->delete();
        return redirect(url('/complains'))->with('SuccessMessage','your complain Deleted successfully!');
    }
}
