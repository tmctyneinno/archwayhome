
<!-- Product-->
<!-- Product--><!DOCTYPE html >
<html class="wide wow-animation" lang="en"> 
  <head>
    <!-- Site Title-->
    <title>{{$contactUs->company_name }}</title>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="utf-8"/>
    <link rel="icon" href="{{ asset($contactUs->site_logo) }}" type="image/x-icon"/>
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,400;0,500;0,700;0,900;1,400&amp;display=swap"/>
    <link rel="stylesheet" href="{{ asset ('assets/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{ asset ('assets/css/fonts.css')}}"/>
    <link rel="stylesheet" href="{{ asset ('assets/css/style.css')}}"/>
		<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;">
        <a href="http://windows.microsoft.com/en-US/internet-explorer/">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/></a></div>
    <script src="js/html5shiv.min.js"></script>
		<![endif]-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
    <!-- Page-->
    <div class="page">
      <div id="page-loader">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"> </div>
        </div>
      </div>
      
      @include('partials.navbar');
      
      <main>
        @yield('content')
      </main>
     
      @include('partials.footer');
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="{{ asset ('assets/js/core.min.js')}}"> </script>
    <script src="{{ asset ('assets/js/script.js')}}"></script>
    <a href="#" id="ui-to-top" class="ui-to-top active"></a>
  </body>
</html>