@extends('layouts.app')

@section('content')
    <section class="breadcrumbs-custom">
        <div class="container">
        <div class="breadcrumbs-custom__inner">
            <ul class="breadcrumbs-custom__path">
            <li><a href="index.html">Home</a></li>
            <li class="active">Projects</li>
            </ul>
        </div>
        </div>
    </section>

    <section class="bg-gray-dark text-center">
    <!-- RD Parallax-->
    <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="{{ asset ('assets/images/parallax-3.jpg')}}">
        <div class="parallax-content bg-primary-layout">
        <div class="parallax-header__inner">
            <div class="parallax-header__content">
            <div class="container">
                <div class="row justify-content-sm-center">
                <div class="col-md-10 col-xl-8">
                    <h2>Projects</h2>
                    <p>
                      At Arckway home, we deliver value at its peak 
                    </p>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>

    <section class="section-lg bg-default text-center">
      <div class="container">
        
        <div class="row row-40">
          @forelse ($projectMenus as $projectMenu)
            <div class="col-sm-6 col-lg-4">
              <!-- Post-->
              <article class="product">
                <div class="product-media">
                  <img class="product-img" src="{{ asset ('assets/images/home-04-370x290.jpg')}}" alt="" width="370" height="290">
              
                </div>
                <div class="product-body">
                  <div class="product-title">
                    <h5><a href="{{ route('home.projects.type',  $projectMenu->slug ) }}" previewlistener="true">{{ $projectMenu->name }}</a></h5>
                  </div>
                 
                </div>
              </article>
            </div>
          @empty
              <p>No Project Menu</p>
          @endforelse
         
          
        </div>
      </div>
    </section>

    <!-- Single Property-->
    <section class="section-lg bg-default text-center text-md-start">
        <div class="container py-3 py-md-0">
         
          <div class="row row-30 row-offset-md justify-content-center justify-content-lg-between flex-md-row-reverse">
            <div class="col-sm-10 col-md-6 col-xxl-7 text-md-end">
              <div class="img-max-width-1"><img class="img-shadow-left-gray" src="{{ asset ('assets/images/properties-02-600x480.jpg')}}" alt="" width="600" height="480"/>
              </div>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-5 col-xxl-5">
              <h4><a href="single-property.html">623 Willow Rd, Dallas</a></h4>
              <p class="small">Nibh eu quam est eu justo, dictum nam nam id. Tristique ut feugiat sit lacinia eu tortor sed. Eget nisi tellus faucibus sollicitudin suspendisse sodales. Turpis dis ut at velit nullam tortor. Ullamcorper.</p>
              <h5>Prices start at</h5>
              <div class="price"><span class="price__aside-top">$</span><span class="price__main">145</span><span class="price__aside-bottom">/month</span></div>
              <ul class="list-inline-md text-style">
                <li>
                  <div class="unit flex-row unit-spacing-md align-items-center">
                    <div class="unit-left"><span class="icon icon-black icon-md-1 custom-font-bedroom"></span></div>
                    <div class="unit-body">
                      <p>1 Bedroom</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="unit flex-row unit-spacing-md align-items-center">
                    <div class="unit-left"><span class="icon icon-black icon-md-1 custom-font-shower"></span></div>
                    <div class="unit-body">
                      <p>Shower and hair dryer</p>
                    </div>
                  </div>
                </li>
              </ul><a class="button button-primary" href="single-property.html">Book now</a>
            </div>
          </div>
          
        
        </div>
      </section>







@endsection