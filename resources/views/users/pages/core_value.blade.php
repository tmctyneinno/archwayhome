<section class="about-us pb-5 pt-3">
    <div class="container">
       
  
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
                        
                        <div class="trend-content-main w-100">
                            <div class="trend-content">
                                <div class="accrodion-grp faq-accrodion faq-accrodion1" id="accordionExample">
                                    <div class="accrodion active">
                                        <h2 class="accordion-title">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <h5 class="theme mb-1">Vision Statement</h5>
                                        </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p class="mb-0">{{ $whyChooseUs->vision }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div
                        class="trend-item box-shadow bg-white d-flex align-items-center justify-content-between p-3">
                        
                        <div class="trend-content-main w-100">
                            <div class="accrodion-grp faq-accrodion faq-accrodion1" id="accordionExamplemission">
                                <div class="accrodion active">
                                    <h2 class="accordion-title">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                        <h5 class="theme mb-1">Mission Statement</h5>
                                    </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse " data-bs-parent="#accordionExamplemission">
                                        <div class="accordion-body">
                                            <p class="mb-0">{{ $whyChooseUs->mission }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
  </section>