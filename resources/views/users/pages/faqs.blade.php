@extends('layouts.app')

@section('content')
<section class="breadcrumb-main pb-0 pt-20" style="background-image: url({{ asset($aboutUs->header_image) }});">
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content d-md-flex align-items-center pt-6">
                <h1 class="mb-0">Faq</h1>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Faq</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</section>

<section class="faq-main pb-6 pt-10">
    <div class="container">
        <div class="faq-accordian">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="accrodion-grp faq-accrodion" data-grp-name="faq-accrodion1">
                        <div class="accrodion active">
                            <div class="accrodion-title">
                                <h5>What other payment do I make after completing payment for the land?</h5>
                            </div>
                            <div class="accrodion-content" style="display: block;">
                                <div class="inner">
                                    <p>Development fee represents the cost used to develop and provide infrastructures within the estate such as road construction with street lights and drainage, perimeter fence with gate house, recreational facilities amongst others.
                                    </p>
                                </div>
                            </div>
                        </div>
                     
                        <div class="accrodion">
                            <div class="accrodion-title">
                                <h5>When can i make payment for my Development fee?
                                </h5>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>Development fee should be paid not later than Twelve (12) months after physical allocation. Failure to do this will atract price increment as development fee is reviewed annually with prevailing cost of building materials.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accrodion ">
                            <div class="accrodion-title">
                                <h5>WWhat document would be issued to me upon making Initial deposit?
                                </h5>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>
                                        Receipt of payment Invoice.
                                        Letter of acknowledgement.
                                        Contract of Sales. Deed of Assignment.
                                        Survey plan in your name.                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="accrodion-grp faq-accrodion" data-grp-name="faq-accrodion2">
                        <div class="accrodion active">
                            <div class="accrodion-title">
                                <h5>What infrastructures will be provided within the estate?
                                </h5>
                            </div>
                            <div class="accrodion-content" style="display: block;">
                                <div class="inner">
                                    <p>
                                        Electricity
                                        Green areas - Perimeter fence with gate house Access roads with street lights and drainages CCTV cameras
                                        Recreation facilities

                                </p>
                                </div>
                            </div>
                        </div>
                        <div class="accrodion ">
                            <div class="accrodion-title">
                                <h5>When will infrastructures be put in place within the estate?</h5>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>Infrastructural development begins immediately after the estate is launched and will be completed within Thirty six (36) months. However, subscribers can commence construction on their plot while infrastructure is being put in place within the estate.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accrodion">
                            <div class="accrodion-title">
                                <h5>Can I create a profile page for business</h5>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, inventore
                                        cumque veniam, praesentium velit incidunt rem quas a, quos eos ipsum,
                                        reprehenderit voluptatem.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accrodion ">
                            <div class="accrodion-title">
                                <h5>When can I begin construction on my Land?
                                </h5>
                            </div>
                            <div class="accrodion-content" style="display: none;">
                                <div class="inner">
                                    <p>Building can commence immediately after physical allocation.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="call-to-action pb-10 pt-0">
    <div class="container">
        <div class="section-title text-center w-75 mx-auto mb-5 pb-2">
            <h2 class="mb-2">Do You Have Any <span class="theme">Questions?</span></h2>
            <p class="mb-0">As opposed to using 'Content here, content here', making it look like readable English.
                Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                text, and a search for 'lorem ipsum'</p>
        </div>
        <div class="reservation-main w-75 mx-auto px-5">
            <form method="post" action="#" class>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group mb-2">
                            <label>Full Name</label>
                            <input type="text" id="full-name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group mb-2">
                            <label>Phone No.</label>
                            <input type="text" id="phone-no">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group mb-2">
                            <label>Property Type</label>
                            <div class="input-box">
                                <select class="niceSelect">
                                    @foreach ($projectMenus as $item)
                                    <option value="{{ $item->id}}">{{ $item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group mb-2">
                            <label>Locations</label>
                            <div class="input-box">
                                <select class="niceSelect">
                                    <option value="1">Lagos state</option>
                                    <option value="2">Ogun state</option>
                                    <option value="3">Oyo state</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-2">
                            <label>Message</label>
                            <textarea name="message" placeholder="Type your message here..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="comment-btn text-center">
                    <input type="submit" class="nir-btn" id="submit2" value="Send Message">
                </div>
            </form>
        </div>
    </div>
</section>


@endsection