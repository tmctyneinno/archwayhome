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

  <!-- Plenty of room...-->
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
        <a class="button button-primary" href="">See more projects</a>
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

  <section class="section-md bg-100 text-center">
    <div class="container">
      <h6>Why choose us</h6>
      <h4>6 Reasons to Choose Estancy</h4>
      <p><span style="display:inline-block;max-width:850px">Annually, thousands of clients choose Estancy as their real estate agency. Besides having years of experience in real estate industry, there is a variety of reasons why residents over the world choose us. Here are just some of them.</span></p>
      <div class="row row-30 row-xl-50 row-xxl-80 justify-content-md-center">
        <div class="col-sm-6 col-md-4">
          <!-- Box icon-->
          <article class="blurb blurb-rounded">
            <div class="blurb-rounded__icon icon custom-font-broker"></div>
            <h6 class="blurb-rounded__title">Professional &amp; Friendly Agents</h6>
            <p class="blurb-rounded__text">Our agents are experienced and understanding experts who deliver fresh and effective solutions.
        </p>
          </article>
        </div>
        <div class="col-sm-6 col-md-4">
          <!-- Box icon-->
          <article class="blurb blurb-rounded">
            <div class="blurb-rounded__icon icon custom-font-location"></div>
            <h6 class="blurb-rounded__title">Property from Anywhere</h6>
            <p class="blurb-rounded__text">With Estancy, you can search for a desired property from any location.</p>
          </article>
        </div>
        <div class="col-sm-6 col-md-4">
          <!-- Box icon-->
          <article class="blurb blurb-rounded">
            <div class="blurb-rounded__icon icon custom-font-bedroom"></div>
            <h6 class="blurb-rounded__title">Well-furnished Interiors</h6>
            <p class="blurb-rounded__text">All our properties are furnished and decorated to meet your  needs and expectations.</p>
          </article>
        </div>
        <div class="col-sm-6 col-md-4">
          <!-- Box icon-->
          <article class="blurb blurb-rounded">
            <div class="blurb-rounded__icon icon custom-font-customer-support"></div>
            <h6 class="blurb-rounded__title">Get support when you need it</h6>
            <p class="blurb-rounded__text">Estancy’s support experts are always ready to help you and answer your questions.</p>
          </article>
        </div>
        <div class="col-sm-6 col-md-4">
          <!-- Box icon-->
          <article class="blurb blurb-rounded">
            <div class="blurb-rounded__icon icon custom-font-insurance"></div>
            <h6 class="blurb-rounded__title">Checked &amp; Pre-inspected Properties</h6>
            <p class="blurb-rounded__text">All our  properties are inspected to make sure they meet all standards and state regulations.</p>
          </article>
        </div>
        <div class="col-sm-6 col-md-4">
          <!-- Box icon-->
          <article class="blurb blurb-rounded">
            <div class="blurb-rounded__icon icon custom-font-wallet"></div>
            <h6 class="blurb-rounded__title">Affordable Property Pricing</h6>
            <p class="blurb-rounded__text">We offer reasonable pricing policy on all our residential properties across the USA.</p>
          </article>
        </div>
      </div>
    </div>
  </section>

  <!-- Offers-->
  <section class="section-lg bg-default">
    <div class="container">
      <div class="row row-40 justify-content-center justify-content-lg-between align-items-center text-center text-lg-start">
        <div class="col-sm-8 col-md-6 col-lg-5 col-xxl-6">
          <div class="img-max-width-1"><img class="img-shadow mt-4 mt-md-0" src="{{ asset ('assets/images/home-07-500x530.jpg')}}" alt="" width="500" height="530"/>
          </div>
        </div>
        <div class="col-md-6">
          <h6>Featured offer</h6>
          <h4>Rent a New Apartment <br/>Get FREE Furniture</h4>
          <p>That's correct! We're so determined to make your experience at our properties better that we will even provide you with free furniture from the store of your choice!</p>
          <h5>Prices start at</h5>
          <div class="price"><span class="price__aside-top">$</span><span class="price__main">249</span><span class="price__aside-bottom">/month</span></div>
          <a class="button button-primary" href="single-property.html">Rent now!</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials-->
  <section class="section-md bg-accent-secondary context-dark text-center">
    <div class="container">
      <h6>WHAT OUR CLIENTS SAY</h6>
      <h4>Testimonials</h4>
      <div class="owl-carousel" data-autoplay="true" data-items="1" data-stage-padding="15" data-loop="true" data-margin="30" data-dots="false">
        <div class="quote-default">
          <div class="quote-default__image"><img src="{{ asset ('assets/images/person-01-100x100.jpg')}}" alt="" width="100" height="100"/>
          </div>
          <div class="quote-default__text">
            <p class="q">“I’ve recently rented an apartment through your site, and have been looked after by James Thompson. He provided me with the utmost support on every property issue. I will surely recommend your services to my friends!”</p>
          </div>
          <p class="quote-default__cite heading-5">Jane Wilson</p>
        </div>
        <div class="quote-default">
          <div class="quote-default__image"><img src="{{ asset ('assets/images/person-05-100x100.jpg')}}" alt="" width="100" height="100"/>
          </div>
          <div class="quote-default__text">
            <p class="q">“Your property managers have been active in their response to repairs and always patient with our frustrations. You have always found us wonderful tenants. Thank you for the amazing customer service!”</p>
          </div>
          <p class="quote-default__cite heading-5">Mark Simmons</p>
        </div>
        <div class="quote-default">
          <div class="quote-default__image"><img src="{{ asset ('assets/images/person-06-100x100.jpg')}}" alt="" width="100" height="100"/>
          </div>
          <div class="quote-default__text">
            <p class="q">“I have always found your team to be extremely prompt and professional with all dealings I have had with them. You always keep me updated on the progress of my apartment’s rental. Thank you!”</p>
          </div>
          <p class="quote-default__cite heading-5">Peter Smith</p>
        </div>
      </div>
    </div>
  </section>
  <!-- Offers-->
  <section class="section-lg bg-default">
    <div class="container">
      <div class="row row-40 flex-md-row-reverse justify-content-center justify-content-lg-between align-items-center text-center text-md-start">
        <div class="col-sm-8 col-md-6 col-lg-5 col-xxl-6">
          <div class="img-max-width-1"><img class="img-shadow mt-4 mt-md-0" src="{{ asset ('assets/images/home-08-500x530.jpg')}}" alt="" width="500" height="530"/>
          </div>
        </div>
        <div class="col-md-6 col-xxl-5">
          <h6>From the blog</h6>
          <h4>Recent Posts</h4>
          <ul class="list-md">
            <li>
              <!-- Post inline-->
              <article class="post-inline">
                <div class="post-inline__header"><a class="post-inline__author meta-author link-inherit" href="single-post.html">by Calvin Fitzgerald</a><span class="post-inline__time">Jun 12, 2021</span></div>
                <h5 class="post-inline__link"><a href="single-post.html">Home Inspections: How They Can Benefit Home Buyers and Sellers</a></h5>
              </article>
            </li>
            <li>
              <!-- Post inline-->
              <article class="post-inline">
                <div class="post-inline__header"><a class="post-inline__author meta-author link-inherit" href="single-post.html">by Calvin Fitzgerald</a><span class="post-inline__time">Jun 12, 2021</span></div>
                <h5 class="post-inline__link"><a href="single-post.html">Useful Tips for Buying and Selling A Home During the World Pandemic</a></h5>
              </article>
            </li>
            <li>
              <!-- Post inline-->
              <article class="post-inline">
                <div class="post-inline__header"><a class="post-inline__author meta-author link-inherit" href="single-post.html">by Calvin Fitzgerald</a><span class="post-inline__time">Jun 12, 2021</span></div>
                <h5 class="post-inline__link"><a href="single-post.html">What Should You Consider When Refinancing Your Mortgage?</a></h5>
              </article>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- Page Footer-->

@endsection
