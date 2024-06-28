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
                          <img src="{{ asset ($homeproject->image)}}" alt="image" style=" width: 370px; height: 290px; object-fit: cover; ">
                          <a href="#" class="flash bg-theme1 white px-3 py-2"><i class="fa fa-flash"></i></a>
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
              <a class="nir-btn" href="{{ route('home.projects') }}">See more projectss</a>
            @endif
          </div>
      </div>
  </div>
</section>

{{-- Why Choose us --}}
<section class="about-us pb-5 pt-10">
  <div class="container">
      <div class="section-title mb-6 pb-1 w-75 mx-auto text-center">
        <h2 class="m-0">Why <span>Choose</span> Us?</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>

      <div class="about-image-box">
          <div class="row d-flex align-items-center justify-content-between">
              <div class="col-lg-6 col-sm-12 mb-4">
                  <div class="about-content">
                      <h4 class="bg-theme white px-4 py-1 d-inline-block">Core value</h4>
                      {{-- <h2 class="border-b mb-2 pb-2">Dream Living Spaces Setting New Build</h2> --}}
                      <p class="mb-0">
                        {!! ($whyChooseUs->core_values) !!}
                      </p>
                  </div>
              </div>
              <div class="col-lg-6 col-sm-12 mb-4">
                  <div class="about-image p-3 box-shadow">
                      <img src="{{ asset('assets/images/trending/trending5.jpg')}}" alt class="w-100">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-6 col-md-12 mb-4">
                  <div
                      class="trend-item box-shadow bg-white d-flex align-items-center justify-content-between p-3">
                      
                      <div class="trend-content-main w-75">
                          <div class="trend-content">
                              <h5 class="theme mb-1">Vision Statement</h5>
                              <p class="mb-0">{{ $whyChooseUs->vision }}</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6 mb-4">
                  <div
                      class="trend-item box-shadow bg-white d-flex align-items-center justify-content-between p-3">
                      
                      <div class="trend-content-main w-100">
                          <div class="trend-content">
                              <h5 class="theme mb-1">Mission Statement</h5>
                              <p class="mb-0">{{ $whyChooseUs->mission }} </p>
                          </div>
                      </div>
                  </div>
              </div>
              
          </div>
      </div>
  </div>
</section>


   <!-- Blog...-->
   <section class="section-lg bg-default text-center">
    <div class="container">
      <div class="row justify-content-lg-center">
        <div class="col-lg-10 col-xl-8">
          {{-- <h6>Our Updates </h6> --}}
          <h4>Latest Updates</h4>
        </div>
      </div>
      <div class="row row-30">
        @forelse ($posts as $post)
          <div class="col-sm-6 col-lg-4">
            <!-- Post-->
            <article class="product">
              <div class="product-media">
                <img style=" width: 370px; height: 290px;   object-fit: cover; " class="product-img" src="{{ asset ($post->image)}}" alt="" width="370" height="290"/>
              </div>
              <div class="product-body">
                <div class="product-title">
                  <h6>
                    <a href="{{ route('home.post.details', encrypt($post->id))}}">

                    <td>{!! Str::limit($post->title, 50) !!}</td>
                    </a>
                  </h6>
                </div>
                <div class="product-meta">
                 {{-- link-primary --}}
                  
                  <a class="button button-gray-light-outline" href="{{ route('home.post.details', encrypt($post->id))}}">see more</a>

                </div>
              </div> 
            </article>
          </div>
        @empty
            <p class="text-center">No Project Data available</p>
        @endforelse
      </div>
      @if ($posts)
        <a class="button button-primary" href="">See more projects</a>
      @endif
    </div>
  </section>

 

@endsection
