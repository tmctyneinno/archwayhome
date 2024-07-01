@extends('layouts.app')

@section('content')
   
<section class="banner overflow-hidden">
  <div class="slider top50">
      <div class="swiper-container">
          <div class="swiper-wrapper">
              @foreach ($sliders as $sliderItem)
                  <div class="swiper-slide">
                      <div class="slide-inner">
                          <div class="slide-image" style="background-image:url({{ asset($sliderItem->image) }})"></div>
                          <div class="swiper-content">
                              <div class="entry-meta mb-2">
                                  <span class="entry-category">
                                    <a href="" class="white">
                                      {{ $sliderItem->title }}
                                    </a>
                                  </span>
                              </div>
                              <h1 class="mb-2"><a href="{{ $sliderItem->button_url }}" class="white">{{ $sliderItem->title}}</a></h1>
                              
                              <p class="white mb-4">{{ $sliderItem->caption }}</p>

                              {{-- <a href="{{ $sliderItem->button_url  }}" class="nir-btn">{{ $sliderItem->additional_text }}</a> --}}

                              @if ($sliderItem->button_url)
                                  <a href="{{ $sliderItem->button_url }}" class="nir-btn-black">{{ $sliderItem->button_text }}</a>
                              @endif
                          </div>
                          <div class="overlay"></div>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
  </div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
</section>

<section class="about-us bg-white pb-6 pt-10">
  <div class="container">
      <div class="section-title mb-6 pb-1 w-75 text-center mx-auto">
          <h2 class="m-0">Our Core <span>Services</span></h2>
          <p>
            At Archway Homes and Investment Limited, we offer a comprehensive suite of services designed to meet the diverse needs of our clients. Our expertise and innovative approaches ensure exceptional value across all areas of real estate. Here’s a brief overview of our key services:
          </p>
      </div>

      <div class="why-us">
          <div class="why-us-box">
              <div class="row">
                @foreach ($services as $service)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="why-us-item text-center bg-lgrey">
                        <div class="why-us-icon">
                            <i class="{{ $service->icon_class }} theme"></i>
                        </div>
                        <div class="why-us-content">
                            <h3><a href="{{ route('service.detail', $service->id) }}">{{ $service->title }}</a></h3>
                            <p class="mb-0">{{ $service->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
              </div>
          </div>
      </div>

  </div>
</section>

<!-- Project...-->
<section class="trending bg-grey pt-9">
  <div class="container">
      <div class="section-title mb-6 pb-1 w-75 mx-auto text-center">
          <h2 class="m-0">Our <span>Projects</span></h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <div class="trend-box">
          <div class="row">
            @forelse ($homeprojects as $homeproject)
              <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                  <div class="trend-item box-shadow rounded">
                      <div class="trend-image">
                          <img src="{{ asset ($homeproject->image)}}" alt="{{ $homeproject->title}}" style=" width: 400px; height: 290px; object-fit: cover; ">
                          <div class="trend-meta d-flex align-items-center justify-content-between">
                              <div class="entry-author">
                                <i class="flaticon-location-pin theme"></i>
                                  <span>{{ $homeproject->location }}</span>
                              </div>
                              <a href="{{ route('home.project.details', encrypt($homeproject->id))}}" class="tags bg-theme2 white px-3 py-1">{{ $homeproject->projectMenu->name  }}</a>
                          </div>
                      </div>
                      <div class="trend-content p-4 bg-white">
                          <h4><a href="{{ route('home.project.details', encrypt($homeproject->id))}}">{{ $homeproject->title}}</a>
                          </h4>
                          <p class="mb-0">
                            {!! Str::limit($homeproject->content, 30) !!}
                          </p>
                      </div>
                      <ul class="d-flex align-items-center justify-content-between bg-lgrey p-3 px-4">
                          {{-- <li class="me-2"><i class="fa fa-eye"></i> 3 Beds</li> --}}
                          {{-- <li class="me-2"><i class="fa fa-heart"></i> 2 Baths</li> --}}
                          <li><i class="fa fa-comments"></i>{{ $homeproject->land_size }}</li>
                      </ul>
                  </div>
              </div>
            @empty
              <p class="text-center">No Project Data available</p>
            @endforelse
             
          </div>
          <div class="trend-btn text-center">
            @if ($homeprojects)
              <a class="nir-btn" href="{{ route('home.pages', 'projects') }}">See more projectss</a>
            @endif
          </div>
      </div>
  </div>
</section>

{{-- Why Choose us --}}
@include('users.pages.why_choose_us')


{{-- Latest update --}}
<section class="top-post pt-0">
  <div class="container">
      <div class="section-title mb-6 pb-1 w-75 mx-auto text-center">
          <h2 class="m-0">Latest <span>Update</span></h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <div class="row team-slider">
        @forelse ($posts as $post)
          <div class="col-lg-4">
              <div class="trend-item">
                  <div class="trend-image">
                      <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" style=" width: 376px; height: 251px;   object-fit: cover; ">
                      <div class="trend-content p-4 bg-lgrey border-b">
                          <h5 class="theme">{{ $post->category }}</h5>
                          <h4><a href="{{ route('post-details',  encrypt($post->id) ) }} ">
                            {{ Str::limit($post->title, 30) }}
                          </a></h4>
                          <p class="mb-2">{{ $post->excerpt }}</p>
                          <div class="entry-meta d-flex align-items-center justify-content-between border-t pt-2">
                             
                              <div class="entry-metalist">
                                  <small><i class="fa fa-calendar"></i> {{ date('d M Y', strtotime($post->created_at)) }}</small>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
      </div>
      <div class="mt-6 pb-1 w-75 mx-auto text-center">
        @if ($posts)
          <a class="nir-btn mx-auto text-center" href="{{ route('home.pages', 'blog') }}">See more post</a>
        @endif
      </div>
    
  </div>
  
</section>




 

@endsection
