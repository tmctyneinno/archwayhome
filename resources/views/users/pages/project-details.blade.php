@extends('layouts.app')

@section('content')

<section class="breadcrumb-main pb-0 pt-20" style="background-image: url({{ asset($aboutUs->header_image) }});">
  <div class="breadcrumb-outer">
      <div class="container">
          <div class="breadcrumb-content d-md-flex align-items-center pt-6">
              <h1 class="mb-0">{{ $projectDetails->title }}</h1>
              <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Project details</li>
                  </ul>
              </nav>
          </div>
      </div>
  </div>
  <br>
  <div class="dot-overlay"></div>
</section>
 
<section class="blog">
  <div class="container">
      <div class="row flex-row-reverse">
          <div class="col-lg-12">
              <div class="detail-maintitle border-b pb-4 mb-4">
                  <div class="row align-items-center justify-content-between">
                      <div class="col-lg-6">
                          <ul class="detail-inline d-flex align-items-center mb-2">
                              <li class="detail-inline-item bg-theme1 px-4 py-1 white me-3">Survey/Deed of Assignment </li>
                              <li class="detail-inline-item bg-theme px-4 py-1 white me-3"> {{ $projectDetails->projectMenu->name }} </li>
                              {{-- <li class="detail-inline-item"><i class="fa fa-clock me-1"></i>1 months ago --}}
                              </li>
                          </ul>
                         
                      </div>
                        @php
                        if($projectDetails->land_size) {
                        @endphp
                            <div class="col-lg-3">
                                <div class="entry-price text-lg-end text-start">
                                    <h3 class="mb-0">
                                        <span class="d-block theme fs-5 fw-normal">{{ $projectDetails->land_size }}</span>
                                        ₦{{ $projectDetails->land_price }}
                                    </h3>
                                </div>
                            </div>
                        @php
                            }
                        @endphp
                        @php
                        if($projectDetails->land_size) {
                        @endphp
                            <div class="col-lg-3">
                                <div class="entry-price text-lg-end text-start">
                                    <h3 class="mb-0">
                                        <span class="d-block theme fs-5 fw-normal">{{ $projectDetails->second_land_size }}</span>
                                        ₦{{ $projectDetails->second_land_price }}
                                    </h3>
                                </div>
                            </div>
                        @php
                            }
                        @endphp
                  </div>
              </div>
          </div>
          <div class="col-lg-8">
              <div class="blog-single">
                  <div class="blog-wrapper">
                      <div class="blog-content first-child-cap">
                        <div class="detail-maintitle-in">
                            <h3 class="mb-1">{{ $projectDetails->sub_title }}</h3>
                            <p><i class="fa fa-map-marker-alt me-2"></i>{{ $projectDetails->location }}</p>
                        </div>
                          <p class="mb-3">
                            {!! $projectDetails->content !!}
                          </p>
                          <div class="position-relative mb-3">
                            <img src="{{ asset($projectDetails->image) }}" alt="image">
                          </div>
                          
                      </div>
                      <div class="property-detail mb-4 bg-lgrey p-4 border">
                          <h4 class="border-b pb-2">Property Details</h4>
                          <div class="row">
                              <div class="col-lg">
                                  <ul class="pro-inline-item">
                                    @php
                                    if($projectDetails->land_size && $projectDetails->land_price) {
                                    @endphp
                                        <li class="d-block fw-bold lh-lg">First Property Size : 
                                            <span class="fw-normal float-end">{{  $projectDetails->land_size}}</span>
                                        </li>
                                        <li class="d-block fw-bold lh-lg">First Property Price : 
                                            <span class="fw-normal float-end">₦{{ $projectDetails->land_price}}</span>
                                        </li>
                                        <li class="detail-inline-item bg-theme1 px-4 py-1 white me-3 mb-2">
                                            <a href="{{ asset($projectDetails->land_payment_plan) }}" data-lightbox="gallery" class="white"> Payment Plan</a>
                                        </li>
                                    
                                    @php
                                        }
                                    @endphp
                                    
                                  </ul>
                              </div>
                              <div class="col-lg">
                                  <ul class="pro-inline-item">
                                    @php
                                    if($projectDetails->land_size && $projectDetails->land_price) {
                                    @endphp
                                        <li class="d-block fw-bold lh-lg">Second Property Size : 
                                            <span class="fw-normal float-end">{{  $projectDetails->second_land_size}}</span>
                                        </li>
                                        <li class="d-block fw-bold lh-lg">Second Property Price : 
                                            <span class="fw-normal float-end">₦{{ $projectDetails->second_land_price}}</span>
                                        </li>
                                        <li class="detail-inline-item bg-theme1 px-4 py-1 white me-3 mb-2">
                                            <a href="{{ asset($projectDetails->second_land_payment_plan) }}" data-lightbox="gallery" class="white"> Payment Plan</a>
                                        </li>
                                    
                                    @php
                                        }
                                    @endphp
                                    
                                  </ul>
                              </div>
                              <ul class="pro-inline-item">
                                <li class="detail-inline-item bg-theme1 px-4 py-1 white me-3">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#bookInspectionModal" class="white me-2">
                                      Book a Tour
                                    </a>
                                </li>
                                <li>
                                    @php
                                    if($projectDetails->subscription_form) {
                                    @endphp
                                        <li class="detail-inline-item bg-theme1 px-4 py-1 white me-3 mb-2">
                                            <a href="{{ asset($projectDetails->subscription_form) }}" target="_blank" class="white"> View Subscription Form</a>
                                        </li>
                                    @php
                                        }
                                    @endphp
                                </li>
                              </ul>
                          </div>
                      </div>
                      {{-- <div class="property-detail mb-4 bg-grey p-4">
                          <h4 class="border-bottom pb-2">Offices Amenities</h4>
                          <div class="row">
                              <div class="col-lg">
                                  <ul class="pro-inline-item">
                                      <li class="d-block lh-lg"><i class="fa fa-check theme"></i> Electricity</li>
                                      <li class="d-block lh-lg"><i class="fa fa-check theme"></i> Water
                                      </li>
                                      <li class="d-block lh-lg"><i class="fa fa-check theme"></i> Gated Community</li>
                                      <li class="d-block lh-lg"><i class="fa fa-check theme"></i> Maximum Security</li>
                                  </ul>
                              </div>
                              <div class="col-lg">
                                  <ul class="pro-inline-item">
                                      <li class="d-block lh-lg"><i class="fa fa-check theme"></i> Good Drainage</li>
                                      <li class="d-block lh-lg"><i class="fa fa-check theme"></i> Sola-powered Street Light</li>
                                      <li class="d-block lh-lg"><i class="fa fa-check theme"></i> Lawn</li>
                                      <li class="d-block lh-lg"><i class="fa fa-check theme"></i> Dishwasher</li>
                                  </ul>
                              </div>
                              <div class="col-lg">
                                  <ul class="pro-inline-item">
                                      <li class="d-block lh-lg"><i class="fa fa-check theme"></i> Microwave</li>
                                      <li class="d-block lh-lg"><i class="fa fa-check theme"></i> TV Cable</li>
                                      <li class="d-block lh-lg"><i class="fa fa-check theme"></i> WiFi</li>
                                      <li class="d-block lh-lg"><i class="fa fa-check theme"></i> Refrigerator
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div> --}}
                     

                  </div>

              
               
              </div>
          </div>

          <div class="col-lg-4 col-md-12">
              <div class="sidebar-sticky">
                  <div class="list-sidebar">
                      <div class="sidebar-item mb-4 box-shadow p-4 text-centerb">
                          <h3>Find your Project</h3>
                          <form class="form-find">
                              <div class="form-group mb-2">
                                  <input type="text" placeholder="Enter Keywords">
                              </div>
                              <div class="form-group mb-2">
                                  <div class="input-box">
                                      <select class="niceSelect">
                                          <option value="1">Lagos</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group mb-2">
                                  <div class="input-box">
                                      <select class="niceSelect">
                                          <option disabled selected>All Types</option>
                                          @foreach ($projects as $project)
                                              <option value="{{ $project->title}}">{{ $project->title}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                             
                              <div class="form-group text-center w-100">
                                  <input type="submit" class="nir-btn w-100" id="submit3" value="Search">
                              </div>
                          </form>
                      </div>
                      <div class="sidebar-item trending">
                          <h3 class>Related Project</h3>
                          <div class="trend-box">
                              <div class="about-slider">
                                @forelse ($relatedProject as $relatedProject)
                                  <div>
                                      <div class="trend-item box-shadow">
                                        <div class="trend-image">
                                            <img src="{{ asset($relatedProject->image) }}" alt="{{ $relatedProject->title }}" class="img-fluid" style="object-fit: contain; width: 100%; height: 300px;">
                                            <div
                                              class="trend-meta align-items-center ">
                                             
                                              <a href="{{ route('home.project.details', encrypt($project->id))}}" class="tags bg-theme2 white px-3 py-1">
                                                {{ $project->projectMenu->name  }}
                                              </a>
                                          </div>
                                        </div>
                                        
                                        
                                          <div class="trend-content p-4">
                                              <h4><a href="{{ route('home.project.details', encrypt($relatedProject->id))}}">{{ $relatedProject->title}}</a>
                                              </h4>
                                              
                                              <p class="mb-0">
                                                {!! Str::limit($relatedProject->content, 50) !!}
                                              </p>
                                          </div>
                                       
                                      </div>
                                  </div>
                                @empty
                                  <p class="text-center">No Project Data available</p>
                                @endforelse
                              </div>
                          </div>
                      </div>
                      {{-- <div class="sidebar-item top-post">
                          <h3>Popular Destination</h3>
                          <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                  <div class="trend-item">
                                      <div class="trend-image">
                                          <img src="images/destination/destination13.jpg" alt="image">
                                          <div class="trend-content pt-2">
                                              <h6 class="mb-0"><a href="listing-leftfilter.html">Los Angeles</a>
                                              </h6>
                                              <span>28 Properties</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                  <div class="trend-item">
                                      <div class="trend-image">
                                          <img src="images/destination/destination14.jpg" alt="image">
                                          <div class="trend-content pt-2">
                                              <h6 class="mb-0"><a href="listing-leftfilter.html">New York</a></h6>
                                              <span>45 Properties</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                  <div class="trend-item">
                                      <div class="trend-image">
                                          <img src="images/destination/destination15.jpg" alt="image">
                                          <div class="trend-content pt-2">
                                              <h6 class="mb-0"><a href="listing-leftfilter.html">Florida</a></h6>
                                              <span>32 Properties</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6">
                                  <div class="trend-item">
                                      <div class="trend-image">
                                          <img src="images/destination/destination16.jpg" alt="image">
                                          <div class="trend-content pt-2">
                                              <h6 class="mb-0"><a href="listing-leftfilter.html">Texas</a></h6>
                                              <span>51 Properties</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div> --}}
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

 




@endsection