<header class="main_header_area">
  <div class="header-content py-1 bg-theme1">
      <div class="container d-flex align-items-center justify-content-between">
          <div class="links">
              <ul>
                 
                  <li>
                    <a href="#" class="white">
                        <i class="fa fa-calendar white"></i>
                        <span id="currentDate"></span>
                    </a>
                </li>
                
                <script>
                    // Get current date
                    var currentDate = new Date();
                
                    // Define days of the week and months arrays
                    var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                
                    // Construct the date string in the required format
                    var dateString = daysOfWeek[currentDate.getDay()] + ', ' +
                                     months[currentDate.getMonth()] + ' ' +
                                     currentDate.getDate() + ', ' +
                                     currentDate.getFullYear();
                
                    // Update the span with id "currentDate"
                    document.getElementById('currentDate').textContent = dateString;
                </script>
                
                  <li><a href="#" class="white"><i class="fa fa-map-marker white"></i> {{ $contactUs->first_address }}</a></li>
                  <li><a href="#" class="white"><i class="fa fa-clock white"></i> {{ $officeHour->content }}</a></li>
              </ul>
          </div>
          <div class="links float-right">
              <ul>
                  <li><a href="{{ $sociallink->facebook }}" class="white"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="{{ $sociallink->twitter }}" class="white"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                  {{-- <li><a href="{{ $sociallink->instagram }}" class="white"><i class="fab fa-instagram" aria-hidden="true"></i></a></li> --}}
                  <li><a href="{{ $sociallink->linkedin }}" class="white"><i class="fab fa-linkedin " aria-hidden="true"></i></a></li>
              </ul>
          </div>
      </div>
  </div> 

  <div class="header_menu" id="header_menu">
      <nav class="navbar navbar-default">
          <div class="container">
              <div class="navbar-flex d-flex align-items-center justify-content-between w-100 pb-3 pt-3">

                  <div class="navbar-header">
                      <a class="navbar-brand" href="{{ url('/') }}">
                          <img src="{{ asset($contactUs->site_logo) }}" style=" width: 100px; height: 70px; object-fit: cover; " alt="image">
                          {{-- <img src="{{ asset('assets/images/blue_arc.jpg') }}" style=" width: 120px; height: 60px; object-fit: cover; " alt="image"> --}}
                      </a>
                  </div>

                  <div class="navbar-collapse1 d-flex align-items-center" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" id="responsive-menu">
                        @forelse ($menuItems as $menuItem)
                            <li class="dropdown submenu {{ request()->is($menuItem->url) ? 'active' : '' }}">
                                <a href="{{ route( 'home.pages', $menuItem->url )}}" class="dropdown-toggle" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    {{ $menuItem->name }} 
                                    @if ($menuItem->dropdownItems->count() > 0)
                                        <i class="icon-arrow-down" aria-hidden="true"></i>
                                    @endif
                                </a>
                                @if ($menuItem->dropdownItems->count() > 0)
                                    <ul class="dropdown-menu">
                                        @foreach ($menuItem->dropdownItems as $dropdownItem)
                                            <li><a href="{{ route( 'home.pages', $dropdownItem->slug )}}">{{ $dropdownItem->name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @empty
                            <li><a href="#">No Navigation item</a></li>
                        @endforelse
                    </ul>
                </div>
                
                  <div class="register-login d-flex align-items-center">
                   
                    {{-- <a class="button button-primary" href="{{ route('register')}}">Join us</a> --}}
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="me-2">
                        <i class="fa fa-user"></i> Book Inspection
                    </a>
                        
                     
                      
                      <div class="header_sidemenu me-3">
                          <div class="mhead">
                              <span class="menu-ham">
                                  <a href="#" class="cart-icon d-flex align-items-center ms-1"><i
                                          class="fa fa-th-large fs-5 black bg-grey p-2"></i></a>
                              </span>
                          </div>
                      </div>
                      {{-- <a href="#" class="nir-btn white">Add Listing</a> --}}
                  </div>
                 
                  <div id="slicknav-mobile"></div>
              </div>
          </div>
      </nav>
  </div>

</header>
