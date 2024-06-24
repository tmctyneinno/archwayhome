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
             <input class="form-input form-input-sm" id="footer-email" type="email" name="email" />
             <label class="form-label form-label-sm" for="footer-email">Enter your e-mail</label>
           </div>
           <button class="button button-primary-outline" type="submit">Subscribe!</button>
         </form>
       </div> 
     </div>
   </div>
 </section>

 <section class="pre-footer-corporate bg-default">
   <div class="container"><a class="brand" href="{{ url('/') }}">
      <!-- Logo-->
      <img class="logo-image-default" src="{{ asset($contactUs->site_logo) }}" alt="{{ asset($contactUs->company_name) }}" width="187" height="51"/>
      {{-- <img class="logo-image-inverse" src="{{ asset ('assets/images/logo-inverse-374x103.png')}}" alt="Estancy" width="187" height="51"/></a> --}}
      <img class="logo-image-inverse" src="{{ asset($contactUs->site_logo) }}" alt="{{ asset($contactUs->company_name) }}" width="187" height="51"/></a>
      <div class="row justify-content-sm-center justify-content-md-start row-30 row-md-60">
        <div class="col-sm-4">
          <p>
            {{ $aboutUs->content}}
          </p>
          <p class="rights">&copy;&nbsp;<span id="copyright-year"></span>.
            &nbsp; {{ $contactUs->company_name}}. All Right Reserved.<span>&nbsp;</span><a class="link-primary" href="{{ route('home.privacypolicy')}}">Privacy Policy</a>
          </p>
        </div>
        
        <div class="col-sm-4">
          <ul class="list">
            <li>
              <div class="unit flex-row unit-spacing-xs">
                <div class="unit-left"><span class="icon icon-sm icon-primary custom-font-pin"></span></div>
                <div class="unit-body"><a class="link-inherit" href="#">{{  $contactUs->first_address }}</a></div>
              </div>
            </li>
            <li>
              <div class="unit flex-row unit-spacing-xs">
                <div class="unit-left"><span class="icon icon-sm icon-primary custom-font-phone"></span></div>
                <div class="unit-body"><a class="link-inherit" href="tel:#">{{  $contactUs->first_phone }}</a></div>
              </div>
            </li>
            <li>
              <div class="unit flex-row unit-spacing-xs">
                <div class="unit-left"><span class="icon icon-sm icon-primary custom-font-email"></span></div>
                <div class="unit-body"><a href="mailto:#">{{ $contactUs->first_email }}</a></div>
              </div>
            </li>
          </ul>
          <ul class="list-inline-xs">
            <li><a class="icon icon-xxs icon-black custom-font-facebook" href="{{ $sociallink->facebook}}"></a></li>
            <li><a class="icon icon-xxs icon-black custom-font-twitter" href=" {{ $sociallink->twitter }} "></a></li>
            <li><a class="icon icon-xxs icon-black custom-font-linkedin" href="{{ $sociallink->linkedin  }}"></a></li>
          </ul>
        </div>
        <div class="col-sm-4">
          <ul class="list">
            <li>
              <div class="unit flex-row unit-spacing-xs">
                <div class="unit-left"><span class="icon icon-sm icon-primary custom-font-pin"></span></div>
                <div class="unit-body"><a class="link-inherit" href="#">{{  $contactUs->second_address }}</a></div>
              </div>
            </li>
            <li>
              <div class="unit flex-row unit-spacing-xs">
                <div class="unit-left"><span class="icon icon-sm icon-primary custom-font-phone"></span></div>
                <div class="unit-body"><a class="link-inherit" href="tel:#">{{  $contactUs->second_phone }}</a></div>
              </div>
            </li>
            <li>
              <div class="unit flex-row unit-spacing-xs">
                <div class="unit-left"><span class="icon icon-sm icon-primary custom-font-email"></span></div>
                <div class="unit-body"><a href="mailto:#">{{  $contactUs->second_email }}</a></div>
              </div>
            </li>
          </ul>
          
        </div>
        
      </div>
   </div>
 </section>