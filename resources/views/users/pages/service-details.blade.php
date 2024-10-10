
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
                        <h2 class="border-b mb-0 pb-0"> {{$service->title }} </h2>
                        <p class=" mb-2 pb-2">
                            {!! $service->content !!}
                        </p>
                       
                    </div>
                </div>
            </div>
        </div>
        <br>

         <!-- Related Services Section -->
         <div class="related-services">
            <h3>Related Services</h3>
            <div class="row ">
                @foreach ($relatedServices as $relatedService)
                    <div class="col-md-6 mb-4">
                        <div class="related-service-card">
                            <img src="{{ asset($relatedService->image) }}" alt="{{ $relatedService->title }}" class="w-80 mb-1" style="width: 380; height: 200px; object-fit: cover; border-radius: 5px;">
                            <h5 >{{ $relatedService->title }}</h5>
                            <a href="{{ route('service.detail', encrypt($relatedService->id)) }}" class="btn btn-primary" style="background: #000052; border-color:#000052">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="pagination-main text-center mt-4">
                <nav aria-label="Page navigation example mb-2">
                    <ul class="pagination mb-2 mb-sm-0">
                        <!-- Previous Page Link -->
                        <li class="page-item {{ $relatedServices->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $relatedServices->previousPageUrl() }}&id={{ encrypt($service->id) }}">
                                <i>Prev</i>
                            </a>
                        </li>

                        <!-- Pagination Elements -->
                        @for ($i = 1; $i <= $relatedServices->lastPage(); $i++)
                            <li class="page-item {{ $relatedServices->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $relatedServices->url($i) }}&id={{ encrypt($service->id) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <!-- Next Page Link -->
                        <li class="page-item {{ $relatedServices->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $relatedServices->nextPageUrl() }}&id={{ encrypt($service->id) }}">
                                <i>Next</i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        
    </div>
</section>


@endsection