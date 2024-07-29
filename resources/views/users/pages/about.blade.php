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
  <br>
  <div class="dot-overlay"></div>
</section>

<section class="about-us pb-3">
  <div class="container">
      <div class="about-image-box">
         
            <div class="row d-flex align-items-center justify-content-between text-lg-start text-center">
                <div class="col-lg-7 col-sm-12 mb-2">
                    <div class="about-content">
                        <h4 class="theme d-inline-block">Executive Summary</h4>
                    
                        {{-- <h3 class="border-b mb-2 pb-2">{{$aboutUs->title}}</h3> --}}
                        <p class="border-b mb-2 pb-2 text-justify " >
                        {!! ($executiveSummary->content) !!}
                   
                        </p>
                        
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12 mb-4">
                    <div class="about-image p-3 box-shadow position-relative d-flex justify-content-center align-items-center">
                        <img src="{{ asset($executiveSummary->image)}}" alt class="w-50 ">
                    
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
@include('users.pages.core_value')
@include('users.pages.services')
@include('users.pages.why_choose_us_aboutus')

    
  
  {{-- Your existing Blade section --}}
  <section class="our-team " style="background-image: url({{ asset('assets/images/shape-1.png') }});">
    <div class="container">
      <div class="section-title mb-6 pb-1 w-75 text-center mx-auto">
        <h2 class="m-0"> Our <span>Team </span></h2>
      </div>
      <div class="team-main  animation">
        <div class="row shop-slider">
          @forelse ($teams as $team)
          <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="team-list">
              <div class="team-image">
                <img src="{{ asset($team->image) }}" alt="team" style=" width: 320px; height: 400;   object-fit: cover; ">
              </div>
              <div class="team-content text-center p-3 bg-white">
                <h4 class="mb-0 text-uppercase"><a href="{{ route('users.team.detail', encrypt($team->id))}}">{{$team->name}}</a></h4>
                <p class="mb-0 text-uppercase">{{$team->position}}</p>
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
  
  
  





@endsection