@extends('layouts.master')

@section('content')


<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="color:cornsilk" class="card-header d-flex justify-content-center bg-dark">{{ __('Search Employee') }}</div>

                <div class="card-body">
                <form method="POST" action="{{route('employees.search')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                            <div class="col-md-6">
                                <input id="employee_code" type="text" class="form-control{{ $errors->has('employee_code') ? ' is-invalid' : '' }}" name="employee_code" value="{{ old('employee_code') }}"  autofocus>

                                @if ($errors->has('code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" >

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
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('phone') }}" >

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!-- testtttttt-->

                        <div class="form-group row">
                                <label for="group" class="col-md-4 col-form-label text-md-right">{{ __('Group') }}</label>
                                <div class="col-md-6">
                                <select class="mdb-select  md-outline colorful-select dropdown-primary form-control" name="emp_group" id="emp_group">
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
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Search') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<table class="table table-striped table-dark" >
    <thead style="background-color: #302523; color:cornsilk">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Code</th>
        <th scope="col">mobile</th>
        <th scope="col">Group</th>
        <th scope="col">Role</th>
        <th scope="col">Title</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        <th scope="col">Balance</th>
      </tr>
    </thead>
    <tbody>
  <?php $c =1 ?>

    @foreach($all_users as $user)
      <tr>
        <th scope="row"><?php echo $c ?></th>
        <td><img width="50" height="50" src="{{asset('storage/EmployeeProfileImages/'. $user->user_pp)}}" style="border-radius: 50px;margin-right: 5px">{{$user->name}}</td>
        <td>{{$user->employee_code}}</td>
        <td>{{$user->mobile}}</td>
        <td>{{$user->Djv_Group}}</td>
        <td>{{$user->Djv_Access}}</td>
        <td>{{$user->title}}</td>
        <td><a href="{{url('employees/' . $user->id .'/edit')}}" class="btn btn-primary float-left mr-3"> Edit</a> </td>
        <td>           
            <form id="delete-form-{{$user->id}}" class="delete" action="{{route('employees.destroy' , ['id'=> $user->id])}}" method="POST">
                @csrf
                @method('DELETE')
                {{-- <button type="submit" class="btn btn-danger float-left">Delete</button> --}}
            </form>

            <button onclick="if(confirm('Are you sure you want to delete this employee?')){
                event.preventDefault();
                document.getElementById('delete-form-{{$user->id}}').submit();
              }else
              {
                event.preventDefault();
              }
      
              " class="btn btn-danger float-left">Delete</button>


        </td>
        <td><a href= "{{url('employees_balance/' . $user->id )}}" class="btn btn-primary float-left mr-3">Balance</a> </td>

      </tr>
      <?php $c++ ?>
    @endforeach  
    </tbody>
  </table>

  {{-- <div class="row">
    <div class="col-md-12 d-flex justify-content-center">
        {{$all_users->links()}}
    </div>
</div> --}}

  <script>
        $(".delete").on("submit", function(){
            return confirm("Do you want to delete this employee?");
        });
  </script>
  @endsection