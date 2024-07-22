<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from omah.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jun 2024 10:44:52 GMT -->

<head>
    <!-- Title -->
    <title>{{$contactUs->company_name }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">

    <meta name="keywords"
        content="backend, dashboard, backend dashboard, backend template, template, backend panel, backendistration, analytics, bootstrap, hospital backend, modern, property, real estate, responsive, creative, retina ready, modern Dashboard">
    <meta name="description"
        content="Your Ultimate Real Estate backend Dashboard Template. Streamline property management, analyze market trends, and boost productivity with our intuitive and feature-rich solution. Elevate your real estate business today!">

    <meta property="og:title" content="Omah - Real Estate backend Dashboard Template">
    <meta property="og:description"
        content="Your Ultimate Real Estate backend Dashboard Template. Streamline property management, analyze market trends, and boost productivity with our intuitive and feature-rich solution. Elevate your real estate business today!">
    <meta property="og:image" content="{{ asset($contactUs->site_logo) }}">
    <meta name="format-detection" content="telephone=no">

    <meta name="twitter:title" content="Omah - Real Estate backend Dashboard Template">
    <meta name="twitter:description"
        content="Your Ultimate Real Estate backend Dashboard Template. Streamline property management, analyze market trends, and boost productivity with our intuitive and feature-rich solution. Elevate your real estate business today!">
    <meta name="twitter:image" content="{{ asset($contactUs->site_logo) }}">
    <meta name="twitter:card" content="summary_large_image">

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset($contactUs->site_logo) }}">
    <!-- Vectormap -->
    <link href="{{ asset ('backend/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
    <link href="{{ asset ('backend/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{ asset ('backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{ asset ('backend/css/style.css')}}" rel="stylesheet">
    <!-- Datatable -->
    <link href="{{ asset ('backend/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{ asset ('backend/vendor/datatables/responsive/responsive.css')}}" rel="stylesheet">
    <link href="{{ asset ('backend/vendor/dropzone/dist/dropzone.css')}}" rel="stylesheet">

</head>

<body>

    @include('adminpartials.navbar');
    @include('adminpartials.sidebar');

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <main>
        @yield('content')
    </main>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    
    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="#"
                    target="_blank"> The Morgans</a> <span id="currentYear"></span> </p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset ('backend/vendor/global/global.min.js')}}"></script>
    <script src="{{ asset ('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset ('backend/vendor/chartjs/chart.bundle.min.js')}}"></script>
    <script src="{{ asset ('backend/vendor/owl-carousel/owl.carousel.js')}}"></script>

    <!-- Apex Chart -->
    <script src="{{ asset ('backend/vendor/apexchart/apexchart.js')}}"></script>
    <!-- Vectormap -->
    <script src="{{ asset ('backend/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset ('backend/vendor/jqvmap/js/jquery.vmap.world.js')}}"></script>
    <script src="{{ asset ('backend/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset ('backend/vendor/peity/jquery.peity.min.js')}}"></script>
    <script src="{{ asset ('backend/js/dashboard/dashboard-1.js')}}"></script>
    <script src="{{ asset ('backend/js/custom.min.js')}}"></script>
    <script src="{{ asset ('backend/js/deznav-init.js')}}"></script>
    <!-- ckeditor -->
    <script src="{{ asset ('backend/vendor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset ('backend/vendor/ckeditor/ckeditorContent.js')}}"></script>
    <!-- Datatable --> 
    <script src="{{ asset ('backend/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset ('backend/vendor/datatables/responsive/responsive.js')}}"></script>
    <script src="{{ asset ('backend/vendor/js/plugins-init/datatables.init.js')}}"></script>
    <script src="{{ asset ('backend/vendor/dropzone/dist/dropzone.js')}}"></script>

    <!-- Dashboard 1 -->
    <script>
        // JavaScript to automatically update the current year
        document.getElementById("currentYear").textContent = new Date().getFullYear();
      </script>
    <script>
        function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				autoplay:true,
				margin:0,
				nav:true,
				dots: false,
				navText: ['<i class="las la-long-arrow-alt-left"></i>', '<i class="las la-long-arrow-alt-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					
					480:{
						items:1
					},			
					
					767:{
						items:1
					},
					1000:{
						items:1
					}
				}
			})		
			/*Custom Navigation work*/
			jQuery('#next-slide').on('click', function(){
			   $('.testimonial-one').trigger('next.owl.carousel');
			});

			jQuery('#prev-slide').on('click', function(){
			   $('.testimonial-one').trigger('prev.owl.carousel');
			});
			/*Custom Navigation work*/
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000); 
		});
    </script>

</body>

<!-- Mirrored from omah.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jun 2024 10:46:42 GMT -->

</html>