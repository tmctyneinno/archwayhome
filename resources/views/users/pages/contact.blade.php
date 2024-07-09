@extends('layouts.app')

@section('content')


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
              <div class="col-lg-10 col-offset-lg-1 mx-auto">
                  <div class="contact-info bg-white pt-10 pb-10 px-5">
                      <div class="contact-info-title text-center mb-4 px-5">
                          <h3 class="mb-1">INFORMATION ABOUT US</h3>
                          <p class="mb-0">
                            We are always open for cooperation and looking for new promising projects.
                          </p>
                      </div>
                      <div class="contact-info-content row mb-1">
                          <div class="col-lg-4 col-md-6 mb-4">
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
                          <div class="col-lg-4 col-md-6 mb-4">
                              <div class="info-item bg-lgrey px-4 py-5 border-all text-center">
                                  <div class="info-icon mb-2">
                                      <i class="fa fa-phone"></i>
                                  </div>
                                  <div class="info-content">
                                      <p class="m-0">{{ $contactUs->first_phone}}</p>
                                      <p class="m-0">{{ $contactUs->second_phone}}</p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4 col-md-12 mb-4">
                              <div class="info-item bg-lgrey px-4 py-5 border-all text-center">
                                  <div class="info-icon mb-2">
                                      <i class="fa fa-envelope"></i>
                                  </div>
                                  <div class="info-content ps-4">
                                      <p class="m-0"><a href="#" class="__cf_email__"
                                              data-cfemail="cca5a2aaa38cbea9ada0bfa4a5a9a0a8e2afa3a1">{{ $contactUs->first_email}}</a>
                                      </p>
                                      <p class="m-0"><a href="#" class="__cf_email__"
                                              data-cfemail="0c6469607c4c7e696d607f6465696068226f6361">{{ $contactUs->second_email}}</a>
                                      </p>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div id="contact-form1" class="contact-form px-5">
                          <div class="contact-info-title text-center mb-4 px-5">
                              <h3 class="mb-1">Keep in Touch</h3>
                              <p class="mb-0">We’ll get back to you soon</p>
                          </div>
                          <div id="contactform-error-msg"></div>
                              @if(session('success'))
                              <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                  {{ session('success') }}
                              </div>
                          @endif
                          @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif
                          <form method="post" action="{{ route('users.submit.form') }}" name="contactform2" id="contactform2">
                            @csrf
                            <div class="form-group mb-2">
                                <input type="text" name="first_name" class="form-control" id="fullname" placeholder="First Name">
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" name="last_name" class="form-control" id="llastname" placeholder="Last Name">
                            </div>
                            <div class="form-group mb-2">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" name="phone" class="form-control" id="phnumber" placeholder="Phone">
                            </div>
                            <div class="textarea mb-2">
                                <textarea name="comments" placeholder="Enter a message"></textarea>
                            </div>
                            <div class="comment-btn text-center">
                                <input type="submit" class="nir-btn" id="submit2" value="Send Message">
                            </div>
                        </form>
                        
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>


@endsection