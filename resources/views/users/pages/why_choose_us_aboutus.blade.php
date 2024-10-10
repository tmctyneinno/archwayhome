<style>
    .content-full {
        display: none !important;
    }
    .hide-content {
        display: none !important;
    }

</style>
<section class="about-us pb-5 pt-8">
    <div class="container">
        <div class="section-title mb-6 pb-1 w-75 mx-auto text-center">
          <h2 class="m-0">Why <span>Choose</span> Us?</h2>
        </div>
  
        <div class="about-image-box">
            {{-- <div class="row d-flex align-items-center justify-content-between"> --}}
            <div class="row d-flex justify-content-between">
                
                 <div class="col-lg-6 col-md-12 mb-4">
                    <div class="trend-item box-shadow bg-white d-flex align-items-center justify-content-between p-3"> 
                        <div class="trend-content-main w-100">
                            <div class="trend-content">
                                <div class="accrodion-grp faq-accrodion faq-accrodion1" id="accordionExample">
                                    <div class="accrodion ">
                                        <h2 class="accordion-title">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <h5 class="theme mb-1">{{$whyChooseUs->first_title }} </h5>
                                        </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p class="mb-0">
                                                    {{$whyChooseUs->first_content }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="trend-content">
                                <div class="accrodion-grp faq-accrodion faq-accrodion2" id="accordionExample">
                                    <div class="accrodion ">
                                        <h2 class="accordion-title">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                            <h5 class="theme mb-1"> {{$whyChooseUs->second_title}}
                                            </h5>
                                        </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p class="mb-0">
                                                  {{$whyChooseUs->second_content}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrodion-grp faq-accrodion faq-accrodion3" id="accordionExample">
                                    <div class="accrodion ">
                                        <h2 class="accordion-title">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                                            <h5 class="theme mb-1"> {{$whyChooseUs->third_title}}
                                            </h5>
                                        </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p class="mb-0">
                                                    {{$whyChooseUs->third_content}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accrodion-grp faq-accrodion faq-accrodion4" id="accordionExample">
                                    <div class="accrodion ">
                                        <h2 class="accordion-title">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseOne">
                                            <h5 class="theme mb-1">  {{$whyChooseUs->four_title}}
                                            </h5>
                                        </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p class="mb-0">
                                                    {{$whyChooseUs->four_content}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-6 col-sm-12 mb-4">
                    <div class="about-image p-3 box-shadow d-flex justify-content-center align-items-center">
                        <img src="{{ asset($whyChooseUs->image) }}" alt class="w-80 align-center" >
                    </div>
                </div>
            </div>
            <div class="row">
               
                
            </div>
        </div>
    </div>
  </section>







