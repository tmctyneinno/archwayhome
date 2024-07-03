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
                  <div class="col-lg-4 col-md-6 mb-4">
                      <div class="why-us-item text-center bg-lgrey">
                          <div class="why-us-icon">
                              <i class="{{ $service->icon_class }} theme"></i>
                          </div>
                          <div class="why-us-content">
                              <h3><a href="{{ route('service.detail', encrypt($service->id) ) }}">{{ $service->title }}</a></h3>
                              <p class="mb-0">{!! Str::limit($service->content, 70) !!}</p>
                          </div>
                      </div>
                  </div>
                  @endforeach
                </div>
            </div>
        </div>
  
    </div>
  </section>