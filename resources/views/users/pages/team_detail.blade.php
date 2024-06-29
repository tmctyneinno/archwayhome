@extends('layouts.app')

@section('content')

<section class="breadcrumb-main pb-0 pt-20" style="background-image: url({{ asset($aboutUs->header_image) }});">
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content d-md-flex align-items-center pt-6">
                <h1 class="mb-0">Our Team Detail</h1>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Our Team Detail</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</section>

<section class="our-team bg-white pt-10 pb-10">
    <div class="container">
        <div class="team-main">
            <div class="blog-full mb-4 border-b pb-4">
                <div class="row">
                    <div class="col-lg-5 col-md-6 pe-4">
                        <div class="blog-image position-relative">
                            <a href="#"
                                style="background-image: url({{ asset($team->image) }}); width: 300px; height: 400px; object-fit: cover;" >
                            </a>
                         
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 ps-4">
                        <div class="blog-content">
                            <h5 class="theme mb-1">Team</h5>
                            <h3 class="mb-2">{{ $team->name }}</h3>
                           
                            <p class="mb-2 border-b pb-2">{{ $team->position }}<</p>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="blog-single">
                        <div class="blog-wrapper">
                            <div class="blog-content first-child-cap mb-4 text-justify">
                                <p class="mb-3">
                                    {!! $team->content !!}
                                </p>
                                
                            </div>
                           
                        </div>
                      
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
    </div>
</section>

@endsection
