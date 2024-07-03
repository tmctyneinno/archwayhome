@extends('layouts.app')

@section('content')

<section class="breadcrumb-main pb-0 pt-20" style="background-image: url({{ asset($aboutUs->header_image) }});">
  <div class="breadcrumb-outer">
      <div class="container">
          <div class="breadcrumb-content d-md-flex align-items-center pt-6">
              <h1 class="mb-0">About Us</h1>
              <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">About Us</li>
                  </ul>
              </nav>
          </div>
      </div>
  </div>
  <div class="dot-overlay"></div>
</section>

<section class="about-us pb-6">
  <div class="container">
      <div class="about-image-box">
        <div class="row d-flex align-items-center justify-content-between text-lg-start text-center">
          <div class="col-lg-7 col-sm-12 mb-2">
              <div class="about-content">
                  <h4 class="theme d-inline-block">Executive Summary</h4>
                  {{-- <h3 class="border-b mb-2 pb-2">{{$aboutUs->title}}</h3> --}}
                  <p class="border-b mb-2 pb-2 text-justify" style="text-align: justify;">
                    {{-- {!! ($aboutUs->content) !!} --}}
                    Archway Homes and Investment Limited is a dynamic and innovative real estate startup poised to revolutionize the Nigerian property market. Specializing in real estate marketing, development, brokerage, investment, and construction, we aim to address the evolving needs of Nigeria's housing sector with a comprehensive and client-centric approach.

                    Founded on the principles of innovation, transparency, and customer satisfaction, Archway Homes and Investment Limited stands out in the competitive real estate landscape. We prioritize building long-term relationships with our clients, partners, and stakeholders, offering tailored solutions that meet their unique needs and aspirations.

                  </p>
                  
              </div>
          </div>
          <div class="col-lg-5 col-sm-12 mb-4">
              <div class="about-image p-3 box-shadow position-relative">
                  <img src="{{ asset($aboutUs->image)}}" alt class="w-50">
                 
              </div>
          </div>
      </div>
          <div class="row d-flex align-items-center justify-content-between text-lg-start text-center">
              <div class="col-lg-7 col-sm-12 mb-4">
                  <div class="about-content">
                      <h4 class="theme d-inline-block">About Us</h4>
                      {{-- <h3 class="border-b mb-2 pb-2">{{$aboutUs->title}}</h3> --}}
                      <p class="border-b mb-2 pb-2 text-justify" style="text-align: justify;">
                        {!! ($aboutUs->content) !!}
                      </p>
                      
                  </div>
              </div>
              <div class="col-lg-5 col-sm-12 mb-4">
                  <div class="about-image p-3 box-shadow position-relative">
                      <img src="{{ asset($aboutUs->image)}}" alt class="w-100">
                     
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

@include('users.pages.services')
@include('users.pages.why_choose_us')

<section class="discount-action bg-grey">
  <div class="container">
      <div class="call-banner" style="background-image: url({{ asset('assets/images/bg/bg1.jpg')}});">
          <div class="row d-flex align-items-center">
              <div class="col-lg-6 col-md-8 p-0">
                  <div class="call-banner-inner bg-theme1">
                      <div class="trend-content-main">
                          <div class="trend-content p-5">
                              <h5 class="mb-1 white">Wanna to Buy??</h5>
                              <h2 class="mb-4 white">Looking to Buy a New Property?</h2>
                              <div class="section-btns d-flex align-items-center">
                                  <a href="grid-rightfilter.html" class="nir-btn">Buy Properties <i
                                          class="fa fa-arrow-right white pl-1"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6 col-md-4 p-0"></div>
          </div>
      </div>
      
  </div>
</section>

<section class="our-team" style="background-image: url(images/shape-1.png);">
  <div class="container">
      <div class="section-title mb-6 pb-1 w-75 text-center mx-auto">
          <h2 class="m-0"> Our <span>Team </span></h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <div class="team-main">
          <div class="row shop-slider">
            @forelse ($teams as $team)
              <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                  <div class="team-list">
                      <div class="team-image">
                          <img src="{{ asset($team->image) }}" alt="team" style=" width: 320px; height: 400px; object-fit: cover; ">
                      </div>
                      <div class="team-content text-center p-3 bg-white">
                          <h4 class="mb-0"><a href="{{ route('users.team.detail', encrypt($team->id))}}">{{$team->name}}</a></h4>
                          <p class="mb-0">{{$team->position}}</p>
                      </div>
                  </div>
              </div>
            @empty
                <p>No Data</p>
            @endforelse
              
          </div>
      </div>
  </div>
</section>

{{-- <section class="testimonial pb-6">
  <div class="container">
      <div class="section-title mb-4 pb-1 w-75 mx-auto text-center">
          <h2 class="m-0">Good Reviews By <span>Clients</span></h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <div class="row review-slider">
          <div class="col-sm-4 item">
              <div class="testimonial-item1 text-center">
                  <div class="details">
                      <p class="m-0">Lorem Ipsum is simply dummy text of the printing andypesetting industry.
                          Lorem ipsum a simple Lorem Ipsum has been the industry's standard dummy hic et quidem.
                          Dignissimos maxime velit unde inventore quasi vero dolorem.</p>
                  </div>
                  <div class="author-info mt-2">
                      <a href="#"><img src="images/testimonial/img1.jpg" alt></a>
                      <div class="author-title">
                          <h4 class="m-0 theme2">Jared Erondu</h4>
                          <span>Supervisor</span>
                      </div>
                  </div>
                  <i class="fa fa-quote-left mb-2"></i>
              </div>
          </div>
          <div class="col-sm-4 item">
              <div class="testimonial-item1 text-center">
                  <div class="details">
                      <p class="m-0">Lorem Ipsum is simply dummy text of the printing andypesetting industry.
                          Lorem ipsum a simple Lorem Ipsum has been the industry's standard dummy hic et quidem.
                          Dignissimos maxime velit unde inventore quasi vero dolorem.</p>
                  </div>
                  <div class="author-info mt-2">
                      <a href="#"><img src="images/testimonial/img2.jpg" alt></a>
                      <div class="author-title">
                          <h4 class="m-0 theme2">Cadic Vegeta</h4>
                          <span>Sr. Consultant</span>
                      </div>
                  </div>
                  <i class="fa fa-quote-left mb-2"></i>
              </div>
          </div>
          <div class="col-sm-4 item">
              <div class="testimonial-item1 text-center">
                  <div class="details">
                      <p class="m-0">Lorem Ipsum is simply dummy text of the printing andypesetting industry.
                          Lorem ipsum a simple Lorem Ipsum has been the industry's standard dummy hic et quidem.
                          Dignissimos maxime velit unde inventore quasi vero dolorem.</p>
                  </div>
                  <div class="author-info mt-2">
                      <a href="#"><img src="images/testimonial/img3.jpg" alt></a>
                      <div class="author-title">
                          <h4 class="m-0 theme2">Jonathan Beri</h4>
                          <span>Sales Manager</span>
                      </div>
                  </div>
                  <i class="fa fa-quote-left mb-2"></i>
              </div>
          </div>
      </div>
  </div>
</section> --}}



@endsection