{{-- Our Service --}}
<section class="about-us bg-white pb-6 pt-10">
    <div class="container">
        <div class="section-title mb-6 pb-1 w-75 text-center mx-auto">
            <h2 class="m-0">Our Core <span>Services</span></h2>
            <p>
                At Archway Homes and Investment Limited, we offer a comprehensive suite of services designed to meet the diverse needs of our clients. Our expertise and innovative approaches ensure exceptional value across all areas of real estate. Here’s a brief overview of our key services:
            </p>
        </div>
 
        <div class="why-us">
            <div class="why-us-box">
                <div class="row">

                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6 mb-4 ">
                            <div class=" why-us-item  bg-lgrey" style="background-image: url('{{ asset($service->image) }}'); background-size: cover; background-position: center; height:230px; position: relative; border-radius: 8px;">
                                 
                                <div class="d-flex align-items-center justify-content-center h-100" style="position: relative; z-index: 2; color:#fff">
                                    <div class="text-center">
                                        <h3 class="text-white">
                                            <a class="text-white" href="{{ route('service.detail', encrypt($service->id)) }}">{{ $service->title }}</a>
                                        </h3>
                                        <p class="mb-0 text-white">{!! Str::limit($service->content, 70) !!}</p>
                                    </div>
                                </div> 
                    
                                <div class="overlay"></div>
                                {{-- <div class="overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div> --}}

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</section>