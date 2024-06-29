@extends('layouts.app')

@section('content')
<section class="breadcrumb-main pb-0 pt-20" style="background-image: url({{ asset($aboutUs->header_image) }});">
  <div class="breadcrumb-outer">
      <div class="container">
          <div class="breadcrumb-content d-md-flex align-items-center pt-6">
              <h1 class="mb-0">Project</h1>
              <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Project</li>
                  </ul>
              </nav>
          </div>
      </div>
  </div>
  <div class="dot-overlay"></div>
</section>


<section class="blog trending">
  <div class="container">
      <div class="row flex-row-reverse">
          <div class="col-lg-8">
              <div class="listing-inner">
                  <div class="list-results d-flex align-items-center justify-content-between">
                      <div class="list-results-sort">
                          <p class="m-0">
                            <p>Showing {{ $projectList->firstItem() }}-{{ $projectList->lastItem() }} of {{ $projectList->total() }} results</p>
                          </p>
                      </div>
                      
                  </div>
                  <div class="trend-box">
                      <div class="row">
                        @forelse ($projectList as $project)
                          <div class="col-lg-6 col-md-6 mb-4">
                              <div class="trend-item box-shadow rounded">
                                  <div class="trend-image">
                                      <img src="{{ asset ($project->image)}}" alt="{{ $project->title}}" style="width: 400px; height: 267px; object-fit: cover;">
                                      
                                      <div class="trend-meta d-flex align-items-center justify-content-between">
                                        <div class="entry-author">
                                          <i class="flaticon-location-pin theme"></i>
                                            <span>{{ $project->location }}</span>
                                        </div>
                                          <a href="{{ route('home.project.details', encrypt($project->id))}}"
                                              class="tags bg-theme2 white px-3 py-1">{{ $project->projectMenu->name}}</a>
                                      </div>
                                  </div>
                                  <div class="trend-content p-4">
                                      <h5 class="theme">{{ $project->projectMenu->name}}</h5>
                                      <h4><a href="{{ route('home.project.details', encrypt($project->id))}}">{{ $project->title}}</a>
                                      </h4>
                                      <p class="mb-0">
                                        {!! Str::limit($project->content, 30) !!}
                                      </p>
                                  </div>
                                  <ul class="d-flex align-items-center justify-content-between bg-grey p-3 px-4">
                                      {{-- <li class="me-2"><i class="fa fa-eye"></i> 3 Beds</li> --}}
                                      {{-- <li class="me-2"><i class="fa fa-heart"></i> 2 Baths</li> --}}
                                      <li><i class="fa fa-comments"></i>{{ $project->land_size }}</li>
                                  </ul>
                              </div>
                          </div>
                        @empty
                          <p>No Project Available</p>
                        @endforelse
                      </div>
                      <div class="pagination-main text-center">
                        <ul class="pagination">
                           
                            @if ($projectList->onFirstPage())
                                <li class="disabled"><span><i class="fa fa-angle-double-left" aria-hidden="true"></i></span></li>
                            @else
                                <li><a href="{{ $projectList->previousPageUrl() }}"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                            @endif
                    
              
                            @foreach ($projectList->getUrlRange(1, $projectList->lastPage()) as $page => $url)
                                @if ($page == $projectList->currentPage())
                                    <li class="active"><span>{{ $page }}</span></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                    
                          
                            @if ($projectList->hasMorePages())
                                <li><a href="{{ $projectList->nextPageUrl() }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                            @else
                                <li class="disabled"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></li>
                            @endif
                        </ul>
                      </div>
                    
                  </div>
              </div>
          </div>

          <div class="col-lg-4 col-md-12">
              <div class="sidebar-sticky">
                  <div class="list-sidebar">
                      <div class="sidebar-item mb-4 box-shadow p-4 text-centerb">
                          <h3>Find your home</h3>
                          <form class="form-find">
                              <div class="form-group mb-2">
                                  <input type="text" placeholder="Enter Keywords">
                              </div>
                              <div class="form-group mb-2">
                                  <div class="input-box">
                                      <select class="niceSelect">
                                          <option value="1">Locations</option>
                                          <option value="2">Boston</option>
                                          <option value="3">03</option>
                                          <option value="4">Chicago</option>
                                          <option value="5">Denver</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group mb-2">
                                  <div class="input-box">
                                      <select class="niceSelect">
                                          <option value="1">All Types</option>
                                          <option value="2">Apartment</option>
                                          <option value="3">Villa</option>
                                          <option value="4">Flat</option>
                                          <option value="5">Rooms</option>
                                          <option value="5">House</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group mb-2">
                                  <div class="input-box">
                                      <select class="niceSelect">
                                          <option value="1">All Status</option>
                                          <option value="2">For Rent</option>
                                          <option value="3">For Sale</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group mb-2 d-flex justify-content-between">
                                  <div class="input-box w-50 me-1">
                                      <select class="niceSelect">
                                          <option value="1">Bedrooms</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                      </select>
                                  </div>
                                  <div class="input-box w-50 ms-1">
                                      <select class="niceSelect">
                                          <option value="1">Bathrooms</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group mb-2">
                                  <div class="range-slider mt-0">
                                      <p class="text-start mb-2">Price Range</p>
                                      <div data-min="0" data-max="2000" data-unit="$" data-min-name="min_price"
                                          data-max-name="max_price"
                                          class="range-slider-ui ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                          aria-disabled="false">
                                          <span class="min-value">500 $</span>
                                          <span class="max-value">20000 $</span>
                                          <div class="ui-slider-range ui-widget-header ui-corner-all full"
                                              style="left: 0%; width: 100%;"></div>
                                      </div>
                                      <div class="clearfix"></div>
                                  </div>
                              </div>
                              <div class="form-group mb-2">
                                  <div class="range-slider mt-0">
                                      <p class="text-start mb-2">Area Size</p>
                                      <div data-min="0" data-max="2000" data-unit="$" data-min-name="min_price"
                                          data-max-name="max_price"
                                          class="range-slider-ui ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                          aria-disabled="false">
                                          <span class="min-value">100 sqft</span>
                                          <span class="max-value">20000 sqft</span>
                                          <div class="ui-slider-range ui-widget-header ui-corner-all full"
                                              style="left: 0%; width: 100%;"></div>
                                      </div>
                                      <div class="clearfix"></div>
                                  </div>
                              </div>
                              <div class="form-group text-center w-100">
                                  <input type="submit" class="nir-btn w-100" id="submit3" value="Search">
                              </div>
                          </form>
                      </div>
                      <div class="sidebar-item trending">
                          <h3 class>Related Property</h3>
                          <div class="trend-box">
                              <div class="about-slider">
                                  <div>
                                      <div class="trend-item box-shadow">
                                          <div class="trend-image">
                                              <img src="images/trending/trending2.jpg" alt="image">
                                              <a href="#" class="flash bg-theme1 white px-3 py-2"><i
                                                      class="fa fa-flash"></i></a>
                                              <div
                                                  class="trend-meta d-flex align-items-center justify-content-between">
                                                  <div class="entry-author">
                                                      <img src="images/reviewer/2.jpg" alt
                                                          class="rounded-circle me-1">
                                                      <span>Jenny Lofar</span>
                                                  </div>
                                                  <a href="grid-leftfilter.html"
                                                      class="tags bg-theme2 white px-3 py-1">For Rent</a>
                                              </div>
                                          </div>
                                          <div class="trend-content p-4">
                                              <h5 class="theme">Apartment</h5>
                                              <h4><a href="detail-rightside.html">7012 Shine Sehu Street,
                                                      Liverpool London, LC345AC</a></h4>
                                              <div
                                                  class="entry-meta d-flex align-items-center justify-content-between border-b pb-1 mb-2">
                                                  <div class="entry-author">
                                                      <p>Start From<span
                                                              class="d-block theme fw-bold">$63,000.00</span></p>
                                                  </div>
                                                  <div class="entry-metalist d-flex align-items-center">
                                                      <ul>
                                                          <li class="me-2"><i class="fa fa-eye"></i></li>
                                                          <li class="me-2"><i class="fa fa-heart"></i></li>
                                                      </ul>
                                                  </div>
                                              </div>
                                              <p class="mb-0">Duis aute irure dolor in reprehenderit in voluptate
                                                  velit esse cillum</p>
                                          </div>
                                          <ul
                                              class="d-flex align-items-center justify-content-between bg-grey p-3 px-4">
                                              <li class="me-2"><i class="fa fa-eye"></i> 3 Beds</li>
                                              <li class="me-2"><i class="fa fa-heart"></i> 2 Baths</li>
                                              <li><i class="fa fa-comments"></i> 600 Sq Ft</li>
                                          </ul>
                                      </div>
                                  </div>
                                  <div>
                                      <div class="trend-item box-shadow">
                                          <div class="trend-image">
                                              <img src="images/trending/trending2.jpg" alt="image">
                                              <a href="#" class="flash bg-theme1 white px-3 py-2"><i
                                                      class="fa fa-flash"></i></a>
                                              <div
                                                  class="trend-meta d-flex align-items-center justify-content-between">
                                                  <div class="entry-author">
                                                      <img src="images/reviewer/2.jpg" alt
                                                          class="rounded-circle me-1">
                                                      <span>Jenny Lofar</span>
                                                  </div>
                                                  <a href="grid-leftfilter.html"
                                                      class="tags bg-theme2 white px-3 py-1">For Rent</a>
                                              </div>
                                          </div>
                                          <div class="trend-content p-4">
                                              <h5 class="theme">Villa</h5>
                                              <h4><a href="detail-rightside.html">1244 Vansh Market, Mise Mizkel
                                                      Australia, AU456HA</a></h4>
                                              <div
                                                  class="entry-meta d-flex align-items-center justify-content-between border-b pb-1 mb-2">
                                                  <div class="entry-author">
                                                      <p>Start From<span
                                                              class="d-block theme fw-bold">$52,000.00</span></p>
                                                  </div>
                                                  <div class="entry-metalist d-flex align-items-center">
                                                      <ul>
                                                          <li class="me-2"><i class="fa fa-eye"></i></li>
                                                          <li class="me-2"><i class="fa fa-heart"></i></li>
                                                      </ul>
                                                  </div>
                                              </div>
                                              <p class="mb-0">Duis aute irure dolor in reprehenderit in voluptate
                                                  velit esse cillum</p>
                                          </div>
                                          <ul
                                              class="d-flex align-items-center justify-content-between bg-grey p-3 px-4">
                                              <li class="me-2"><i class="fa fa-eye"></i> 3 Beds</li>
                                              <li class="me-2"><i class="fa fa-heart"></i> 2 Baths</li>
                                              <li><i class="fa fa-comments"></i> 600 Sq Ft</li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="sidebar-item top-post">
                          <h3>Popular Destination</h3>
                          <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                  <div class="trend-item">
                                      <div class="trend-image">
                                          <img src="images/destination/destination13.jpg" alt="image">
                                          <div class="trend-content pt-2">
                                              <h6 class="mb-0"><a href="listing-leftfilter.html">Los Angeles</a>
                                              </h6>
                                              <span>28 Properties</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                  <div class="trend-item">
                                      <div class="trend-image">
                                          <img src="images/destination/destination14.jpg" alt="image">
                                          <div class="trend-content pt-2">
                                              <h6 class="mb-0"><a href="listing-leftfilter.html">New York</a></h6>
                                              <span>45 Properties</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                  <div class="trend-item">
                                      <div class="trend-image">
                                          <img src="images/destination/destination15.jpg" alt="image">
                                          <div class="trend-content pt-2">
                                              <h6 class="mb-0"><a href="listing-leftfilter.html">Florida</a></h6>
                                              <span>32 Properties</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-6">
                                  <div class="trend-item">
                                      <div class="trend-image">
                                          <img src="images/destination/destination16.jpg" alt="image">
                                          <div class="trend-content pt-2">
                                              <h6 class="mb-0"><a href="listing-leftfilter.html">Texas</a></h6>
                                              <span>51 Properties</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>




@endsection