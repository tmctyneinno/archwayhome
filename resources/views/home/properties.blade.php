@extends('layouts.app')

@section('content')
    <section class="breadcrumbs-custom">
        <div class="container">
        <div class="breadcrumbs-custom__inner">
            <ul class="breadcrumbs-custom__path">
            <li><a href="index.html">Home</a></li>
            <li class="active">Properties</li>
            </ul>
        </div>
        </div>
    </section>

    <section class="bg-gray-dark text-center">
    <!-- RD Parallax-->
    <div class="parallax-container bg-image parallax-header rd-parallax-light" data-parallax-img="{{ asset ('assets/images/parallax-3.jpg')}}">
        <div class="parallax-content bg-primary-layout">
        <div class="parallax-header__inner">
            <div class="parallax-header__content">
            <div class="container">
                <div class="row justify-content-sm-center">
                <div class="col-md-10 col-xl-8">
                    <h6>What We Offer</h6>
                    <h2>Properties</h2>
                    <p>Eu, leo tortor lacus dictum sed consectetur. Tellus enim amet, sed eu. Sit lobortis quam amet, nisi, est amet a, sociis. Varius ipsum at aenean orci phasellus tristique tincidunt laoreet ut. Tortor integer nullam lacus, purus nulla auctor dui in faucibus. Sit metus, tortor sit morbi lorem ut massa. Viverra faucibus pretium venenatis purus euismod ullamcorper. Cras tristique nunc, non dolor, non. Viverra aliquam pellentesque cum nisl. Convallis mauris id eget cursus et pulvinar lobortis.</p>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>

    <!-- Single Property-->
    <section class="section-lg bg-default text-center text-md-start">
        <div class="container py-3 py-md-0">
          <div class="row row-30 row-offset-md justify-content-center justify-content-lg-between">
            <div class="col-sm-10 col-md-6 col-xxl-7">
              <div class="img-max-width-1"><img class="img-shadow-gray" src="{{ asset ('assets/images/properties-01-600x480.jpg')}}" alt="" width="600" height="480"/>
              </div>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-5 col-xxl-5">
              <h4><a href="single-property.html">35 Pond St, New York</a></h4>
              <p class="small">Ut leo augue elementum faucibus. Turpis pharetra ante diam leo tincidunt sit. Ullamcorper duis felis phasellus tempus felis, aliquam id vitae. Integer suscipit nam bibendum urna scelerisque. Ornare etiam eget bibendum blandit neque leo eu. Volutpat amet aenean.</p>
              <h5>Prices start at</h5>
              <div class="price"><span class="price__aside-top">$</span><span class="price__main">99</span><span class="price__aside-bottom">/month</span></div>
              <ul class="list-inline-md text-style">
                <li>
                  <div class="unit flex-row unit-spacing-md align-items-center">
                    <div class="unit-left"><span class="icon icon-black icon-md-1 custom-font-bedroom"></span></div>
                    <div class="unit-body">
                      <p>One single bed</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="unit flex-row unit-spacing-md align-items-center">
                    <div class="unit-left"><span class="icon icon-black icon-md-1 custom-font-shower"></span></div>
                    <div class="unit-body">
                      <p>Shower and hair dryer</p>
                    </div>
                  </div>
                </li>
              </ul><a class="button button-primary" href="single-property.html">Book now</a>
            </div>
          </div>
          <div class="row row-30 row-offset-md justify-content-center justify-content-lg-between flex-md-row-reverse">
            <div class="col-sm-10 col-md-6 col-xxl-7 text-md-end">
              <div class="img-max-width-1"><img class="img-shadow-left-gray" src="{{ asset ('assets/images/properties-02-600x480.jpg')}}" alt="" width="600" height="480"/>
              </div>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-5 col-xxl-5">
              <h4><a href="single-property.html">623 Willow Rd, Dallas</a></h4>
              <p class="small">Nibh eu quam est eu justo, dictum nam nam id. Tristique ut feugiat sit lacinia eu tortor sed. Eget nisi tellus faucibus sollicitudin suspendisse sodales. Turpis dis ut at velit nullam tortor. Ullamcorper.</p>
              <h5>Prices start at</h5>
              <div class="price"><span class="price__aside-top">$</span><span class="price__main">145</span><span class="price__aside-bottom">/month</span></div>
              <ul class="list-inline-md text-style">
                <li>
                  <div class="unit flex-row unit-spacing-md align-items-center">
                    <div class="unit-left"><span class="icon icon-black icon-md-1 custom-font-bedroom"></span></div>
                    <div class="unit-body">
                      <p>1 Bedroom</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="unit flex-row unit-spacing-md align-items-center">
                    <div class="unit-left"><span class="icon icon-black icon-md-1 custom-font-shower"></span></div>
                    <div class="unit-body">
                      <p>Shower and hair dryer</p>
                    </div>
                  </div>
                </li>
              </ul><a class="button button-primary" href="single-property.html">Book now</a>
            </div>
          </div>
          <div class="row row-30 row-offset-md justify-content-center justify-content-lg-between">
            <div class="col-sm-10 col-md-6 col-xxl-7">
              <div class="img-max-width-1"><img class="img-shadow-gray" src="{{ asset ('assets/images/properties-03-600x480.jpg')}}" alt="" width="600" height="480"/>
              </div>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-5 col-xxl-5">
              <h4><a href="single-property.html">401 Biscayne Blvd, Miami</a></h4>
              <p class="small">Ut leo augue elementum faucibus. Turpis pharetra ante diam leo tincidunt sit. Ullamcorper duis felis phasellus tempus felis, aliquam id vitae. Integer suscipit nam bibendum urna scelerisque. Ornare etiam eget bibendum blandit neque leo eu. Volutpat amet aenean.</p>
              <h5>Prices start at</h5>
              <div class="price"><span class="price__aside-top">$</span><span class="price__main">99</span><span class="price__aside-bottom">/month</span></div>
              <ul class="list-inline-md text-style">
                <li>
                  <div class="unit flex-row unit-spacing-md align-items-center">
                    <div class="unit-left"><span class="icon icon-black icon-md-1 custom-font-bedroom"></span></div>
                    <div class="unit-body">
                      <p>One single bed</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="unit flex-row unit-spacing-md align-items-center">
                    <div class="unit-left"><span class="icon icon-black icon-md-1 custom-font-shower"></span></div>
                    <div class="unit-body">
                      <p>Shower and hair dryer</p>
                    </div>
                  </div>
                </li>
              </ul><a class="button button-primary" href="single-property.html">Book now</a>
            </div>
          </div>
          <div class="row row-30 row-offset-md justify-content-center justify-content-lg-between flex-md-row-reverse">
            <div class="col-sm-10 col-md-6 col-xxl-7 text-md-end">
              <div class="img-max-width-1"><img class="img-shadow-left-gray" src="{{ asset ('assets/images/properties-04-600x480.jpg')}}" alt="" width="600" height="480"/>
              </div>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-5 col-xxl-5">
              <h4><a href="single-property.html">923 Folsom St, San Francisco</a></h4>
              <p class="small">Nibh eu quam est eu justo, dictum nam nam id. Tristique ut feugiat sit lacinia eu tortor sed. Eget nisi tellus faucibus sollicitudin suspendisse sodales. Turpis dis ut at velit nullam tortor. Ullamcorper.</p>
              <h5>Prices start at</h5>
              <div class="price"><span class="price__aside-top">$</span><span class="price__main">145</span><span class="price__aside-bottom">/month</span></div>
              <ul class="list-inline-md text-style">
                <li>
                  <div class="unit flex-row unit-spacing-md align-items-center">
                    <div class="unit-left"><span class="icon icon-black icon-md-1 custom-font-bedroom"></span></div>
                    <div class="unit-body">
                      <p>1 Bedroom</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="unit flex-row unit-spacing-md align-items-center">
                    <div class="unit-left"><span class="icon icon-black icon-md-1 custom-font-shower"></span></div>
                    <div class="unit-body">
                      <p>Shower and hair dryer</p>
                    </div>
                  </div>
                </li>
              </ul><a class="button button-primary" href="single-property.html">Book now</a>
            </div>
          </div>
        </div>
      </section>

      <!-- Subscribe form-->
      <section class="section-md bg-accent text-center text-lg-start">
        <div class="container">
          <div class="row row-30 justify-content-md-center align-items-lg-center justify-content-xl-between">
            <div class="col-md-10 col-lg-6">
              <h4>Sign Up for our Newsletter...</h4>
              <h6>...and never miss OUR special offers and news!</h6>
            </div>
            <div class="col-md-10 col-lg-6">
              <!-- RD Mailform-->
              <form class="rd-mailform rd-mailform-inline-flex rd-mailform-inline-flex-1 text-center" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
                <div class="form-wrap">
                  <input class="form-input form-input-sm" id="footer-email" type="email" name="email" data-constraints=""/>
                  <label class="form-label form-label-sm" for="footer-email">Enter your e-mail</label>
                </div>
                <button class="button button-primary-outline" type="submit">Subscribe!</button>
              </form>
            </div>
          </div>
        </div>
      </section>






@endsection