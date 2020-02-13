@extends('layouts.master')

@section('content')

<!-- ============================================================== -->
<!-- Example -->


<!-- ============================================================== -->
<div class="col-12">
    <div class="card">
        <div class="card-body wizard-content">
            <h4 class="card-title">Add New Employee</h4>
            <h6 class="card-subtitle"></h6>
            <form action="{{ route('register') }}" method="POST" id="testForm" class="tab-wizard wizard-circle">
                @csrf
                <!-- Step 1 -->
                <h6>Personal Info</h6>
                <section >
                    <div class="form-group row d-flex justify-content-center">
                        <label for="name" >{{ __('Employee Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row d-flex justify-content-center">
                        <label for="email">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row d-flex justify-content-center">
                        <label for="phone" class="mr-5">{{ __('Mobile') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('phone') }}" required>

                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                </section>
                {{-- <!-- Step 2 -->
                <h6>Password</h6>
                <section >
                    <div class="form-group row d-flex justify-content-center">
                        <label class="mr-5" for="password">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row d-flex justify-content-center">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                </section> --}}
                <!-- Step 3 -->
                <h6>Group and Access</h6>
                <section>
                    <!-- testtttttt-->

                    <div class="form-group row d-flex justify-content-center">
                        <label for="group">{{ __('Group') }}</label>
                        <div class="col-md-6">
                        <select class="mdb-select  md-outline colorful-select dropdown-primary form-control" name="emp_group" id="emp_group" >
                            @php
                                $all_groups = DB::select('select * from  djv_groups order by id desc'); 
                            @endphp
                                <option value="" disabled selected>Choose Group</option>
                                @foreach ($all_groups as $group)
                                <option value={{$group->group_name}}>{{$group->group_name}}</option>
                                @endforeach
                                </select> 
    
                        </div>
                    </div>
                
                <!--ttttttttttt-->
                <div class="form-group row d-flex justify-content-center">
                        <label for="employe_access">{{ __('Access') }}</label>
                        <div class="col-md-6">
                        <select class="mdb-select  md-outline colorful-select dropdown-primary form-control" name="employe_access" id="employe_access">
                                <option value="" disabled selected>Choose Employee Access</option>
                                <option value="Admin">Admin</option>
                                <option value="normal employee">normal employee</option>

                                </select> 
    
                        </div>
                    </div>

               <!--ttttttttttt-->
                <div  class="form-group row d-flex justify-content-center">
                    <label for="employee_code">{{ __('Code') }}</label>
                    <div style="margin-left: 5px" class="col-md-6">
                        <input style="margin-right: 2px" id="employee_code" type="text" class="form-control" name="employee_code" >
                    </div>
                </div>
                
                <!--ttttttttttt-->
                <div class="form-group row d-flex justify-content-center">
                        <label for="title">{{ __('title') }}</label>
                        <div style="margin-left: 10px" class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" >
                        </div>
                    </div>


                </section>
                
            </form>
        </div>
    </div>
</div>
<!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <script src="{{asset('dist/js/app.min.js')}}"></script>
    <script src="{{asset('dist/js/app.init.mini-sidebar.js')}}"></script>
    <script src="{{asset('dist/js/app-style-switcher.js')}}"></script>

    <!--Custom JavaScript -->
    <script src="{{asset('dist/js/custom.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-steps/build/jquery.steps.min.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script>

    //Custom design form example
    var form2 = $("#testForm");
        form2.steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onFinished: function(event, currentIndex) {
            
            form2.submit();
        }
    });
    </script>
@endsection
