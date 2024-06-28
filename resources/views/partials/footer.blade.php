
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
            <li><a class="icon icon-xxs material-icons-facebook" href="{{ $sociallink->facebook}}"></a></li>
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