@extends('layouts.master')

@section('content')

{{-- <div class="card d-flex justify-content-center" style="width: 32rem;">
    <div class="card-header d-flex justify-content-center">
      <h3>employee info</h3>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item d-flex justify-content-center"><h6>{{$user->name}}</h6></li>
      <li class="list-group-item d-flex justify-content-center"><h6>{{$user->email}}</h6></li>
      <li class="list-group-item d-flex justify-content-center"><h6>{{$user->mobile}}</h6></li>
      <li class="list-group-item d-flex justify-content-center"><h6>{{$user->Djv_Group}}</h6></li>
      <li class="list-group-item d-flex justify-content-center"><h6>{{$user->Djv_Access}}</h6></li>
      <li class="list-group-item d-flex justify-content-center"><h6>{{$user->title}}</h6></li>
    </ul>


    <div class="col-md-3">
            <div class="card ml-3" style="max-width: 10rem;">
                    <div class="card-header bg-info text-white"> Stats.</div>
                    <div class="card-body">
                    
                    <p class="card-text"> All customrt Tickets</p>
                    </div>
                </div>
    </div>
  </div> --}}


    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-3" style="min-width: 28rem;">
                                <div style="background-color: #707CD2" class="card-header text-white d-flex justify-content-center">
                                      employee info  
                                </div>
                                <div style="background-color:lavender" class="card-body">
                                    <div class="card-title">
                                        <h5>employee name </h5>
                                    </div>
                                    <div class="card-text">
                                        <h6>{{$user->name}}</h6>
                                    </div>
                                    <hr>
                                    <div class="card-title">
                                        <h5>employee email </h5>
                                        </div>
                                        <div class="card-text">
                                         <h6>{{$user->email}}</h6>
                                        </div>
                                        <hr>
                                    <div class="card-title">
                                        <h5>employee mobile </h5>
                                        </div>
                                        <div class="card-text">
                                            <h6>{{$user->mobile}}</h6>
                                        </div>
                                </div>    
                            </div>
                       </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
                <div class="card ml-3" style="max-width: 20rem;">
                        <div style="background-color: #707CD2" class="card-header text-white"> Stats.</div>
                        <div style="background-color:lavender" class="card-body">
                        
                        <p class="card-text"> All employee Notes: {{$count}} </p>

                        <a href="{{url('employees_notify/'.$user->id.'/create')}}" class="btn btn-primary"> Add new note</a>

                        </div>
                    </div>
        </div>
</div>

<hr>

<div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="row">
                   @php
                    $count_b=1;
                    @endphp
                    @foreach($all_emp_notes as $note)
                        <div class="col-md-6">
                            <div class="card mb-3" style="min-width: 25rem;margin-left:100px">
                                <div style="background-color: #707CD2" class="card-header text-white">
                                    Note {{$count_b}}
                                </div>
                                <div style="background-color:lavender" class="card-body">
                                    <div class="card-title">
                                        <h5>Notes</h5>
                                    </div>
                                    <div  class="card-text">
                                        <ul>
                                            <li>{{$note->note_text1}}</li>
                                            <li>{{$note->note_text2}}</li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="card-title">
                                            <h5>Note Images</h5>
                                        </div>
                                    <div class="card-text">
                                            
                                                <img src="{{asset('storage/EmployeeNotificationImages/'. $note->note_image1)}}"  width="170" height="200"/>
                                                <img src="{{asset('storage/EmployeeNotificationImages/' . $note->note_image2 )}}" width="170" height="200"/>
                                            
                                    </div>
                                    <hr>
                                    <div class="card-text">
                                     <a href="{{url('employees_notify/'.$note->id.'/edit')}}" class="btn btn-primary d-flex justify-content-center"> Edit Note</a>
                                    <hr>
                                    <form class="delete d-flex justify-content-center"  action="{{route('employee_note.destroy' , ['user_id'=> $user->id , 'id'=>$note->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <button type="submit" class="btn btn-danger" style="width:100%">Delete Note</button>
                                        </form>
                                    </div>
                                </div>    
                            </div>
                       </div>
                       @php
                           $count_b++;
                       @endphp
                    @endforeach
                </div>
            </div>
        </div>


</div>

    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            {{$all_emp_notes->links()}}
        </div>
    </div>

    <script>
            $(".delete").on("submit", function(){
                return confirm("Do you want to delete this item?");
            });
        </script>
  @endsection