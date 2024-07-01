@extends('layouts.app')

@section('content')
     <!-- BreadCrumb Starts -->  
     <section class="breadcrumb-main pb-0 pt-20" style="background-image: url({{ asset($aboutUs->header_image) }});">
      <div class="breadcrumb-outer">
          <div class="container">
              <div class="breadcrumb-content d-md-flex align-items-center pt-6">
                  <h1 class="mb-0">Blog </h1>
                  <nav aria-label="breadcrumb">
                      <ul class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Blog</li>
                      </ul>
                  </nav>
              </div>
          </div>
      </div>
      <div class="dot-overlay"></div>
  </section>
  <!-- BreadCrumb Ends --> 

 <!-- blog starts -->
 <section class="blog">
  <div class="container">
      <div class="row">
          <div class="col-lg-8">
              <div class="listing-inner">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="list-results d-flex align-items-center justify-content-between">
                              <div class="list-results-sort">
                                  <p>Showing {{ $posts->firstItem() }}-{{ $posts->lastItem() }} of {{ $posts->total() }} results</p>
                              </div>
                              
                          </div>
                      </div>
                      @forelse ($posts as $post)
                      <div class="col-lg-6 mb-4">
                          <div class="trend-item box-shadow bg-white">
                              <div class="trend-image">
                                  <img style="width: 364px; height: 242px; object-fit: cover;" src="{{ asset($post->image) }}" alt="Image">
                              </div>
                              <div class="trend-content-main p-4">
                                  <div class="trend-content">
                                      {{-- <h5 class="theme">Design</h5> --}}
                                      <h4><a href="{{ route('post-details',encrypt($post->id)) }}">{{ Str::limit($post->title, 50) }}</a></h4>
                                      {{-- <p class="mb-2">{!! Str::limit($post->content, 100) !!}</p> --}}
                                      <div class="entry-meta d-flex align-items-center justify-content-between">
                                         
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @empty
                      <div class="col-lg-12">
                          <div class="alert alert-info" role="alert">
                              No posts found.
                          </div>
                      </div>
                  @endforelse
                  

                   
                  </div>

                  <div class="pagination-main text-center">
                    <ul class="pagination">
                           
                      @if ($posts->onFirstPage())
                          <li class="disabled"><span><i class="fa fa-angle-double-left" aria-hidden="true"></i></span></li>
                      @else
                          <li><a href="{{ $posts->previousPageUrl() }}"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                      @endif
              
        
                      @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                          @if ($page == $posts->currentPage())
                              <li class="active"><span>{{ $page }}</span></li>
                          @else
                              <li><a href="{{ $url }}">{{ $page }}</a></li>
                          @endif
                      @endforeach
              
                    
                      @if ($posts->hasMorePages())
                          <li><a href="{{ $posts->nextPageUrl() }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                      @else
                          <li class="disabled"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></li>
                      @endif
                  </ul>
                  </div>
              </div>
          </div>

          <!-- sidebar starts -->
          <div class="col-lg-4 col-md-12">
              <div class="sidebar-sticky">
                  <div class="list-sidebar">
             

                      <div class="popular-post sidebar-item mb-4">
                          <div class="sidebar-tabs">
                              <div class="post-tabs">
                                  <!-- tab navs -->
                                  <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab1" role="tablist">
                                      
                                      <li class="nav-item" role="presentation">
                                          <button aria-controls="recent" aria-selected="true" class="nav-link" data-bs-target="#recent" data-bs-toggle="tab" id="recent-tab" role="tab" type="button">Recent</button>
                                      </li>
                                  </ul>
                                  <!-- tab contents -->
                                  <div class="tab-content" id="postsTabContent1">
                                    
                                      <!-- Recent posts -->
                                      <div aria-labelledby="recent-tab" class="tab-pane fade active show" id="recent" role="tabpanel">
                                        @forelse ($recentPosts as $recentPost)
                                        <article class="post mb-3 border-b pb-3">
                                            <div class="s-content d-flex align-items-center justify-space-between">
                                                <div class="sidebar-image w-25 me-3">
                                                    <a href="{{ route('post-details', encrypt($recentPost->id)) }}">
                                                      <img src="{{ asset( $recentPost->image ) }}" alt="" style=" width: 87px; height: 58px; object-fit: cover; "></a>
                                                </div>
                                                <div class="content-list w-75">
                                                    <h5 class="mb-1">
                                                      <a href="{{ route('post-details', encrypt($recentPost->id) ) }}">
                                                        {{ Str::limit($recentPost->title, 30) }}
                                                      </a></h5>
                                                    <div class="date">{{ $recentPost->created_at->format('d F Y') }}</div>
                                                </div>    
                                            </div> 
                                        </article>
                                        @empty
                                        <div class="col-lg-12">
                                            <div class="alert alert-info" role="alert">
                                                No posts found.
                                            </div>
                                        </div>
                                        @endforelse  
                                        

         
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
<!-- blog Ends -->  



   







@endsection