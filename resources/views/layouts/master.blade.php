<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
            <!-- CSS here -->
            <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/gijgo.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/slicknav.cs')}}s">
            <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
        
            <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
            {{-- <!-- <link rel="stylesheet" href="css/responsive.css"> --> --}}

	{{-- <link rel="canonical" href="{{asset('templates/ampleadmin/ampleadmin_3.html')}}" /> --}}
    <!-- This page CSS -->
    <link href="{{asset('assets/libs/jquery-steps/jquery.steps.css')}}" rel="stylesheet">
    <link href="{{asset('assets/libs/jquery-steps/steps.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('dist/css/style.min.cs')}}s" rel="stylesheet">


        <!-- chartist CSS -->
        <link href="{{asset('assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
        <!--c3 CSS -->
        <link href="{{asset('assets/libs/morris.js/morris.css')}}" rel="stylesheet">
        <link href="{{asset('assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('assets/libs/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/extra-libs/calendar/calendar.css')}}" rel="stylesheet" /> 
      <link  rel="stylesheet" href="{{asset('css/app.css')}}">

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
    .li_style{
        font-size: 16px;
        color: #fff;
    }
    </style>

@include('includes.nav')
</head>
<body>

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
    {{-- <script src="{{asset('dist/js/custom.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-steps/build/jquery.steps.min.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="{{asset('bootstrap/bootstrap.min.js')}}"></script>  --}}

      <!-- JS here -->
      <script src="{{asset('assets/js_templete/vendor/modernizr-3.5.0.min.js')}}"></script>
      <script src="{{asset('assets/js_templete/vendor/jquery-1.12.4.min.js')}}"></script>
      <script src="{{asset('assets/js_templete/popper.min.js')}}"></script>
      <script src="{{asset('assets/js_templete/bootstrap.min.js')}}"></script>
      <script src="{{asset('assets/js_templete/owl.carousel.min.js')}}"></script>
      <script src="{{asset('assets/js_templete/isotope.pkgd.min.js')}}"></script>
      <script src="{{asset('assets/js_templete/ajax-form.js')}}"></script>
      <script src="{{asset('assets/js_templete/popper.min.js')}}"></script>
      <script src="{{asset('assets/js_templete/jquery.counterup.min.js')}}"></script>
      <script src="{{asset('assets/js_templete/imagesloaded.pkgd.min.js')}}"></script>
      <script src="{{asset('assets/js_templete/scrollIt.js')}}"></script>
      <script src="{{asset('assets/js_templete/jquery.scrollUp.min.js')}}"></script>
      <script src="{{asset('assets/js_templete/wow.min.js')}}"></script>
      <script src="{{asset('assets/js_templete/nice-select.min.js')}}"></script>
      <script src="{{asset('assets/js_templete/jquery.slicknav.min.js')}}"></script>
      <script src="{{asset('assets/js_templete/jquery.magnific-popup.min.js')}}"></script>
      <script src="{{asset('assets/js_templete/plugins.js')}}"></script>
      <script src="{{asset('assets/js_templete/gijgo.min.js')}}"></script>
      <script src="{{asset('assets/js_templete/slick.min.js')}}"></script>
     
  
      
      {{-- <!--contact js-->
      <script src="{{asset('assets/js_templete/contact.js')}}"></script>
      <script src="{{asset('assets/js_templete/jquery.ajaxchimp.min.js')}}"></script>
      <script src="{{asset('assets/js_templete/jquery.form.js')}}"></script>
      <script src="{{asset('assets/js_templete/jquery.validate.min.js')}}"></script>
      <script src="{{asset('assets/js_templete/mail-script.js')}}"></script> --}}
  
  
      <script src="{{asset('assets/js_templete/main.js')}}"></script>
      <script>
          $('#datepicker').datepicker({
              iconsLibrary: 'fontawesome',
              icons: {
               rightIcon: '<span class="fa fa-caret-down"></span>'
           }
          });
      </script>