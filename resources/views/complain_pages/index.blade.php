@extends('layouts.master')

@section('content')
<!-- Card -->
<style>
  .collapse-content {
    float: right;
}
.text-muted {
    color: #000!important;
}
.collapse-content .fa.fa-trash-alt:hover {
  color: #0d47a1 !important;
}
</style>

@foreach ($all_complain as $complain)

 @if ($complain->secret === "yes")
 <div class="card promoting-card">

  @php
      $emp_id = $complain->user_id;
     $emp= DB::select("select * from  users where id = $emp_id")[0];
  @endphp

    <!-- Card content -->
    <div class="card-body d-flex flex-row">
  
      <!-- Avatar -->
      <img src="{{asset('storage/EmployeeProfileImages/'. $emp->user_pp)}}" class="rounded-circle mr-3" height="50px" width="50px" alt="avatar">
  
      <!-- Content -->
      <div>
  
        <!-- Title -->
      <h4 class="card-title font-weight-bold mb-2">{{$emp->name}}</h4>

        <!-- Subtitle -->
      <p class="card-text"><i class="far fa-clock pr-2"></i>{{$complain->created_at}}</p>
  
      </div>
  
    </div>
  
    <!-- Card image -->
    <div class="view overlay">

      @if (!($complain->complain_image === 'NoImage.png'))
          
      <img style="height: 700px" class="card-img-top rounded-0" src="{{asset('storage/ComplainImages/'. $complain->complain_image)}}" alt="complain image">
      <a href="#!">
        <div class="mask rgba-white-slight"></div>
      </a>
          
      @endif
    </div>
  
    <!-- Card content -->
    <div class="card-body">
  
  
        <!-- Text -->
      <p class="card-text collapse" id="collapseContent{{$complain->id}}">{{$complain->content}}.</p>
        <!-- Button -->
      <a class="btn btn-flat red-text p-1 my-1 mr-0 mml-1 collapsed" data-toggle="collapse" href="#collapseContent{{$complain->id}}" aria-expanded="false" aria-controls="collapseContent"><i class="fas fa-eye text-muted float-right p-1 my-1" data-toggle="tooltip" data-placement="top" title="show more"></i></a>
      <div class="collapse-content">
      <form id="delete-form-{{$complain->id}}" class="delete d-flex justify-content-center"  action="{{route('complains.destroy',$complain->id)}}" method="POST">
        @csrf
        @method('DELETE')
        
        {{-- <button type="submit" class="btn btn-danger" style="width:100%">Delete Note</button> --}}
    </form>

    <button onclick="if(confirm('Are you sure you want to delete this Complain?')){
      event.preventDefault();
      document.getElementById('delete-form-{{$complain->id}}').submit();
    }else
    {
      event.preventDefault();
    }

    " class="btn btn-sm"><i style="color: #fff" class="fas fa-trash-alt text-muted float-right p-1 my-1" data-toggle="tooltip" data-placement="top" title="delete this complain"></i></button>      </div>
  
    </div>
  
  </div>
  <!-- Card -->
 @else
 <div class="card promoting-card">

  @php
      $emp_id = $complain->user_id;
     $emp= DB::select("select * from  users where id = $emp_id")[0];
  @endphp

    <!-- Card content -->
    <div class="card-body d-flex flex-row">
  
      <!-- Avatar -->
      <img src="{{asset('storage/EmployeeProfileImages/NoImage.png')}}" class="rounded-circle mr-3" height="50px" width="50px" alt="avatar">
  
      <!-- Content -->
      <div>
  
        <!-- Title -->
      <h4 class="card-title font-weight-bold mb-2">Unknown employee</h4>

        <!-- Subtitle -->
      <p class="card-text"><i class="far fa-clock pr-2"></i>{{$complain->created_at}}</p>
  
      </div>
  
    </div>
  
    <!-- Card image -->
    <div class="view overlay">
      @if (!($complain->complain_image === 'NoImage.png'))
          
      <img style="height: 700px" class="card-img-top rounded-0" src="{{asset('storage/ComplainImages/'. $complain->complain_image)}}" alt="complain image">
      <a href="#!">
        <div class="mask rgba-white-slight"></div>
      </a>
          
      @endif

    </div>
  
    <!-- Card content -->
    <div class="card-body">
  
  
        <!-- Text -->
      <p class="card-text collapse" id="collapseContent{{$complain->id}}">{{$complain->content}}.</p>
        <!-- Button -->
      <a class="btn btn-flat red-text p-1 my-1 mr-0 mml-1 collapsed" data-toggle="collapse" href="#collapseContent{{$complain->id}}" aria-expanded="false" aria-controls="collapseContent"><i class="fas fa-eye text-muted float-right p-1 my-1" data-toggle="tooltip" data-placement="top" title="show more"></i></a>
      <div class="collapse-content">

      <form id="delete-form-{{$complain->id}}" class="delete d-flex justify-content-center"  action="{{route('complains.destroy',$complain->id)}}" method="POST">
        @csrf
        @method('DELETE')
        
        {{-- <button type="submit" class="btn btn-danger" style="width:100%">Delete Note</button> --}}
    </form>

    <button onclick="if(confirm('Are you sure you want to delete this Complain?')){
      event.preventDefault();
      document.getElementById('delete-form-{{$complain->id}}').submit();
    }else
    {
      event.preventDefault();
    }

    " class="btn  btn-sm"><i class="fas fa-trash-alt text-muted float-right p-1 my-1" data-toggle="tooltip" data-placement="top" title="delete this complain"></i></button>
        
  
      </div>
  
    </div>
  
  </div>
  <!-- Card -->
 @endif

@endforeach
@endsection  