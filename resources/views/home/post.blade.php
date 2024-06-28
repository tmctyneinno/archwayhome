@extends('layouts.app')

@section('content')
    <section class="breadcrumbs-custom">
        <div class="container">
        <div class="breadcrumbs-custom__inner">
            <ul class="breadcrumbs-custom__path">
            <li><a href="index.html">Home</a></li>
            <li class="active">Blog</li>
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
                    <h2>Blog</h2>
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
          @forelse ($posts as $post)
            <div class="col-sm-6 col-lg-4">
              <!-- Post-->
              <article class="product">
                <div class="product-media">
                  <img class="product-img" src="{{ asset ( $post->image )}}" alt="" width="370" height="290"  style=" width: 370px; height: 290px; object-fit: cover; ">
              
                </div>
                <div class="product-body">
                  <div class="product-title">
                    <h5><a href="" previewlistener="true">{{  Str::limit($post->title, 50) }} </a></h6>
                  </div>
                 
                </div>
              </article>
            </div>
          @empty
              <p>No Posts Data</p>
          @endforelse
         
          
        </div>
      </div>
    </section>

   







@endsection