<header class="page-header">
  <!-- RD Navbar-->
  <div class="rd-navbar-wrap">
    <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-stick-up-clone="false" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-md-stick-up-offset="150px" data-lg-stick-up-offset="50px">
      <!-- RD Navbar Top Panel-->
      <div class="rd-navbar-top-panel__outer"> 
        <div class="rd-navbar-top-panel">
          <div class="rd-navbar-top-panel__main">
            <div class="rd-navbar-top-panel__toggle rd-navbar-fixed__element-1 rd-navbar-static--hidden" data-rd-navbar-toggle=".rd-navbar-top-panel__main"><span></span></div>
            <div class="rd-navbar-top-panel__content">
              <ul class="rd-navbar-items-list">
                <li>
                  <div class="unit flex-row unit-spacing-xs">
                    <div class="unit-left">
                      <span class="icon icon-xxs material-icons-location_on"></span>
                    </div>
                    <div class="unit-body">
                      <a href="#">{{ $contactUs->first_address }}</a>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="unit flex-row unit-spacing-xs">
                    <div class="unit-left"><span class="icon icon-xxs material-icons-phone"></span></div>
                    <div class="unit-body">
                      <p><a href="tel:#">{{ $contactUs->first_phone }}</a></p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="rd-navbar-inner">
        <!-- RD Navbar Panel-->
        <div class="rd-navbar-panel">
          <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
          <!-- RD Navbar Brand-->
          <div class="rd-navbar-brand"> <a class="brand__name" href="{{ url('/')}}">
              <!-- Logo-->
              <img style="width: 120px; height: 40px;" class="logo-image-default" src="{{ asset($contactUs->site_logo) }}" alt="Estancy" width="187" height="51"/>
              {{-- <img class="logo-image-inverse" src="{{ asset ('assets/images/logo-inverse-374x103.png')}}" alt="Estancy" width="187" height="51"/></a></div> --}}
              <img class="logo-image-inverse" src="{{ asset($contactUs->site_logo) }}" alt="Estancy" width="187" height="51"/></a></div>
        </div>
        <!-- RD Navbar Nav-->
        <div class="rd-navbar-nav-wrap"> 
          <div class="rd-navbar-nav-wrap__element">
            @guest
                {{-- @if (Route::has('login'))
                  <a class="button button-outline-primary" href="{{ route('login') }}">Login</a>
                    
                @endif --}}

                @if (Route::has('register'))
                  <a class="button button-primary" href="{{ route('register')}}">Join us</a>
                  
                @endif
            @else

            @endguest
          
            
            
          </div>
          
          <ul class="rd-navbar-nav">
            @forelse ($menuItems as $menuItem)
                <li class="{{ request()->is($menuItem->url) ? 'active' : '' }}">
                    <a href="{{ route($menuItem->url) }}">
                        {{ $menuItem->name }}
                        @if ($menuItem->dropdownItems->count() > 0)
                            <ul class="rd-navbar-dropdown">
                                @foreach ($menuItem->dropdownItems as $dropdownItem)
                                    <li><a href="{{ route($menuItem->url) }}">{{ $dropdownItem->name }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </a>
                </li>
            @empty
              <li class="#">No Navigation item</li>
            @endforelse
        </ul>
        
          
        </div>
      </div>
    </nav>
  </div>
</header>