@extends('layouts.app')

@section('content')
<style>
    .info-item {
        word-wrap: break-word; /* Forces the text to break if it's too long */
        max-width: 100%; /* Ensures that the content does not exceed the container */
    }
</style>

<section class="contact-main pt-0 pb-10 bg-grey">
  <div class="map">
      <div style="width: 100%">
          {{-- <iframe height="500"
              src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=+(mangal%20bazar)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
            </iframe> --}}
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d7928.887062767875!2d3.5876326430759757!3d6.465360274105142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sRamotu%20Raji%20street%2C%20Atlantic%20Nominee%2C%20Metro%20homes%20Estate%2C%20General%20Paint%2C%20Ajah!5e0!3m2!1sen!2sus!4v1720180602726!5m2!1sen!2sus" width="100" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
       </div>
  </div> 
  <div class="container">
      <div class="contact-info-main">
          <div class="row">
            <div style="background:#000052; border-radius:8px" class="col-lg-6 col-offset-lg-1 mx-auto contact-info bg-white pt-10 pb-10 px-4" >
                <div    id="contact-form1" class="contact-form px-5">
                    <div class="contact-info-title text-center mb-4 px-5">
                        <h3 class="mb-1">Keep in Touch</h3>
                        <p class="mb-0">We’ll get back to you soon</p>
                    </div>
                    <div class=" " id="contactform-error-msg"></div>
                    <br>
                        <!-- Contact Form -->
                        <form action="{{route('contact.store')}}" class="contact-form" method="POST" id="contactUsForm">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-2">
                                    <input type="text" name="first_name" class="form-control" id="fullname" placeholder="First Name">
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <input type="text" name="last_name" class="form-control" id="llastname" placeholder="Last Name">
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <input type="text" name="phone" class="form-control" id="phnumber" placeholder="Phone">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                               
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea required class="form-control" cols="30" rows="5" name="comments" id="comments"></textarea>
                                        @error('comments')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class=" mt-3 text-center">
                                        <button type="submit" class="nir-btn g-recaptcha"
                                                data-sitekey="{{ config('services.recaptcha.siteKey') }}"
                                                data-callback="onContactUsSubmit" data-action="submit" id="submit2">Send Message
                                        </button>
                                    </div>
                                    

                                </div>
                            </div>
                        </form>
                         <!-- JavaScript for reCAPTCHA callback -->
                         <script>
                            function onContactUsSubmit(token) {
                                if (navigator.onLine) {
                                    // Proceed to submit the form if online
                                    document.getElementById('g-recaptcha-response').value = token;
                                    document.getElementById("contactUsForm").submit();
                                } else {
                                    alert("You need an active internet connection to submit the form.");
                                }
                                // document.getElementById("contactUsForm").submit();
                            }
                         
                            grecaptcha.ready(function() {
                                grecaptcha.execute('{{ config('services.recaptcha.siteKey') }}', { action: 'submit' }).then(function(token) {
                                    document.getElementById("submit2").disabled = false; // Enable button after token is received
                                }).catch(function(error) {
                                    console.error("reCAPTCHA error:", error);
                                    document.getElementById("submit2").disabled = false; // Enable button on error
                                });
                            });
                        </script>
                        
          
                    </div>
                </div>
              <div class="col-lg-6 col-offset-lg-1 mx-auto">
                  <div class="contact-info bg-white pt-10 pb-10 px-3">
                    <div class="contact-info-title text-center mb-4 px-3">
                        <h3 class="mb-1">INFORMATION ABOUT US</h3>
                        <p class="mb-0">
                        We are always open for cooperation and looking for new promising projects.
                        </p>
                    </div>
                    <div class="contact-info-content row mb-1">
                        <div class="col-lg-1 col-md-6 "></div>
                        <div class="col-lg-10 col-md-6 mb-3">
                            <div class="info-item bg-lgrey px-4 py-5 border-all text-center">
                                <div class="info-icon mb-2">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="info-content">
                                    <p class="m-0">{{ $contactUs->first_address}}</p>
                                    <p class="m-0">{{ $contactUs->second_address}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-6 "></div>

                        <div class="col-lg-1 col-md-6 "></div>
                        <div class="col-lg-10 col-md-6 mb-3">
                            <div class="info-item bg-lgrey px-4 py-5 border-all text-center">
                                <div class="info-icon mb-2">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="info-content text-wrap text-break">
                                    <p class="m-0">{{ $contactUs->first_phone }}</p>
                                    <p class="m-0">{{ $contactUs->second_phone }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-6 "></div>
                        
                        <div class="col-lg-1 col-md-6 "></div>
                        <div class="col-lg-10 col-md-12 mb-4">
                            <div class="info-item bg-lgrey px-4 py-5 border-all text-center">
                                <div class="info-icon mb-2">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="info-content ps-4">
                                    <p class="m-0"><a href="#" class="__cf_email__"
                                            data-cfemail="">{{ $contactUs->first_email}}</a>
                                    </p>
                                    <p class="m-0"><a href="#" class="__cf_email__"
                                            data-cfemail="">{{ $contactUs->second_email}}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-6 "></div>

                    </div>

                     
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>


@endsection