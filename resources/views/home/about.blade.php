@extends('layouts.app')

@section('content')
<section class="breadcrumbs-custom">
    <div class="container">
      <div class="breadcrumbs-custom__inner">
        <ul class="breadcrumbs-custom__path">
          <li><a href="index.html">Home</a></li>
          <li class="active">About Us</li>
        </ul>
      </div>
    </div>
  </section>
  <section class="bg-gray-dark text-center">
    <!-- RD Parallax-->
    <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="{{ asset('assets/images/parallax-1.jpg')}}">
      <div class="parallax-content bg-primary-layout">
        <div class="parallax-header__inner">
          <div class="parallax-header__content">
            <div class="container">
              <div class="row justify-content-sm-center">
                <div class="col-md-10 col-xl-8">
                  <h6>Who we are</h6>
                  <h2>A Few Words About Us</h2>
                  <p>Donec nec fermentum, sed pellentesque mauris mi tristique tortor amet. Tempor nec sit non cras tortor commodo. Nunc, ac enim turpis curabitur. At neque pellentesque porta integer. Fermentum ut tempus diam iaculis mauris eget condimentum nisl lectus. Vitae donec quam cras sit a tempor morbi augue.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Main info-->
  <section class="section-lg bg-100">
    <div class="container">
      <div class="row row-50 justify-content-center align-items-lg-center justify-content-xl-between text-center text-lg-start">
        <div class="col-md-6">
          <h6>About us</h6>
          <h4>Providing Best Properties Since 2011</h4>
          <p>Dignissim justo, quis porta dignissim est sit. Nibh imperdiet aliquam tellus massa blandit pharetra arcu. In lectus laoreet tempor sit laoreet amet vel vitae sed. Quis pretium fames vitae aliquet nec eu nibh. Sed donec facilisi tempus in libero, tellus turpis metus, et. Lectus urna, justo molestie at cursus purus. Molestie commodo aliquet pretium neque ut gravida. Pellentesque consectetur odio morbi eget odio tortor porttitor tortor, tellus. Ut placerat ipsum hendrerit.</p>
        </div>
        <div class="col-sm-8 col-md-6 col-lg-5 col-xxl-6 text-md-end">
          <div class="img-max-width-1"><img class="img-shadow" src="{{ asset('assets/images/about-01-500x530.jpg')}}" alt="" width="500" height="530"/>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Just a few reasons to choose-->
  <section class="section-md bg-accent text-center">
    <div class="container">
      <h6>Why People Choose Us</h6>
      <h4>We Offer Lots of Benefits</h4>
      <div class="row row-50 justify-content-md-center offset-top-2">
        <div class="col-6 col-md-3">
          <!-- Box icon-->
          <article class="box-icon"><span class="icon icon-primary icon-lg custom-font-wifi"></span>
            <h5 class="box-icon__title">Free Wi-Fi</h5>
          </article>
        </div>
        <div class="col-6 col-md-3">
          <!-- Box icon -->
          <article class="box-icon"><span class="icon icon-primary icon-lg custom-font-lock-outline"></span>
            <h5 class="box-icon__title">Protected Properties</h5>
          </article>
        </div>
        <div class="col-6 col-md-3">
          <!-- Box icon-->
          <article class="box-icon"><span class="icon icon-primary icon-lg custom-font-car-outline"></span>
            <h5 class="box-icon__title">Garages & Parking</h5>
          </article>
        </div>
        <div class="col-6 col-md-3">
          <!-- Box icon-->
          <article class="box-icon"><span class="icon icon-primary icon-lg custom-font-clock-outline"></span>
            <h5 class="box-icon__title">Long-term Rental</h5>
          </article>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials-->
  <section class="section-md bg-default text-center">
    <div class="container">
      <h4>Our Agents</h4>
      <div class="row row-50">
        <div class="col-sm-6 col-md-4">
          <div class="thumb thumb-corporate">
            <div class="thumb-corporate__main"><img src="{{ asset('assets/images/person-02-370x350.jpg')}}" alt="" width="370" height="350"/>
            </div>
            <div class="thumb-corporate__caption">
              <h5 class="thumb__title"><a href="#">Michael Rutter</a></h5>
              <p class="thumb__subtitle">Certified Real Estate Broker</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="thumb thumb-corporate">
            <div class="thumb-corporate__main"><img src="{{ asset('assets/images/person-03-370x350.jpg')}}" alt="" width="370" height="350"/>
            </div>
            <div class="thumb-corporate__caption">
              <h5 class="thumb__title"><a href="#">Janet Richmond</a></h5>
              <p class="thumb__subtitle">Residential Real Estate Broker</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="thumb thumb-corporate">
            <div class="thumb-corporate__main"><img src="{{ asset('assets/images/person-04-370x350.jpg')}}" alt="" width="370" height="350"/>
            </div>
            <div class="thumb-corporate__caption">
              <h5 class="thumb__title"><a href="#">Carl Parker</a></h5>
              <p class="thumb__subtitle">Real Estate Broker</p>
            </div>
          </div>
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
          <div class="quote-default__image"><img src="{{ asset('assets/images/person-01-100x100.jpg')}}" alt="" width="100" height="100"/>
          </div>
          <div class="quote-default__text">
            <p class="q">“I’ve recently rented an apartment through your site, and have been looked after by James Thompson. He provided me with the utmost support on every property issue. I will surely recommend your services to my friends!”</p>
          </div>
          <p class="quote-default__cite heading-5">Jane Wilson</p>
        </div>
        <div class="quote-default">
          <div class="quote-default__image"><img src="{{ asset('assets/images/person-05-100x100.jpg')}}" alt="" width="100" height="100"/>
          </div>
          <div class="quote-default__text">
            <p class="q">“Your property managers have been active in their response to repairs and always patient with our frustrations. You have always found us wonderful tenants. Thank you for the amazing customer service!”</p>
          </div>
          <p class="quote-default__cite heading-5">Mark Simmons</p>
        </div>
        <div class="quote-default">
          <div class="quote-default__image"><img src="{{ asset('assets/images/person-06-100x100.jpg')}}" alt="" width="100" height="100"/>
          </div>
          <div class="quote-default__text">
            <p class="q">“I have always found your team to be extremely prompt and professional with all dealings I have had with them. You always keep me updated on the progress of my apartment’s rental. Thank you!”</p>
          </div>
          <p class="quote-default__cite heading-5">Peter Smith</p>
        </div>
      </div>
    </div>
  </section>
  
@endsection