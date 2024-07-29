@extends('layouts.app')

@section('content')

<section class="breadcrumb-main pb-0 pt-20" style="background-image: url({{ asset($aboutUs->header_image) }});">
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content d-md-flex align-items-center pt-6">
                <h1 class="mb-0">Events</h1>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Events</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div> 
    <br>
    <div class="dot-overlay"></div>
</section>

<section class="top-post pt-10">
    <div class="container">
        @forelse ($events as $event)
        <div class="section-title mb-6 pb-1 w-75 mx-auto text-center">
            <h4>{{ $event->title }}</h4>
        </div> 
        <div class="row team-slider">
            @if ($event->images)
                @foreach (json_decode($event->images) as $image)
                <div class="col-lg-4">
                    <div class="trend-item">
                        <div class="trend-image">
                            <img src="{{ asset($image) }}" alt="Event Image" style="width: 376px; height: 251px; object-fit: cover;">
                            <div class="gallery-content">
                                <ul>
                                    <li><a href="{{ asset($image) }}" data-lightbox="gallery"><i class="fa fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        <div class="mt-6 pb-1 w-75 mx-auto text-center">
            <iframe  height="315" src="{{ $event->video_link }}" frameborder="0" allowfullscreen></iframe>

        </div>
        @empty
        <p class="mx-auto  text-center">Coming soon</p>
        @endforelse
    </div>
</section>


@endsection

