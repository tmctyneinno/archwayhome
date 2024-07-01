@extends('layouts.app')

@section('content')


<section class="contact-main pt-0 pb-10 bg-grey">
  <div class="map">
      <div style="width: 100%">
          <iframe height="500"
              src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=+(mangal%20bazar)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
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

<section class="section-md bg-default">
  <div class="container">
    <div class="row row-50">
      <div class="col-md-5 col-lg-4">
        <ul class="list-sm contact-info">
          <li>
            <h5>Address:</h5>
            <p> {{ $contactUs->first_address}}</p>
          </li>
          <li>
            <h5>General enquiries:</h5>
            <ul class="list">
              <li><a href="mailto:#"> {{ $contactUs->first_email}}</a></li>
              <li>
                <p>
                    Toll Free phone number:<a href="tel:#"> {{ $contactUs->first_phone}}</a></p>
              </li>
            </ul>
          </li>
          <li>
            <h5>Other enquiries:</h5>
            <ul class="list">
              <li><a href="mailto:#">{{ $contactUs->second_email}}</a></li>
              <li>
                <p>Toll Free phone number:<a href="tel:#">{{ $contactUs->second_phone}}</a></p>
              </li>
              {{-- <li>
                <p>Fax:<a href="tel:#">+ 1.777.999.5051</a></p>
              </li> --}}
            </ul>
          </li>
        </ul>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4>Get in Touch</h4>
        
        <!-- RD Mailform-->
        <form class="rd-mailform rd-mailform_style-1" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
          <div class="form-wrap">
            <label class="form-label-outside" for="contact-first-name">First Name:*</label>
            <input class="form-input" id="contact-first-name" type="text" name="first-name" data-constraints="" placeholder="First Name"/>
          </div>
          <div class="form-wrap">
            <label class="form-label-outside" for="contact-last-name">Last Name:* </label>
            <input class="form-input" id="contact-last-name" type="text" name="last-name" data-constraints="" placeholder="Last Name"/>
          </div>
          <div class="form-wrap">
            <label class="form-label-outside" for="contact-email">Email:*</label>
            <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Email " placeholder="Email"/>
          </div>
          <div class="form-wrap">
            <label class="form-label-outside" for="contact-phone">Phone:*</label>
            <input class="form-input" id="contact-phone" type="text" name="phone" data-constraints="@Numeric " placeholder="Phone"/>
          </div>
          <div class="form-wrap">
            <label class="form-label-outside" for="contact-message">Message:*</label>
            <textarea class="form-input" id="contact-message" name="message" data-constraints="" placeholder="Message"></textarea>
          </div>
          <button class="button button-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection