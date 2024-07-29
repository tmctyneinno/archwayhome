
@extends('layouts.app')
@section('content')

<section class="breadcrumb-main pb-0 pt-20" style="background-image: url({{ asset($aboutUs->header_image) }});">
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content d-md-flex align-items-center pt-6">
                <h1 class="mb-0">Service Detail</h1>
               
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Service Detail</li>
                    </ul>
                </nav>
             
            </div>
        </div>
    </div>
    <br>
    <div class="dot-overlay"></div>
</section>


<section class="about-us pb-6">
    <div class="container">
        <div class="about-image-box">
            <div class="row d-flex ">
                <div class="col-lg-5 col-sm-12 mb-4">
                    <div class="about-image box-shadow position-relative">
                        <img src="{{ asset($service->image)}} " alt class="w-100">
                       
                    </div>
                </div>
                <div class="col-lg-7 col-sm-12 mb-4">
                    <div class="about-content">
                        <h2 class="border-b mb-2 pb-1"> {{$service->title }} </h2>
                        <p class=" mb-2 pb-2">
                            {!! $service->content !!}
                        </p>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection