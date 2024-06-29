<section class="about-us pb-5 pt-8">
    <div class="container">
        <div class="section-title mb-6 pb-1 w-75 mx-auto text-center">
          <h2 class="m-0">Why <span>Choose</span> Us?</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
  
        <div class="about-image-box">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-lg-6 col-sm-12 mb-4">
                    <div class="about-content">
                        <h4 class="bg-theme white px-4 py-1 d-inline-block">Core value</h4>
                        {{-- <h2 class="border-b mb-2 pb-2">Dream Living Spaces Setting New Build</h2> --}}
                        <p class="mb-0">
                          {!! ($whyChooseUs->core_values) !!}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 mb-4">
                    <div class="about-image p-3 box-shadow">
                        <img src="{{ asset('assets/images/trending/trending5.jpg')}}" alt class="w-100">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4">
                    <div
                        class="trend-item box-shadow bg-white d-flex align-items-center justify-content-between p-3">
                        
                        <div class="trend-content-main w-75">
                            <div class="trend-content">
                                <h5 class="theme mb-1">Vision Statement</h5>
                                <p class="mb-0">{{ $whyChooseUs->vision }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div
                        class="trend-item box-shadow bg-white d-flex align-items-center justify-content-between p-3">
                        
                        <div class="trend-content-main w-100">
                            <div class="trend-content">
                                <h5 class="theme mb-1">Mission Statement</h5>
                                <p class="mb-0">{{ $whyChooseUs->mission }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
  </section>