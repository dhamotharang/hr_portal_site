@extends('layouts.master')
@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                       
        @if(!(Auth::user()->Djv_Group == 'admin' || Auth::user()->Djv_Group == 'TopManager'|| Auth::user()->Djv_Group == 'hr'))
        <span class="d-flex justify-content-center mb-5 mt-5" style="font-family: Arial; font-size: 3rem"> Welcome  {{ Auth::user()->name }}  </span> 
        <div class="card mb-5">
                <div style="color:cornsilk" class="card-header d-flex justify-content-center bg-dark" style="font-family: Arial; font-size: 1rem"> latest Balance for you</div>

                <div style="background-color: lavender" class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li>your Annual leave : {{$auth_user_annual_leave}}</li>
                        <li>your Sick leave : {{$auth_user_sick_leave}}</li>
                    </ul>
                </div>
            </div>

            <div class="card mb-5">
                    <div style="color:cornsilk" class="card-header d-flex justify-content-center bg-dark" style="font-family: Arial; font-size: 1rem"> latest HR notification for you</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <div class="row">
                                 @foreach($last_hr_notes as $Hnote)
                                     <div class="col-md-12">
                                         <div class="card mb-3" style="min-width: 20rem;margin-left:5px">
                                             <div style="color:cornsilk" class="card-header  text-white bg-dark">
                                                Hr Note 
                                             </div>
                                             <div style="background-color: lavender" class="card-body">
                                                 <div class="card-title">
                                                     <h5>Notes</h5>
                                                 </div>
                                                 <div class="card-text">
                                                     <ul>
                                                         <li>{{$Hnote->note_text1}}</li>
                                                         <li>{{$Hnote->note_text2}}</li>
                                                     </ul>
                                                 </div>
                                                 <hr>
                                                 <div class="card-title">
                                                         <h5>Note Images</h5>
                                                     </div>
                                                  
                                                  <div class="card-text">
                                                    @if (!($Hnote->note_image1 === 'NoImage.png'))
                                                    <img src="{{asset('storage/EmployeeNotificationImages/'. $Hnote->note_image1)}}"  width="305" height="170"/>

                                                    @endif
                                                    @if (!($Hnote->note_image2 === 'NoImage.png'))
                                                    <img src="{{asset('storage/EmployeeNotificationImages/' . $Hnote->note_image2 )}}" width="305" height="170"/>      
                                                    @endif
                                                   </div>
                                         

                                             </div>    
                                         </div>
                                    </div>

                                 @endforeach
                             </div>
                    </div>
            </div>

            <div class="card mb-5">
                    <div style="color:cornsilk" class="card-header d-flex justify-content-center bg-dark" style="font-family: Arial; font-size: 1rem"> latest HR General Notifications</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <div class="row">
                                @php
                                 $count_b=1;
                                 @endphp
                                 @foreach($last_notes as $note)
                                     <div class="col-md-6">
                                         <div  class="card mb-3" style="min-width: 20rem;margin-left:5px">
                                             <div  style="color:cornsilk"  class="card-header text-white bg-dark">
                                                 Note {{$count_b}}
                                             </div>
                                             <div  style="background-color: lavender" class="card-body">
                                                 <div class="card-title">
                                                     <h5>Notes</h5>
                                                 </div>
                                                 <div class="card-text">
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
                                                         @if (!($note->note_image1 === 'NoImage.png'))
                                                         <img src="{{asset('storage/GeneralNotificationImages/'. $note->note_image1)}}"  width="270" height="140"/>
                                                         @endif
                                                         @if (!($note->note_image2 === 'NoImage.png'))
                                                         <img src="{{asset('storage/GeneralNotificationImages/' . $note->note_image2 )}}" width="270" height="140"/>
                                                         @endif
                                                         
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
            @else
            <span class="d-flex justify-content-center mb-5 mt-10" style="font-family: Arial; font-size: 3rem ;margin-top:200px"> Welcome Mr:  {{ Auth::user()->name }}  </span> 
            @endif
        </div>
    </div>
</div>

{{-- <script>
        $(document).ready(function(){
        $("#user_name_home").fadeIn(300);
        $("#user_name_home").animate({left: '100px'}, "slow");
        $("#user_name_home").animate({fontSize: '3em'}, "slow"); 
        
        
            });
        </script> --}}
@endsection
