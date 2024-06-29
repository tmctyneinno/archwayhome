

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
  <div class="footer-upper pb-4">
      <div class="container">
          <div class="row">
              <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                  <div class="footer-about">
                      <img src="{{ asset($contactUs->site_logo) }}" alt style=" width: 160px; height:80px; object-fit: cover; ">
                      <p class="mt-3 mb-3 white text-white">
                          {!! Str::limit($aboutUs->content, 60) !!}
                      </p>
                      <p>
                        <a href="{{ route( 'home.pages', 'about-us' )}}" class=" " style="color: #2db838">Read more</a>
                      </p>
                      <ul>
                          <li class="white"><strong>Phone:</strong> {{ $contactUs->first_phone }} </li><br>
                          <li class="white"><strong>Location:</strong> {{ $contactUs->first_address }}</li><br>
                          <li class="white"><strong>Email:</strong> 
                            <a href="#"
                                  class="__cf_email__"
                                  data-cfemail="670e090108271502060b140f0e020b034904080a">{{ $contactUs->first_email }}
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
                      <div class="tagcloud">
                        @forelse ($projectMenus as $projectMenu)
                          <a class="tag-cloud-link bg-white black p-2 mb-1" href="{{ route('users.projects.type',  $projectMenu->slug ) }}">{{ $projectMenu->name }}</a>
                        @empty
                          <p> No Post</p>
                        @endforelse
                        </div>
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
                                        <a href="{{ route('home.post.detail', $recentPost->id) }}">
                                          {{ Str::limit($recentPost->title, 30) }}</a></h5>
                                      <div class="entry-meta">
                                          <div class="entry-metalist d-flex align-items-center">
                                              <small>
                                                <a href="{{ route('home.post.detail', $recentPost->id) }}" class="white"><i
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
                  <p class="m-0 white">  &copy; {{ date('Y') }}  {{$contactUs->company_name }}. All rights reserved.</p>
              </div>
              <div class="social-links">
                  <ul>
                      <li><a href="{{ $sociallink->facebook }}"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                      <li><a href="{{ $sociallink->twitter }}"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                      <li><a href="{{ $sociallink->instagram }}"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
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
                      <li class="nav-item" role="presentation">
                          <button aria-controls="login" aria-selected="false" class="nav-link active"
                              data-bs-target="#login" data-bs-toggle="tab" id="login-tab" role="tab"
                              type="button">Login</button>
                      </li>
                      <li class="nav-item" role="presentation">
                          <button aria-controls="register" aria-selected="true" class="nav-link"
                              data-bs-target="#register" data-bs-toggle="tab" id="register-tab" role="tab"
                              type="button">Register</button>
                      </li>
                  </ul>

                  <div class="tab-content blog-full" id="postsTabContent">

                      <div aria-labelledby="login-tab" class="tab-pane fade active show" id="login"
                          role="tabpanel">
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="blog-image">
                                      <a href="#"
                                          style="background-image: url(images/trending/trending5.jpg);"></a>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <h4 class="text-center border-b pb-2">Login</h4>
                                  <div class="log-reg-button d-flex align-items-center justify-content-between">
                                      <button type="submit" class="btn btn-fb">
                                          <i class="fab fa-facebook"></i> Login with Facebook
                                      </button>
                                      <button type="submit" class="btn btn-google">
                                          <i class="fab fa-google"></i> Login with Google
                                      </button>
                                  </div>
                                  <hr class="log-reg-hr position-relative my-4 overflow-visible">
                                  <form method="post" action="#" name="contactform" id="contactform">
                                      <div class="form-group mb-2">
                                          <input type="text" name="user_name" class="form-control" id="fname"
                                              placeholder="User Name or Email Address">
                                      </div>
                                      <div class="form-group mb-2">
                                          <input type="password" name="password_name" class="form-control"
                                              id="lpass" placeholder="Password">
                                      </div>
                                      <div class="form-group mb-2">
                                          <input type="checkbox" class="custom-control-input" id="exampleCheck">
                                          <label class="custom-control-label mb-0" for="exampleCheck1">Remember
                                              me</label>
                                          <a class="float-end" href="#">Lost your password?</a>
                                      </div>
                                      <div class="comment-btn mb-2 pb-2 text-center border-b">
                                          <input type="submit" class="nir-btn w-100" id="submit" value="Login">
                                      </div>
                                      <p class="text-center">Don't have an account? <a href="#"
                                              class="theme">Register</a></p>
                                  </form>
                              </div>
                          </div>
                      </div>

                      <div aria-labelledby="register-tab" class="tab-pane fade" id="register" role="tabpanel">
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="blog-image">
                                      <a href="#"
                                          style="background-image: url(images/trending/trending5.jpg);"></a>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <h4 class="text-center border-b pb-2">Register</h4>
                                  <div class="log-reg-button d-flex align-items-center justify-content-between">
                                      <button type="submit" class="btn btn-fb">
                                          <i class="fab fa-facebook"></i> Login with Facebook
                                      </button>
                                      <button type="submit" class="btn btn-google">
                                          <i class="fab fa-google"></i> Login with Google
                                      </button>
                                  </div>
                                  <hr class="log-reg-hr position-relative my-4 overflow-visible">
                                  <form method="post" action="#" name="contactform1" id="contactform1">
                                      <div class="form-group mb-2">
                                          <input type="text" name="user_name" class="form-control" id="fname1"
                                              placeholder="User Name">
                                      </div>
                                      <div class="form-group mb-2">
                                          <input type="text" name="user_name" class="form-control" id="femail"
                                              placeholder="Email Address">
                                      </div>
                                      <div class="form-group mb-2">
                                          <input type="password" name="password_name" class="form-control"
                                              id="lpass1" placeholder="Password">
                                      </div>
                                      <div class="form-group mb-2">
                                          <input type="password" name="password_name" class="form-control"
                                              id="lrepass" placeholder="Re-enter Password">
                                      </div>
                                      <div class="form-group mb-2 d-flex">
                                          <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                          <label class="custom-control-label mb-0 ms-1 lh-1" for="exampleCheck1">I
                                              have read and accept the Terms and Privacy Policy?</label>
                                      </div>
                                      <div class="comment-btn mb-2 pb-2 text-center border-b">
                                          <input type="submit" class="nir-btn w-100" id="submit1"
                                              value="Register">
                                      </div>
                                      <p class="text-center">Already have an account? <a href="#"
                                              class="theme">Login</a></p>
                                  </form>
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
                      <img src="images/logo.png" alt="m-logo">
                  </div>
                  <div class="content-box mb-5">
                      <h3 class>Get In Touch</h3>
                      <p class="mb-2">We must explain to you how all seds this mistakens idea off denouncing
                          pleasures and praising pain was born and I will give you a completed accounts..</p>
                      <a href="#" class="nir-btn">Consultation</a>
                  </div>
                  <div class="contact-info1">
                      <h3 class>Contact Info</h3>
                      <ul>
                          <li class="d-block mb-1"><i class="fa fa-map-marker-alt me-2"></i> Brozon Mall 26,
                              Newyrok NY 10005</li>
                          <li class="d-block mb-1"><i class="fa fa-phone-alt me-2"></i>555 626-0234</li>
                          <li class="d-block mb-1"><i class="fa fa-envelope-open me-2"></i><a
                                  href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                  data-cfemail="85f6f0f5f5eaf7f1c5f7e0e4e9f6edece0e9e1abe6eae8">[email&#160;protected]</a>
                          </li>
                          <li class="d-block"><i class="fa fa-clock me-2"></i> Open Time: 09.00 to 18.00</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
      <div class="overlay hide"></div>
  </div>
</div>