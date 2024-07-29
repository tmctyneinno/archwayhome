

<div class="content-line m-0">
    <div class="content-line-inner bg-theme2 pb-6 pt-6 p-5">
        <div class="container">
            <div class="row d-md-flex align-items-center justify-content-between text-lg-start text-center">
                <div class="col-lg-9">
                    <h2 class="mb-0 white">
                        Looking for a dream home? 
                    </h2>
                    <p class="white">We can help you realize your dream of a new home</p>
                </div>
                <div class="col-lg-3">
                    <a href="{{ route('home.pages', 'projects') }}" class="nir-btn-black float-lg-end float-none">Fine More
                        Project</a>
                </div>
            </div>
        </div>
    </div>
  </div> 
  
   <footer class="pt-10 footermain">
    <div class="footer-upper pb-4" >
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="footer-about">
                        {{-- <img src="{{ asset($contactUs->site_logo) }}" alt style=" width: 150px; height: 80px; object-fit: cover; "> --}}
                        <img src="{{ asset($contactUs->site_logo) }}" alt style=" width: 120px;  object-fit: cover; ">
                        {{-- <p class="mt-3 mb-3 white text-white">
                            {!! Str::limit($aboutUs->content, 60) !!}
                        </p> --}}
                        {{-- <p>
                          <a href="{{ route( 'home.pages', 'about-us' )}}" class=" " style="color: #fedc56">Read more</a>
                        </p> --}}
                        <br><br>
                        <ul>
                            <li class="white"><strong>Phone:</strong> {{ $contactUs->first_phone }},  {{ $contactUs->second_phone }}  </li><br>
                            <li class="white"><strong>Location:</strong> {{ $contactUs->first_address }}</li><br>
                            <li class="white"><strong>Email:</strong> 
                              <a href="#"
                                    class="__cf_email__"
                                    data-cfemail="">{{ $contactUs->first_email }}, {{ $contactUs->second_email }}
                              </a>
                             
                            </li><br>
                            <li class="white"><strong>Website:</strong> {{ $contactUs->website_link}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 mb-4">
                    <div class="footer-links">
                        <h3 class="white">Quick link</h3>
                        <ul>
                          @forelse ($quicklinks as $index => $quicklink)
                            <li><a href="{{ route( 'home.pages', $quicklink->slug )}}">{{ $quicklink->name}}</a></li>
                          @empty
                            <li>No quick link</li>
                          @endforelse
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 mb-4">
                    <div class="footer-links">
                          <h3 class="white">Project Tags</h3>
                          <ul >
                              @forelse ($projectMenus as $projectMenu)
                              <li><a class="" href="{{ route('users.projects.type',  $projectMenu->slug ) }}">{{ $projectMenu->name }}</a></li>
                              @empty
                              <li> Coming Soon</li>
                              @endforelse
                          </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="footer-links">
                        <h3 class="white">Popular Posts</h3>
                        <div class="trend-main">
                           @forelse ($recentPosts as $recentPost)
                            <div class="trend-item d-flex align-items-center mb-2">
                                <div class="trend-image w-25 me-4">
                                    <img src="{{ asset( $recentPost->image ) }}" alt="image" style=" width: 87px; height: 58px; object-fit: cover; ">
                                </div>
                                <div class="trend-content-main w-75">
                                    <div class="trend-content">
                                        <h5 class="mb-1">
                                          <a href="{{ route('post-details', encrypt($recentPost->id)) }}">
                                            {{ Str::limit($recentPost->title, 30) }}</a></h5>
                                        <div class="entry-meta">
                                            <div class="entry-metalist d-flex align-items-center">
                                                <small>
                                                  <a href="{{ route('post-details', encrypt($recentPost->id)) }}" class="white"><i
                                                            class="fa fa-calendar"></i> {{ $recentPost->created_at->format('d F Y') }}</a></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           @empty
                               <p> No Post</p>
                           @endforelse
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright pt-2 pb-2">
        <div class="container">
            <div class="copyright-inner d-md-flex align-items-center justify-content-between">
                <div class="copyright-text">
                    <p class="m-0 white">  &copy; {{ date('Y') }}  {{$contactUs->company_name }} . All rights reserved.</p>
                </div>
                <div class="social-links">
                    <ul>
                        <li><a href="{{ $sociallink->facebook }}"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="{{ $sociallink->twitter }}"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                        {{-- <li><a href="{{ $sociallink->instagram }}"><i class="fab fa-instagram" aria-hidden="true"></i></a></li> --}}
                        <li><a href="{{ $sociallink->linkedin }}"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  </footer>
  
  
  <div id="back-to-top">
    <a href="#"></a>
  </div>
  
  
  <div id="search1">
    <button type="button" class="close">×</button>
    <form>
        <input type="search" value placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
  </div>
  
  <div class="modal fade log-reg" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="post-tabs">
  
                    <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
                        <li class="nav-item active" role="presentation">
                            <button aria-controls="register" aria-selected="true" class="nav-link"
                                data-bs-target="#register" data-bs-toggle="tab" id="register-tab" role="tab"
                                type="button">Book Inspection</button>
                        </li>
                    </ul>
  
                    <div class="tab-content blog-full" id="postsTabContent ">
                        @if (session('success'))
                            <script>
                                toastr.success("{{ session('success') }}");
                            </script>
                        @endif
                
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <script>
                                    toastr.error("{{ $error }}");
                                </script>
                            @endforeach
                        @endif
  
                        <div aria-labelledby="register-tab" class="tab-pane fade active show" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="blog-image">
                                        <a href="#"
                                            style="background-image: url( {{ asset('assets/images/trending/trending5.jpg')}});"></a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h4 class="text-center border-b pb-2">Book Inspection</h4>
                                    <form method="post" action="{{ route('book-inspection.store') }}" id="bookInspection">
                                      @csrf  
                                      <div class="form-group mb-2">
                                            <input required type="text" name="fullname" class="form-control" id="fullname"
                                                placeholder="Full Name">
                                        </div>
                                        <div class="form-group mb-2">
                                            <input required type="email" name="email" class="form-control" id="email"
                                                placeholder="Email Address">
                                        </div>
                                        <div class="form-group mb-2">
                                             <input required type="phone" name="phone" class="form-control"
                                                id="phone" placeholder="Phone">
                                        </div>
                                        <div class="form-group mb-2">
                                          <label>Project to Inspect</label>
                                          <select required class="form-group" name="project">
                                              <option disabled selected>Select project</option>
                                              @foreach ($projects as $project)
                                                  <option value="{{ $project->title}}">{{ $project->title}}</option>
                                              @endforeach
                                          </select>
                                           
                                        </div>
                                        <div class="form-group mb-2">
                                          <label>Date of Inspection</label>
                                          <input required type="date" name="inspectionDate" class="form-control"
                                              id="phone" placeholder="Date">
                                        </div>
                                        <div class="form-group mb-2">
                                            <div class="mb-2 captcha">
                                                <span>{!! captcha_img('math') !!}</span>
                                                <button type="button" class="btn btn-danger reload" id="reload">&#x21bb;</button>
                                            </div>
                                            <label>Enter Captcha</label>
                                            <input type="text" name="captcha" class="form-control @error('captcha') is-invalid @enderror" placeholder="Enter Captcha" >
                                       
                                          </div>
                                        <div class="comment-btn mb-2 pb-2 text-center border-b ">
                                            <button type="submit" class="nir-btn" id="bookInspection">Send Message
                                            </button>
                                        </div>
                                        <div id="contactform-error-msg"></div>
                                       
                                    </form>
                                    <script>
                                        function onSubmit(token) {
                                          document.getElementById("bookInspection").submit();
                                        }
                                        $('#bookInspection').submit(function(event) {
                                            event.preventDefault(); 
                                             $('#bookInspection').unbind('submit').submit(); 
                                        });
                                    </script>
                                    
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div class="modal fade log-reg" id="bookInspectionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="post-tabs">
  
                    <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button aria-controls="register" aria-selected="true" class="nav-link"
                                data-bs-target="#register" data-bs-toggle="tab" id="register-tab" role="tab"
                                type="button">Schedule an Inspection</button>
                        </li>
                    </ul>
  
                    <div class="tab-content blog-full" id="postsTabContent ">
                        {{-- @if (session('success'))
                            <script>
                                toastr.success("{{ session('success') }}");
                            </script>
                        @endif --}}
                
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <script>
                                    toastr.error("{{ $error }}");
                                </script>
                            @endforeach
                        @endif
  
                        <div aria-labelledby="register-tab" class="tab-pane fade active show" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="blog-image">
                                        <a href="#"
                                            style="background-image: url( {{ asset('assets/images/trending/trending5.jpg')}});"></a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h4 class="text-center border-b pb-2">Schedule an Inspection</h4>
                                    <form method="post" action="{{ route('book-inspection.store') }}" id="bookInspection">
                                      @csrf  
                                      <div class="form-group mb-2">
                                            <input required type="text" name="fullname" class="form-control" id="fullname"
                                                placeholder="Full Name">
                                        </div>
                                        <div class="form-group mb-2">
                                            <input required type="email" name="email" class="form-control" id="email"
                                                placeholder="Email Address">
                                        </div>
                                        <div class="form-group mb-2">
                                            <input required type="phone" name="phone" class="form-control"
                                                id="phone" placeholder="Phone">
                                        </div>
                                        <div class="form-group mb-2">
                                          <label>Project to Inspect</label>
                                          <select required class="form-group" name="project">
                                              <option disabled selected>Select project</option>
                                              @foreach ($projects as $project)
                                                  <option value="{{ $project->title}}">{{ $project->title}}</option>
                                              @endforeach
                                          </select>
                                           
                                        </div>
                                        <div class="form-group mb-2">
                                          <label>Date of Inspection</label>
                                          <input required type="date" name="inspectionDate" class="form-control"
                                              id="phone" placeholder="Date">
                                      </div>
                                        <div class="comment-btn mb-2 pb-2 text-center border-b ">
                                          <button type="submit" class="nir-btn g-recaptcha"
                                            data-sitekey="{{ config('services.recaptcha.siteKey') }}"
                                            data-callback="onSubmit" data-action="submit" id="submit2">Send Message
                                            </button>
                                        </div>
                                        <div id="contactform-error-msg"></div>
                                       
                                    </form>
                                    <script>
                                        function onSubmit(token) {
                                          document.getElementById("bookInspection").submit();
                                        }
                                    </script>
                                    
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  
  <div class="header_sidemenu">
    <div class="header_sidemenu_in">
        <div class="menu py-5 px-4">
            <div class="close-menu">
                <i class="fa fa-times"></i>
            </div>
            <div class="m-contentmain">
                <div class="m-contentmain">
                    <div class="m-logo mb-5">
                        <img src="{{ asset($contactUs->site_logo) }}"  style=" width: 100px; height: 60px; object-fit: cover; " alt="m-logo">
                    </div>
                    <div class="content-box mb-5">
                        <h3 class>Get In Touch</h3>
                        <p class="mb-2">We’ll get back to you soon</p>
                        <a href="{{ route('home.pages', 'contact') }}" class="nir-btn">Consultation</a>
                    </div>
                    <div class="contact-info1">
                        <h3 class>Contact Info</h3>
                        <ul>
                            <li class="d-block mb-1"><i class="fa fa-map-marker-alt me-2"></i>{{ $contactUs->first_address}}</li>
                            <li class="d-block mb-1"><i class="fa fa-phone-alt me-2"></i>{{ $contactUs->first_phone}}</li>
                            <li class="d-block mb-1"><i class="fa fa-envelope-open me-2"></i><a
                                    href="#" class="__cf_email__"
                                    data-cfemail="85f6f0f5f5eaf7f1c5f7e0e4e9f6edece0e9e1abe6eae8">{{ $contactUs->first_email}}</a>
                            </li>
                            <li class="d-block"><i class="fa fa-clock me-2"></i> Open Time: 09.00am to 6.00pm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay hide"></div>
    </div>
  </div>