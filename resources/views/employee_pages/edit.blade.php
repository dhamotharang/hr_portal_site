@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="color:cornsilk" class="card-header d-flex justify-content-center bg-dark">{{ __('Edit Employee') }}</div>

                <div class="card-body">
                    <form name="edit_form"  method="POST" action="{{url("employees/" . $user->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value={{$user->name}} >

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value={{$user->username}} required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value={{$user->email}} >

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('mobile') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="mobile" value={{$user->mobile}}>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">

                                <?php
                              $usepass = $user->password;

                                ?>
                                <input id="password" type="password"  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value={{$usepass}} required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!-- testtttttt-->
                        @if((Auth::user()->Djv_Group == 'admin' || Auth::user()->Djv_Group == 'TopManager'|| Auth::user()->Djv_Group == 'hr'))

                        <div class="form-group row">
                                <label for="group" class="col-md-4 col-form-label text-md-right">{{ __('Group') }}</label>
                                <div class="col-md-6">
                                <select class="mdb-select  md-outline colorful-select dropdown-primary form-control" name="emp_group" id="emp_group">
                                    @php
                                        $all_groups = DB::select('select * from  djv_groups order by id desc'); 
                                    @endphp
                                        <option value={{$user->Djv_Group}}>{{$user->Djv_Group}}</option>
                                        @foreach ($all_groups as $group)
                                        <option value={{$group->group_name}}>{{$group->group_name}}</option>
                                        @endforeach
                                      </select> 
          
                                </div>
                            </div>
                        
                        <!--ttttttttttt-->
                        <div class="form-group row">
                                <label for="employe_access" class="col-md-4 col-form-label text-md-right">{{ __('Access') }}</label>
                                <div class="col-md-6">
                                <select class="mdb-select  md-outline colorful-select dropdown-primary form-control" name="employe_access" id="employe_access">
                                        <option value={{$user->Djv_Access}}>{{$user->Djv_Access}}</option>
                                        <option value="Admin">Admin</option>
                                        <option value="normal employee">normal employee</option>

                                      </select> 
          
                                </div>
                            </div>  
                            @else
                            <div style="display: none" class="form-group row">
                                <label for="group" class="col-md-4 col-form-label text-md-right">{{ __('Group') }}</label>
                                <div class="col-md-6">
                                <select class="mdb-select  md-outline colorful-select dropdown-primary form-control" name="emp_group" id="emp_group">
                                    @php
                                        $all_groups = DB::select('select * from  djv_groups order by id desc'); 
                                    @endphp
                                        <option value={{$user->Djv_Group}}>{{$user->Djv_Group}}</option>
                                        @foreach ($all_groups as $group)
                                        <option value={{$group->group_name}}>{{$group->group_name}}</option>
                                        @endforeach
                                      </select> 
          
                                </div>
                            </div>
                        
                        <!--ttttttttttt-->
                        <div style="display: none" class="form-group row">
                                <label for="employe_access" class="col-md-4 col-form-label text-md-right">{{ __('Access') }}</label>
                                <div class="col-md-6">
                                <select class="mdb-select  md-outline colorful-select dropdown-primary form-control" name="employe_access" id="employe_access">
                                        <option value={{$user->Djv_Access}}>{{$user->Djv_Access}}</option>
                                        <option value="Admin">Admin</option>
                                        <option value="normal employee">normal employee</option>

                                      </select> 
          
                                </div>
                            </div>   
                          
                        @endif
                        <!--ttttttttttt-->
                        <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('title') }}</label>
                                <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{$user->title}}" >
                                </div>
                            </div>
                        
                        <!--ttttttttttt--> 
                        
                        <!--ttttttttttt-->
                        <div class="form-group row">
                            <label for="pp" class="col-md-4 col-form-label text-md-right">{{ __('profile pic') }}</label>
                            <div class="col-md-6">
                            <input value="{{$user->user_pp}}" id="pp" type="file" class="form-control" name="pp"/>
                            <img src="{{asset('storage/EmployeeProfileImages/'.$user->user_pp)}}" class="rounded-circle" alt="Cinque Terre" width="100" height="60">
                            </div>
                        </div>
                    
                    <!--ttttttttttt-->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
