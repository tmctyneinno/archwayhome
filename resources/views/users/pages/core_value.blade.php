<section class="about-us pb-5 pt-3">
    <div class="container">
       
  
        <div class="about-image-box">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-lg-6 col-sm-12 mb-4">
                    <div class="about-content">
                        <h4 class="bg-theme white px-4 py-1 d-inline-block">Core value</h4>
                        <p class="mb-0">
                          {!! ($coreValue->core_values) !!}
                        </p>
                    </div>
                </div> 
                <div class="col-lg-6 col-sm-12 mb-4">
                    <div class="about-image p-3 box-shadow">
                        <img src="{{ asset($coreValue->image) }}" alt class="w-100">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="trend-item box-shadow bg-white d-flex align-items-center justify-content-between p-3"> 
                        <div class="trend-content-main w-100">
                            <div class="trend-content">
                                <div class="accrodion-grp faq-accrodion faq-accrodion1" id="accordionExample">
                                    <div class="accrodion active">
                                        <h2 class="accordion-title">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
                                            <h5 class="theme mb-1">Vision Statement</h5>
                                        </button>
                                        </h2>
                                        <div id="collapseOne1" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p class="mb-0">{{ $coreValue->vision }}</p>
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
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseOne">
                                        <h5 class="theme mb-1">Mission Statement</h5>
                                    </button>
                                    </h2>
                                    <div id="collapseTwo2" class="accordion-collapse collapse " data-bs-parent="#accordionExamplemission">
                                        <div class="accordion-body">
                                            <p class="mb-0">{{ $coreValue->mission }}</p>
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