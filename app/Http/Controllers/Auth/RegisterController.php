<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/employees';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => [ 'string', 'max:255'],
            // 'email' => [ 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:5', 'confirmed'],
            'mobile' => [ 'max:255'],
            'emp_group' => ['required', 'max:255'],
            'employe_access' => ['required', 'string'],
            // 'title' => [ 'string'],
            'employee_code' =>['required', 'string','max:20', 'unique:users'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username'=>$data['employee_code'],
            'email' => $data['email'],
            'password' => Hash::make($data['employee_code']),
            'mobile' => $data['mobile'],
            'Djv_Group' => $data['emp_group'],
            'Djv_Access' => $data['employe_access'],
            'title' => $data['title'],
            'user_pp' =>'NoImage.png',
            'employee_code' =>$data['employee_code'],
        ])->with('status','User was added successfully!');
    }
}
