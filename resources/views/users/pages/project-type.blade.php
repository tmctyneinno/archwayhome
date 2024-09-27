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
  <br>
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
                                    <img src="{{ asset($project->image_banner) }}" alt="{{ $project->title }}" class="img-fluid" style="object-fit: contain; width: 100%; height: 300px;">

                                      <div class="trend-meta align-items-center justify-content-between">
                                          <a href="{{ route('home.project.details', encrypt($project->id))}}"
                                              class="tags bg-theme2 white px-3 py-1">{{ $project->projectMenu->name}}</a>
                                      </div>
                                  </div>
                                  <div class="trend-content p-4">
                                      {{-- <h5 class="theme">{{ $project->projectMenu->name}}</h5> --}}
                                      <h4><a href="{{ route('home.project.details', encrypt($project->id))}}">{{ $project->title}}</a>
                                      </h4>
                                      <p class="mb-0">
                                        {!! Str::limit($project->content, 40) !!}
                                      </p>
                                  </div>
                                  {{-- <ul class="d-flex align-items-center justify-content-between bg-grey p-3 px-4">
                                      <li><i class="fa fa-comments"></i>{{ $project->land_size }}</li>
                                  </ul> --}}
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
                          <h3>Find your property</h3>
                          <form class="form-find">
                              <div class="form-group mb-2">
                                  <input type="text" placeholder="Enter Keywords">
                              </div>
                              <div class="form-group mb-2">
                                  <div class="input-box">
                                      <select class="niceSelect">
                                          <option value="1">Lagos</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group mb-2">
                                  <div class="input-box">
                                      <select class="niceSelect">
                                          <option value="1">All Types</option>
                                          @foreach ($projects as $project)
                                              <option value="{{ $project->title}}">{{ $project->title}}</option>
                                          @endforeach
                                      </select>
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
                                @forelse ($relatedProject as $item)
                                  <div>
                                      <div class="trend-item box-shadow">
                                          <div class="trend-image">
                                            <img src="{{ asset($project->image_banner) }}" alt="{{ $project->title }}" class="img-fluid" style="object-fit: contain; width: 100%; height: 300px;">

                                              <div
                                                  class="trend-meta d-flex align-items-center justify-content-between">
                                                 
                                                  <a href="{{ route('home.project.details', encrypt($project->id))}}" class="tags bg-theme2 white px-3 py-1">
                                                    {{ $project->projectMenu->name  }}
                                                  </a>
                                              </div>
                                          </div>
                                          <div class="trend-content p-4">
                                              {{-- <h5 class="theme">Apartment</h5> --}}
                                              <h4><a href="{{ route('home.project.details', encrypt($project->id))}}">
                                                {{ $project->title}}
                                              </a>
                                              </h4>
                                              <p class="mb-0">
                                                {!! Str::limit($project->content, 30) !!}
                                              </p>
                                          </div>
                                          {{-- <ul
                                              class="d-flex align-items-center justify-content-between bg-grey p-3 px-4">
                                             
                                              <li><i class="fa fa-comments"></i> {{ $project->land_size }} </li>
                                          </ul> --}}
                                      </div>
                                  </div>
                                @empty
                                    <p>No Project Available</p>
                                @endforelse
                                 
                                 
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