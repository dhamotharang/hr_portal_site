<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
	{{-- <link rel="canonical" href="{{asset('templates/ampleadmin/ampleadmin_3.html')}}" /> --}}
    <!-- This page CSS -->
    <link href="{{asset('assets/libs/jquery-steps/jquery.steps.css')}}" rel="stylesheet">
    <link href="{{asset('assets/libs/jquery-steps/steps.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('dist/css/style.min.cs')}}s" rel="stylesheet">


        <!-- chartist CSS -->
        {{-- <link href="{{asset('assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet"> --}}
        <!--c3 CSS -->
        {{-- <link href="{{asset('assets/libs/morris.js/morris.css')}}" rel="stylesheet">
        <link href="{{asset('assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet"> --}}

        <!-- Custom CSS -->
        {{-- <link href="{{asset('assets/libs/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/extra-libs/calendar/calendar.css')}}" rel="stylesheet" /> --}}
     {{-- <link  rel="stylesheet" href="{{asset('css/app.css')}}"> --}}

<title>{{env('App_NAME' , 'dejavuApp')}}</title>
<style>
    .content 
    {
        text-align: center;
        margin-top: 15%;
    }
   .title
    {
        font-size: 84px;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 50;
        height: 100vh;
        margin: 0;
    }
    body{
        background-color:#fff;
    }
</style>

</head>
<body>
@include('includes.nav')
<div class="mb-3"></div>
    <div class="container">
      @include('includes/messages/error_messages')
      @include('includes/messages/correct_messages')
         @yield('content')
    </div>

     <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script data-cfasync="false" src="{{asset('public/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
    {{-- <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script> --}}
    <!-- Bootstrap tether Core JavaScript -->
    {{-- <script src="{{asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script> --}}
    <!-- apps -->
    {{-- <script src="{{asset('dist/js/app.min.js')}}"></script> --}}
    {{-- <script src="{{asset('dist/js/app.init.mini-sidebar.js')}}"></script> --}}
    {{-- <script src="{{asset('dist/js/app-style-switcher.js')}}"></script> --}}
    <!-- slimscrollbar scrollbar JavaScript -->
    {{-- <script src="{{asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/extra-libs/sparkline/sparkline.js')}}"></script> --}}
    <!--Wave Effects -->
    {{-- <script src="{{asset('dist/js/waves.js')}}"></script> --}}
    <!--Menu sidebar -->
    {{-- <script src="{{asset('dist/js/sidebarmenu.js')}}"></script> --}}
    <!--Custom JavaScript -->
    <script src="{{asset('dist/js/custom.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-steps/build/jquery.steps.min.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="{{asset('bootstrap/bootstrap.min.js')}}"></script> 