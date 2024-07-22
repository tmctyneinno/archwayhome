@extends('layouts.app')

@section('content')
<section class="breadcrumb-main pb-0 pt-20" style="background-image: url({{ asset($aboutUs->header_image) }});">
  <div class="breadcrumb-outer">
      <div class="container">
          <div class="breadcrumb-content d-md-flex align-items-center pt-6">
              <h1 class="mb-0">Projects</h1>
              <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Projects</li>
                  </ul>
              </nav>
          </div>
      </div>
  </div>
  <br>
  <div class="dot-overlay"></div>
</section>

<section class="blog trending">
  <div class="container">
      <div class="listing-main listing-main1">
         
          <div class="trend-box">
             
              <div class="row">
                @forelse ($projectMenus as $projectMenu)
                  <div class="col-lg-4 col-md-6 mb-4">
                      <div class="trend-item box-shadow rounded">
                          <div class="trend-image">
                              <img src="{{ asset( $projectMenu->image ) }}" alt="{{ $projectMenu->name }}" style="width: 800px; height: 350px; object-fit: cover;">
                              <div class="trend-meta d-flex align-items-center justify-content-between">
                                <a href="{{ route('users.projects.type',  $projectMenu->slug ) }}" class="tags bg-theme2 white px-3 py-1">
                                  {{ $projectMenu->name }}
                              </a>
                              </div>
                          </div>
                          <div class="trend-content p-4 bg-white">
                            <h5 class="theme"><a href="{{ route('users.projects.type',  $projectMenu->slug ) }}">Click to Explore </a></h5>
                            {{-- <h4><a href="detail-leftside.html">425 Vine 012 Street, Montreal Canada, UHW45Q</a></h4> --}}
                           
                         </div>
                          
                         
                      </div>
                  </div>
                @empty
                  <p>No Project Menu</p>
                @endforelse
                
                 
              </div>
            
          </div>
      </div>
  </div>
</section>

 

   







@endsection