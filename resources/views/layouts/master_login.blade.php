<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    


     <link  rel="stylesheet" href="{{asset('css/app.css')}}">

<title>{{env('App_NAME' , 'dejavuApp')}}</title>
</head>
<body>
{{-- @include('includes.navbar') --}}
<div class="mb-3"></div>
    <div class="container">
      @include('includes/messages/error_messages')
      @include('includes/messages/correct_messages')

         @yield('content')
    </div>
</body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="{{asset('bootstrap/bootstrap.min.js')}}"></script>
</html>