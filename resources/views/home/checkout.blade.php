@extends('layouts.app')

@section('content')
<section class="breadcrumbs-custom">
    <div class="container">
      <div class="breadcrumbs-custom__inner">
        <ul class="breadcrumbs-custom__path">
          <li><a href="index.html">Home</a></li>
          <li><a href="properties.html">Properties</a></li>
          <li class="active">Checkout</li>
        </ul>
      </div>
    </div>
  </section>
  <!-- Checkout-->
  <section class="section-lg section-lg_smaller-top bg-default">
    <div class="container">
      <div class="row justify-content-lg-center">
        <div class="col-lg-10 col-xl-8">
          <h2 class="text-center">Checkout</h2>
          <div class="divider"></div>
          <!-- Room Details-->
          <h4>Room Details</h4>
          <dl class="list-terms">
            <dt>Room Type</dt>
            <dd>Comfort Triple room</dd>
          </dl>
          <dl class="list-terms">
            <dt>Guests</dt>
            <dd>1 Adult</dd>
          </dl>
          <dl class="list-terms">
            <dt>Check-In Date</dt>
            <dd>October 12, 2021</dd>
          </dl>
          <dl class="list-terms">
            <dt>Check-Out Date</dt>
            <dd>November 23, 2021</dd>
          </dl>
          <div class="divider"></div>
          <!-- Choose Rate-->
          <h4>Choose Rate</h4>
          <ul class="list-lg">
            <li>
              <label class="radio-inline">
                <input class="radio-custom" type="radio" form="checkout-form" name="rate"/>BASIC, $70
              </label>
              <p class="small">This offer includes accommodation offer in the room you selected with 1 free breakfast per day of your stay at our hotel. More information is available at reception.</p>
            </li>
            <li>
              <label class="radio-inline">
                <input class="radio-custom" type="radio" form="checkout-form" name="rate"/>EXTENDED, $120
              </label>
              <p class="small">This set of services offers you full accommodation with a wide variety of dining services at our restaurant. Room service is provided free of charge from 9 AM to 10 PM.</p>
            </li>
            <li>
              <label class="radio-inline">
                <input class="radio-custom" type="radio" form="checkout-form" name="rate"/>FULL, $150
              </label>
              <p class="small">Full Rate includes everything Basic and Extended Rates do with some extra services (e.g. ironing facilities access or babysitter service), which you can select on our site when booking a room.</p>
            </li>
          </ul>
          <div class="divider"></div>
          <!-- Choose Additional Services-->
          <h4>Choose Additional Services</h4>
          <ul class="list-xs">
            <li>
              <label class="checkbox-inline">
                <input class="checkbox-custom" type="checkbox" form="checkout-form" name="service-1" checked="checked"/>Baggage storage (Free)
              </label>
            </li>
            <li>
              <label class="checkbox-inline">
                <input class="checkbox-custom" type="checkbox" form="checkout-form" name="service-2"/>Safe ($25 Once)
              </label>
            </li>
            <li>
              <label class="checkbox-inline">
                <input class="checkbox-custom" type="checkbox" form="checkout-form" name="service-3"/>Bicycle rent ($15 Per Night)
              </label>
            </li>
          </ul>
          <div class="divider"></div>
          <!-- Price Breakdown:-->
          <h4>Price Breakdown:</h4>
          <div class="table-custom-responsive">
            <table class="table-custom table-custom_condensed table-custom_striped">
              <caption>Room ( Basic )</caption>
              <thead>
                <tr>
                  <td>Date</td>
                  <td>Price</td>
                </tr>
              </thead>
              <tbody>
                <tr> 
                  <td>October 12, 2021</td>
                  <td>$70</td>
                </tr>
                <tr> 
                  <td>October 13, 2021</td>
                  <td>$70</td>
                </tr>
                <tr> 
                  <td>October 14, 2021</td>
                  <td>$70</td>
                </tr>
                <tr> 
                  <td>October 15, 2021</td>
                  <td>$70</td>
                </tr>
                <tr> 
                  <td>October 16, 2021</td>
                  <td>$70</td>
                </tr>
                <tr> 
                  <td>October 17, 2021</td>
                  <td>$70</td>
                </tr>
              </tbody>
              <tfoot>
                <tr> 
                  <td>Room Subtotal:</td>
                  <td>$420</td>
                </tr>
                <tr> 
                  <td>Total</td>
                  <td>$420</td>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="divider"> </div>
          <!-- Customer Details-->
          <h4>Customer Details</h4>
          <p class="small">
             Required fields are followed by <span class="text-primary">*</span></p>
          <!-- RD Mailform-->
          <form class="rd-mailform rd-mailform_style-1" id="checkout-form" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
            <div class="form-wrap">
              <label class="form-label-outside" for="checkout-first-name">
                 First name:<span class="text-primary">*</span></label>
              <input class="form-input" id="checkout-first-name" type="text" name="first-name" data-constraints="" placeholder="First Name"/>
            </div>
            <div class="form-wrap">
              <label class="form-label-outside" for="checkout-last-name">
                 Last name:<span class="text-primary">* </span></label>
              <input class="form-input" id="checkout-last-name" type="text" name="last-name" data-constraints="" placeholder="Last Name"/>
            </div>
            <div class="form-wrap">
              <label class="form-label-outside" for="checkout-email">
                 Email:<span class="text-primary">*</span></label>
              <input class="form-input" id="checkout-email" type="email" name="email" data-constraints="@Email " placeholder="Email"/>
            </div>
            <div class="form-wrap">
              <label class="form-label-outside" for="checkout-phone">
                 Phone:<span class="text-primary">*</span></label>
              <input class="form-input" id="checkout-phone" type="text" name="phone" data-constraints="@Numeric " placeholder="Phone"/>
            </div>
            <div class="form-wrap">
              <label class="form-label-outside" for="checkout-message">
                 Message:<span class="text-primary">*</span></label>
              <textarea class="form-input" id="checkout-message" name="message" data-constraints="" placeholder="Message"></textarea>
            </div>
            <h4>Total Price:	</h4>
            <div class="price"><span class="price__aside-top">$</span><span class="price_main">2,940</span></div>
            <button class="button button-primary" type="submit">REQUEST A QUOTE</button>
          </form>
        </div>
      </div>
    </div>
  </section>

@endsection
