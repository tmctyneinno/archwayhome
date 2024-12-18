@extends('layouts.app')

@section('content')
   
<section class="banner overflow-hidden">
  <div class="slider top50">
      <div class="swiper-container">
          <div class="swiper-wrapper">
              @foreach ($sliders as $sliderItem)
                  <div class="swiper-slide">
                      <div class="slide-inner">
                          <div class="slide-image" style="background-image:url({{ asset($sliderItem->image) }}); " ></div>
                            <div class="swiper-content">
                                {{-- <div class="entry-meta mb-2">
                                    <span class="entry-category">
                                      <a href="" class="white">
                                        {{ $sliderItem->title }}
                                      </a>
                                    </span> 
                                </div> --}}
                                {{-- <h2 class="mb-2"><a href="{{ $sliderItem->button_url }}" class="white">{{ $sliderItem->caption}}</a></h2> --}}
             
                                {{-- @if ($sliderItem->button_url)
                                    <a href="{{ $sliderItem->button_url }}" class="nir-btn-black">{{ $sliderItem->button_text }}</a>
                                @endif --}}
                            </div> 
                            {{-- <div class="overlay"></div> --}}
                          {{-- </div> --}}
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
  </div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
</section>

@include('users.pages.services')

<!-- Project...-->
<section class="trending bg-grey pt-9">
  <div class="container">
      <div class="section-title mb-6 pb-1 w-75 mx-auto text-center">
          <h2 class="m-0">Our <span>Projects</span></h2>
          {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> --}}
      </div>
      <div class="trend-box">
          <div class="row">
            @forelse ($homeprojects as $homeproject)
              <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                  <div class="trend-item box-shadow rounded">
                      <div class="trend-image">
                          <img src="{{ asset ($homeproject->image_banner)}}"  class="img-fluid" alt="{{ $homeproject->title}}" style=" width: 100%; height: 300px; object-fit: cover; ">
                          <div class="trend-meta d-flex align-items-center justify-content-between">
                              
                              <a href="{{ route('home.project.details', encrypt($homeproject->id))}}" class="tags bg-theme2 white px-3 py-1">{{ $homeproject->projectMenu->name  }}</a>
                          </div>
                      </div>
                      
                      <div class="trend-content p-4 bg-white">
                          <h4><a href="{{ route('home.project.details', encrypt($homeproject->id))}}">{{ $homeproject->title}}</a>
                          </h4>
                          <p class="mb-0">
                            {!! Str::limit($homeproject->content, 50) !!}
                          </p>
                          <a href="{{ $homeproject->video_link}}">{{ $homeproject->video_link}}</a>
                         
                      </div>
                      
                  </div>
              </div>
            @empty
              <p class="text-center">Coming soon</p>
            @endforelse
             
          </div>
          <div class="trend-btn text-center">
            @if (empty($homeprojects))
              <a class="nir-btn" href="{{ route('home.pages', 'projects') }}">See more projects</a>
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
          {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> --}}
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
        @empty
            <p class="text-center">Coming soon</p>
        @endforelse
   
         
      </div>
      <div class="mt-6 pb-1 w-75 mx-auto text-center">
        @if (empty($homeprojects))
          <a class="nir-btn mx-auto text-center" href="{{ route('home.pages', 'blog') }}">See more posts</a>
        @endif
      
      </div>
    
  </div>
  
</section>




 

@endsection
