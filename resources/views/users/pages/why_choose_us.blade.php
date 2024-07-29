<section class="about-us pb-5 pt-8">
    <div class="container">
        <div class="section-title mb-6 pb-1 w-75 mx-auto text-center">
          <h2 class="m-0">Why <span>Choose</span> Us?</h2>
        </div>
  
        <div class="about-image-box">
            {{-- <div class="row d-flex align-items-center justify-content-between"> --}}
                <div class="row d-flex justify-content-between">
                <div class="col-lg-6 col-sm-12 mb-4">
                    <div class="about-content">
                        {{-- <h4 class="bg-theme white px-4 py-1 d-inline-block">Core value</h4> --}}
                        {{-- <h2 class="border-b mb-2 pb-2">Dream Living Spaces Setting New Build</h2> --}}
                        <p class="mb-0">
                            {!! substr($whyChooseUs->why_choose_us_statements, 0, 1300) !!} 
                            @if(strlen($whyChooseUs->why_choose_us_statements) > 1300)
                                ... <a href="{{ route( 'home.pages', 'about-us' )}}" style="color: #fedc56">Read more</a>
                            @endif
                        </p>
                        
                        
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 mb-4">
                    <div class="about-image p-3 box-shadow d-flex justify-content-center align-items-center">
                        <img src="{{ asset($whyChooseUs->image) }}" alt class="w-75 align-center" >
                    </div>
                </div>
            </div>
            <div class="row">
                
                
            </div>
        </div>
    </div>
  </section>