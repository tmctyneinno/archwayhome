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
              <h4>Address:</h4>
              <p>410 S Missouri St, Indianapolis, IN 46225, USA</p>
            </li>
            <li>
              <h4>General enquiries:</h4>
              <ul class="list">
                <li><a href="mailto:#">mail@demolink.org</a></li>
                <li>
                  <p>
                     Toll Free phone number:<a href="tel:#">+1.777.999.5000</a></p>
                </li>
              </ul>
            </li>
            <li>
              <h4>Other enquiries:</h4>
              <ul class="list">
                <li><a href="mailto:#">info@demolink.org</a></li>
                <li>
                  <p>Toll Free phone number:<a href="tel:#">+ 1.777.999.5050</a></p>
                </li>
                <li>
                  <p>Fax:<a href="tel:#">+ 1.777.999.5051</a></p>
                </li>
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