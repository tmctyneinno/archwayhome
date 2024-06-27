@extends('layouts.app')

@section('content')
   
   <!-- Swiper-->
   <section class="s">
    <div class="swiper-container swiper-slider swiper-slider_fullheight" data-simulate-touch="false" data-swiper='{"autoplay":{"delay":5500},"loop":true}'>
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
            <div class="swiper-slide bg-gray-darker text-center" data-slide-bg="{{ asset($slider->image) }}">
                <div class="swiper-slide-caption">
                    <div class="container">
                        <div class="row justify-content-lg-center">
                            <div class="col-lg-10 col-xl-10">
                                <h6 data-caption-animate="fadeInUpSmall" data-caption-delay="0">{{ $slider->title }}</h6>
                                <h1 data-caption-animate="fadeInUpSmall" data-caption-delay="100">{{ $slider->caption }}</h1>
                                <p class="swiper-caption-text" data-caption-animate="fadeInUpSmall" data-caption-delay="200">{{ $slider->additional_text }}</p>
                                @if ($slider->button_url)
                                  <a class="button button-primary" href="{{ $slider->button_url }}">{{ $slider->button_text }}!</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Swiper Pagination -->
        <div class="swiper-pagination"></div>
    </div>
   
</section>

  <!-- Project...-->
  <section class="section-lg bg-default text-center">
    <div class="container">
      <div class="row justify-content-lg-center">
        <div class="col-lg-10 col-xl-8">
          <h4>Our projects </h4>
        </div>
      </div>
      <div class="row row-30">
        @forelse ($homeprojects as $homeproject)
          <div class="col-sm-6 col-lg-4">
            <!-- Post-->
            <article class="product">
              <div class="product-media">
                <img class="product-img" src="{{ asset ($homeproject->image)}}" alt="" width="370" height="290"/>
                <div class="product-price">{{ $homeproject->land_size }}</div>
              </div>
              <div class="product-body">
                <div class="product-title">
                  <h5><a href="{{ route('home.project.details', encrypt($homeproject->id))}}">{{ $homeproject->title}}</a></h5>
                </div>
                <div class="product-meta">
                  <div class="group">
                    <span style="font-size: 16px">
                      <i class="lnr lnr-map-marker"></i>{{ $homeproject->location }},
                  </span>
                  </div>
                  
                  <a class="button button-gray-light-outline" href="{{ route('home.project.details', encrypt($homeproject->id))}}">View details</a>

                </div>
              </div> 
            </article>
          </div>
        @empty
            <p class="text-center">No Project Data available</p>
        @endforelse
      </div>
      @if ($homeprojects)
        <a class="button button-primary" href="{{ route('home.projects') }}">See more projectss</a>
      @endif
    </div>
  </section>
  
  <!-- Welcome to the Best Indianapolis Hotel!-->
  <section class="section-lg bg-100">
    <div class="container">
      <div class="row row-50 justify-content-center text-center">
        <div class="col-md-11 col-lg-9">
          <h6>Why Choose Us</h6>
          {{-- <h4>Best Real Estate Agency</h4> --}}
          <p>
            {{ $whyChooseUs->why_choose_us_statements}}
          </p>
         
        </div>

        <div class="row row-40 justify-content-center justify-content-lg-between align-items-center text-center text-lg-start">
          <div class="col-sm-8 col-md-6 col-lg-5 col-xxl-6">
            <div class="img-max-width-1"><img class="img-shadow mt-4 mt-md-0" src="{{ asset ('assets/images/home-07-500x530.jpg')}}" alt="" width="500" height="530"/>
            </div>
          </div>
          <div class="col-md-6">
            <h4>Our core value</h4>
            <p>
              {{ $whyChooseUs->core_values}}
            </p>

            <h4 class="mt-3">Mission</h4>
            <p>
              {{ $whyChooseUs->mission}}
            </p>

            <h4 class="mt-3">Vision</h4>
            <p>
              {{ $whyChooseUs->vision}}
            </p>

          </div>
        </div>
     
   
      </div>
    </div>
  </section>
  {{-- About us --}}
  <section class="section-lg bg-100">
    <div class="container">
      <div class="row row-50 justify-content-center align-items-lg-center justify-content-xl-between text-center text-lg-start">
        <div class="col-md-6">
          <h6> About us</h6>
          <h4>{{ $aboutUs->title}} </h4>
          <p>{{ $aboutUs->content}}</p>
          <a class="button button-primary" href="{{ route('about-us') }}">View more</a>
        </div>
        <div class="col-sm-8 col-md-6 col-lg-5 col-xxl-6 text-md-end">
          <div class="img-max-width-1">
            <img class="img-shadow" src="{{ $aboutUs->image}} " alt="" width="500" height="530">
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
