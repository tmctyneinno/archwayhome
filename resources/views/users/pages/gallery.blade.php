@extends('layouts.app')

@section('content')

<section class="breadcrumb-main pb-0 pt-20" style="background-image: url({{ asset($aboutUs->header_image) }});">
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content d-md-flex align-items-center pt-6">
                <h1 class="mb-0">Gallery</h1>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</section>

<div class="gallery pb-6 pt-10">
    <div class="container">
        <div class="row blog-main" style="position: relative; height: 2017.47px;">
            @forelse ($galleries as $gallery)
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mansonry-item"
                    style="position: absolute; left: 0px; top: 0px;">
                    <div class="gallery-item mb-4">
                        <div class="gallery-image">
                            <img style="height: 184px; object-fit: cover;" src="{{ asset( $gallery->images) }}" alt="image">
                            <div class="overlay"></div>
                        </div>
                        <div class="gallery-content">
                            <ul>
                                <li><a href="{{ asset( $gallery->images) }}" data-lightbox="gallery" 
                                        previewlistener="true"><i class="fa fa-eye"></i></a></li>
                                {{-- <li><a href="#"><i class="fa fa-link"></i></a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            @empty
                <p>No Gallery</p>
            @endforelse
            
         
            
        </div>
    </div>
</div>

@endsection
