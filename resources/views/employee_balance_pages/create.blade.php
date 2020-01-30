@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="background-color: #707CD2; color:cornsilk" class="card-header d-flex justify-content-center">{{ __('Add new Employee Balance') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('employees_balance/'.$id)}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Annual leave') }}</label>

                            <div class="col-md-6">
                                <input id="annual_leave" type="text" class="form-control{{ $errors->has('annual_leave') ? ' is-invalid' : '' }}" name="annual_leave" value="{{ old('annual_leave') }}">

                                @if ($errors->has('annual_leave'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('annual_leave') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sick_leave" class="col-md-4 col-form-label text-md-right">{{ __('Sick leave') }}</label>

                            <div class="col-md-6">
                                <input id="sick_leave" type="text" class="form-control{{ $errors->has('sick_leave') ? ' is-invalid' : '' }}" name="sick_leave" value="{{ old('sick_leave') }}" >

                                @if ($errors->has('sick_leave'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sick_leave') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!-- testtttttt-->

                        {{-- <div class="form-group row">
                                <label for="group" class="col-md-4 col-form-label text-md-right">{{ __('Add To') }}</label>
                                <div class="col-md-6">
                                <select class="mdb-select  md-outline colorful-select dropdown-primary form-control" name="emp_group" id="emp_group">
                                    @php
                                        $all_groups = DB::select('select * from  djv_groups order by id desc'); 
                                    @endphp
                                        <option value="" disabled selected>Choose employee</option>
                                        @foreach ($all_groups as $group)
                                        <option value={{$group->group_name}}>{{$group->group_name}}</option>
                                        @endforeach
                                      </select> 
          
                                </div>
                            </div> --}}
                        
                        <!--ttttttttttt-->                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
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
