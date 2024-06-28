@extends('layouts.app')

@section('content')

<section class="breadcrumbs-custom">
    <div class="container">
      <div class="breadcrumbs-custom__inner">
        <ul class="breadcrumbs-custom__path">
          <li><a href="index.html">Home</a></li>
          <li class="active">Contacts</li>
        </ul>
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