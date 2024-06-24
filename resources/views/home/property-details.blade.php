@extends('layouts.app')

@section('content')

<section class="breadcrumbs-custom">
    <div class="container">
      <div class="breadcrumbs-custom__inner">
        <ul class="breadcrumbs-custom__path">
          <li><a href="index.html">Home</a></li>
          <li><a href="properties.html">Project</a></li>
          <li class="active">Project details</li>
        </ul>
      </div>
    </div>
  </section>
  <!-- Single Property-->
  <section class="section-md section-md_smaller bg-default">
    <div class="container">
      <div class="row row-30">
        <div class="col-md-6 col-xl-7">
          <div class="slick-gallery">
            <!-- Slick Carousel-->
            <div class="slick-slider carousel-parent" data-arrows="false" data-loop="false" data-dots="false" data-swipe="true" data-items="1" data-child="#child-carousel" data-for="#child-carousel" data-lightgallery="group">
              <div class="item"><img src="{{ asset ('assets/images/single-property-01-670x480.jpg')}}" alt="" width="670" height="480"/>
              </div>
              <div class="item"><img src="{{ asset ('assets/images/single-property-02-670x480.jpg')}}" alt="" width="670" height="480"/>
              </div>
              <div class="item"><img src="{{ asset ('assets/images/single-property-03-670x480.jpg')}}" alt="" width="670" height="480"/>
              </div>
              <div class="item"><img src="{{ asset ('assets/images/single-property-04-670x480.jpg')}}" alt="" width="670" height="480"/>
              </div>
              <div class="item"><img src="{{ asset ('assets/images/single-property-05-670x480.jpg')}}" alt="" width="670" height="480"/>
              </div>
            </div>
            <div class="slick-slider carousel-child" id="child-carousel" data-for=".carousel-parent" data-arrows="true" data-loop="false" data-dots="false" data-swipe="true" data-items="3" data-xs-items="3" data-sm-items="3" data-md-items="3" data-lg-items="4" data-slide-to-scroll="1">
              <div class="item">
                <div class="thumb thumb_rect-2">
                  <div class="thumb__inner"><img src="{{ asset ('assets/images/single-property-01-670x480.jpg')}}" alt="" width="670" height="480"/>
                  </div>
                </div>
              </div>
              <div class="item">
                <!-- Thumb-->
                <div class="thumb thumb_rect-2">
                  <div class="thumb__inner"><img src="{{ asset ('assets/images/single-property-02-670x480.jpg')}}" alt="" width="670" height="480"/>
                  </div>
                </div>
              </div>
              <div class="item">
                <!-- Thumb-->
                <div class="thumb thumb_rect-2">
                  <div class="thumb__inner"><img src="{{ asset ('assets/images/single-property-03-670x480.jpg')}}" alt="" width="670" height="480"/>
                  </div>
                </div>
              </div>
              <div class="item">
                <!-- Thumb-->
                <div class="thumb thumb_rect-2">
                  <div class="thumb__inner"><img src="{{ asset ('assets/images/single-property-04-670x480.jpg')}}" alt="" width="670" height="480"/>
                  </div>
                </div>
              </div>
              <div class="item">
                <!-- Thumb-->
                <div class="thumb thumb_rect-2">
                  <div class="thumb__inner"><img src="{{ asset ('assets/images/single-property-05-670x480.jpg')}}" alt="" width="670" height="480"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-5">
          <h4>{{$project->title}}</h4>
          <p class="small">Neque egestas ut a consequat mi ornare. Ac posuere lectus amet risus tellus. Pellentesque lobortis sodales tristique augue orci, posuere massa. Lectus nisl sed in mi, egestas nunc. Etiam nec.</p>
          <h5>Features</h5>
          <div class="row row-15 row-content">
            <div class="col-6 col-xl-5">
              <ul class="list-marked xsmall">
                <li>Sprinklers</li>
                <li>Basketball Court</li>
                <li>Private Space</li>
                <li>Lawn</li>
              </ul>
            </div>
            <div class="col-6">
              <ul class="list-marked xsmall">
                <li>Gym</li>
                <li>Fireplace</li>
                <li>Balcony</li>
                <li>Laundry</li>
              </ul>
            </div>
          </div>
          <h5>Prices start at</h5>
          <div class="price"><span class="price__aside-top">$</span><span class="price__main">99</span><span class="price__aside-bottom">/per night</span></div>
          <ul class="list-inline-md text-style">
            <li>
              <div class="unit flex-row unit-spacing-xs align-items-center">
                <div class="unit-left"><span class="icon icon-black icon-md-1 custom-font-bedroom"></span></div>
                <div class="unit-body">
                  <p>One single bed</p>
                </div>
              </div>
            </li>
            <li>
              <div class="unit flex-row unit-spacing-xs align-items-center">
                <div class="unit-left"><span class="icon icon-black icon-md-1 custom-font-shower"></span></div>
                <div class="unit-body">
                  <p>Shower and hair dryer</p>
                </div>
              </div>
            </li>
            <li>
              <div class="unit flex-row unit-spacing-xs align-items-center">
                <div class="unit-left"><span class="icon icon-black icon-md-1 custom-font-park"></span></div>
                <div class="unit-body">
                  <p>One single bed</p>
                </div>
              </div>
            </li>
            <li>
              <div class="unit flex-row unit-spacing-xs align-items-center">
                <div class="unit-left"><span class="icon icon-black icon-md-1 custom-font-blueprint"></span></div>
                <div class="unit-body">
                  <p>Shower and hair dryer</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

   <!-- Room details-->
   <section class="section-lg bg-default">
    <div class="container">
      <div class="row row-30">
        <div class="col-md-6 col-xl-8">
          <h4>Availability</h4>
          <div class="rd-calendar calendar-availability" data-days="Sun, Mon, Tue, Wed, Thu, Fri, Sat">
            <div class="rdc-panel text-center"><a class="rdc-prev"></a>
              <h5><span class="rdc-month"></span> <span class="rdc-fullyear"></span>
              </h5><a class="rdc-next"></a>
            </div>
            <div class="rdc-table"></div>
            <div class="rdc-events"><a class="rdc-events_close"></a>
              <ul class="list-unstyled">
                <li class="rdc-event" data-date="06/15/2021"><span class="rd-calendar-info">3 available</span></li>
                <li class="rdc-event" data-date="07/14/2021"><span class="rd-calendar-info">2 available</span></li>
                <li class="rdc-event" data-date="08/14/2021"><span class="rd-calendar-info">5 available</span></li>
                <li class="rdc-event" data-date="09/14/2021"><span class="rd-calendar-info">1 available</span></li>
                <li class="rdc-event" data-date="10/14/2021"><span class="rd-calendar-info">5 available</span></li>
                <li class="rdc-event" data-date="11/14/2021"><span class="rd-calendar-info">3 available</span></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4">
          <h4>Reservation Form</h4>
          <p class="xsmall">Required fields are followed by *</p>
          <!-- RD Mailform-->
          <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
            <div class="form-wrap">
              <label class="form-label-outside" for="reservation-arrival">Date In:*</label>
              <input class="form-input" id="reservation-arrival" type="text" name="arrival" data-time-picker="date" data-constraints=""/>
            </div>
            <div class="form-wrap">
              <label class="form-label-outside" for="reservation-departure">Date Out:*</label>
              <input class="form-input" id="reservation-departure" type="text" name="departure" data-time-picker="date" data-constraints=""/>
            </div>
            <div class="form-wrap">
              <label class="form-label-outside" for="reservation-adults-count">Adults:*</label>
              <!-- Select 2-->
              <select class="form-input select-filter" id="reservation-adults-count" data-placeholder="1" name="adults-count" data-minimum-results-for-search="Infinity" data-constraints="">
                <option>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>
            </div>
            <div class="form-wrap">
              <label class="form-label-outside" for="reservation-children">Children:*</label>
              <!-- Select 2-->
              <select class="form-input select-filter" id="reservation-children" data-placeholder="0" name="children-count" data-minimum-results-for-search="Infinity" data-constraints="">
                <option>0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>
            </div><a class="button button-primary button-block" href="#">Book now</a>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="section-lg bg-default text-center">
    <div class="container">
      <div class="row justify-content-lg-center">
        <div class="col-lg-10 col-xl-8">
          <h4>Featured Properties</h4>
        </div>
      </div>
      <div class="row row-40">
        <div class="col-sm-6 col-lg-4">
          <!-- Post-->
          <article class="product">
            <div class="product-media"><img class="product-img" src="{{ asset ('assets/images/home-04-370x290.jpg')}}" alt="" width="370" height="290"/>
              <div class="product-price">$2000/mo</div>
            </div>
            <div class="product-body">
              <div class="product-title">
                <h5><a href="single-property.html">401 Biscayne Blvd, Miami</a></h5>
              </div>
              <div class="product-meta">
                <div class="group"><span>2 Bathrooms</span><span>2 Bedrooms</span>
                </div>
              </div>
            </div>
          </article>
        </div>
        <div class="col-sm-6 col-lg-4">
          <!-- Post-->
          <article class="product">
            <div class="product-media"><img class="product-img" src="{{ asset ('assets/images/home-03-370x290.jpg')}}" alt="" width="370" height="290"/>
              <div class="product-price">$2000/mo</div>
            </div>
            <div class="product-body">
              <div class="product-title">
                <h5><a href="single-property.html">225 Maywood Dr, San Francisco</a></h5>
              </div>
              <div class="product-meta">
                <div class="group"><span>2 Bathrooms</span><span>2 Bedrooms</span>
                </div>
              </div>
            </div>
          </article>
        </div>
        <div class="col-sm-6 col-lg-4">
          <!-- Post-->
          <article class="product">
            <div class="product-media"><img class="product-img" src="{{ asset ('assets/images/home-02-370x290.jpg')}}" alt="" width="370" height="290"/>
              <div class="product-price">$2000/mo</div>
            </div>
            <div class="product-body">
              <div class="product-title">
                <h5><a href="single-property.html">623 Willow Rd, Dallas</a></h5>
              </div>
              <div class="product-meta">
                <div class="group"><span>2 Bathrooms</span><span>2 Bedrooms</span>
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>




@endsection