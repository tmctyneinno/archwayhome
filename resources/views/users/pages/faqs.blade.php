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
                @forelse ($faqs as $key => $faq)
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="accrodion-grp faq-accrodion" data-grp-name="faq-accrodion1">
                        <div class="accrodion {{ $key === 0 ? 'active' : '' }}">
                            <div class="accrodion-title">
                                <h5>{{ $faq->question }}</h5>
                            </div>
                            <div class="accrodion-content" style="display: {{ $key === 0 ? 'block' : 'none' }}">
                                <div class="inner">
                                    <p>{!! $faq->answer !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-lg-6 col-md-12 mb-4">
                    <p>No items found</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

   



<section class="call-to-action pb-10 pt-0">
    <div class="container">
        <div class="section-title text-center w-75 mx-auto mb-5 pb-2">
            <h2 class="mb-2">Do You Have Any <span class="theme">Questions?</span></h2>
            
        </div>
       
        <div class="reservation-main w-75 mx-auto px-5">
            <form method="post" action="{{ route('submit.faq.form') }}" id="submitFaq">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group mb-2">
                            <label for="full-name">Full Name</label>
                            <input type="text" id="full-name" name="full_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group mb-2">
                            <label for="phone-no">Phone No.</label>
                            <input type="text" id="phone-no" name="phone_no" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group mb-2">
                            <label for="property-type">Property Type</label>
                            <select class="niceSelect form-control" id="property-type" name="property_type" required>
                                @foreach ($projectMenus as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group mb-2">
                            <label for="location">Location</label>
                            <select class="niceSelect form-control" id="location" name="location" required>
                                <option value="Lagos state">Lagos state</option>
                                <option value="Ogun state">Ogun state</option>
                                <option value="Oyo state">Oyo state</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-2">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" class="form-control" placeholder="Type your message here..." required></textarea>
                        </div>
                    </div>
                </div>
                <div class="comment-btn text-center">
                    <button type="submit" class="nir-btn g-recaptcha"
                            id="submitFaq"
                            data-sitekey="{{ config('services.recaptcha.siteKey') }}"
                            data-callback="onSubmitFaq"
                            data-action="submitfaq">Send Message</button>
                </div>
            </form>
       
        
        <script>
            function onSubmitFaq(token) {
                document.getElementById("submitFaq").submit();
                
            }
        </script>
      
        
        </div>
    </div>
</section>


@endsection