@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-3" style="min-width: 28rem;">
                                <div style="color:cornsilk" class="card-header text-white d-flex justify-content-center bg-dark">
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
                        <div style="color:cornsilk" class="card-header text-white bg-dark"> Stats.</div>
                        <div style="background-color:lavender"  class="card-body">
                        
                        <p class="card-text"> All employee Balances: {{$count}} </p>

                        <a href="{{url('employees_balance/'.$user->id.'/create' )}}" class="btn btn-dark"> Add new Balance</a>

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
                    @foreach($all_emp_balances as $balance)
                        <div class="col-md-6">
                            <div  class="card mb-3" style="min-width: 25rem;margin-left:100px">
                                <div style="color:cornsilk" class="card-header text-white bg-dark">
                                    Balance {{$count_b}}
                                </div>
                                <div style="background-color:lavender" class="card-body">
                                    <div class="card-title">
                                        <h5>Annual Leave</h5>
                                    </div>
                                    <div class="card-text">
                                        {{$balance->annual_leave}}
                                    </div>
                                    <hr>

                                    <div class="card-title">
                                            <h5>Sick Leave</h5>
                                    </div>
                                    <div class="card-text">
                                        {{$balance->sick_leave}}
                                    </div>
                                    <hr>
                                    <div class="card-text">
                                     <a href="{{url('employees_balance/'.$balance->id.'/edit')}}" class="btn btn-dark d-flex justify-content-center"> Edit Balance</a>
                                    <hr>
                                    <form class="delete d-flex justify-content-center"  action="{{route('employee_balance.destroy' , ['user_id'=> $user->id , 'id'=>$balance->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <button type="submit" class="btn btn-danger" style="width:100%">Delete Balance</button>
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
            {{$all_emp_balances->links()}}
        </div>
    </div>

    <script>
            $(".delete").on("submit", function(){
                return confirm("Do you want to delete this item?");
            });
        </script>
  @endsection