
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{$contactUs->company_name }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
 
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset($contactUs->site_logo) }}">

  <link href="{{ asset ('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">

  <link href="{{ asset ('assets/css/style.css')}}" rel="stylesheet" type="text/css">

  <link href="{{ asset ('assets/css/plugin.css')}}" rel="stylesheet" type="text/css">

  <link href="{{ asset ('assets/fonts/flaticon.css')}}" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  <link rel="stylesheet" href="{{ asset ('assets/fonts/line-icons.css')}}" type="text/css">
  <!-- Include SweetAlert CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{ asset('assets/fonts/Aeonik/Aeonik_Black.ttf') }}" rel="stylesheet">
  <link href="{{ asset('assets/fonts/Aeonik/Aeonik_Block.ttf') }}" rel="stylesheet">
  <link href="{{ asset('assets/fonts/Aeonik/Aeonik_Light.ttf') }}" rel="stylesheet">
  <link href="{{ asset('assets/fonts/Aeonik/Aeonik_Regular.ttf') }}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <!-- Include Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- Include jQuery (required for Toastr) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Include Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</head>
<body>
  <div id="preloader">
    <div id="status"></div>
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

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset ('assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset ('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset ('assets/js/plugin.js')}}"></script>
    <script src="{{ asset ('assets/js/main.js')}}"></script>
    <script src="{{ asset ('assets/js/custom-swiper1.js')}}"></script>
    <script src=" {{ asset ('assets/js/custom-nav.js')}}"></script>
    <script src="{{ asset ('assets/js/custom-accordian.js')}}"></script> 
     
      
    <script>(function () { function c() { var b = a.contentDocument || a.contentWindow.document; if (b) { var d = b.createElement('script'); d.innerHTML = "window.__CF$cv$params={r:'89abb0ddcb1f416b',t:'MTcxOTU1Njg4NC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);"; b.getElementsByTagName('head')[0].appendChild(d) } } if (document.body) { var a = document.createElement('iframe'); a.height = 1; a.width = 1; a.style.position = 'absolute'; a.style.top = 0; a.style.left = 0; a.style.border = 'none'; a.style.visibility = 'hidden'; document.body.appendChild(a); if ('loading' !== document.readyState) c(); else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c); else { var e = document.onreadystatechange || function () { }; document.onreadystatechange = function (b) { e(b); 'loading' !== document.readyState && (document.onreadystatechange = e, c()) } } } })();</script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"89abb0ddcb1f416b","r":1,"version":"2024.4.1","token":"e2e296138d64407b8469055f5cbf0b42"}'
        crossorigin="anonymous">
    </script>

   
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $(document).ready(function() {
        // Function to check if an element is in viewport
        function isInViewport(elem) {
            var rect = elem.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        // Function to add fadeInUp animation class when element is in viewport
        function addAnimationClassIfInView() {
            $('.animation').each(function() {
                if (isInViewport(this)) {
                    $(this).addClass('animated fadeInUp'); // Add 'animated' class to trigger CSS animation
                }
            });
        }

        // Check on page load
        addAnimationClassIfInView();


        // Check on scroll and on page load
        $(window).on('scroll load', function() {
            var sectionTitle = $('.section-title');
            var ourTeamSection = $('.our-team');
            if (isInViewport(sectionTitle)) {
                ourTeamSection.removeClass('hidden').addClass('animated fadeInUp');
            }
            addAnimationClassIfInView();
        });
        // Initial check
        addAnimationClassIfInView();
    });
</script>
  </body>
</html>