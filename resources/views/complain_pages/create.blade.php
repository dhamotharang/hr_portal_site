@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="color:cornsilk" class="card-header d-flex justify-content-center bg-dark">{{ __('Type your complain') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('complains')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">

                            <div style="margin-left: 200px" class="col-md-6">
                                <textarea id="content" type="text" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" value="{{ old('content') }}"></textarea>

                                @if ($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" style="margin-left: 200px">  
                                <input type="file" class="form-control col-lg-8" id="img1" placeholder="choose first image" name="img1">  
                        </div>
                        <div class="form-group row" style="margin-left: 200px">  
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="chek_identy" name="chek_identy">
                                <label class="custom-control-label" for="chek_identy"><span style="color: #000;font-size: 17px" >Know me</span></label>
                              </div>
                        </div>
  
                       
                        <div class="form-group row mb-0" style="margin-left: 187px">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Send') }}
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
