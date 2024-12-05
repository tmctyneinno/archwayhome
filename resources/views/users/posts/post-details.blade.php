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
  <br>
  <div class="dot-overlay"></div>
</section>
<!-- BreadCrumb Ends --> 

<section class="blog blog-left pt-10">
  <div class="container">
      <div class="row">
          <div class="col-lg-8 col-md-12 col-sm-12">
              <div class="blog-single">
                  <div class="blog-single-in d-md-flex align-items-center mb-4 text-center text-md-start">
                      <div class="blog-date me-4">
                          <div class="date text-center bg-theme p-5 py-4">
                              <div class="month white">
                                {{ \Carbon\Carbon::parse($postDetails->created_at)->isoFormat('DD MMMM, YYYY') }}

                              </div>
                          </div>
                      </div>
                      <div class="blog-single-in-cont w-75">
                          <div class="blog-content">
                              <h3 class="blog-title mb-0"><a href="#" class=''>{{ $postDetails->title }}</a></h3>
                          </div>
                      </div>
                  </div>
                  <div class="blog-wrapper">
                      <div class="blog-content">
                          <div class="blog-imagelist mb-3">
                              <img src="{{ asset($postDetails->image) }}" alt="image" >
                          </div>
                          <p class="mb-3">
                            {!! $postDetails->content !!}
                          </p>
                      </div>

                      <div class="single-comments single-box mb-4">
                          <h5 class="mb-4">Showing {{ $postDetails->comments->count() }}  verified guest comments</h5>
                            @foreach ($postDetails->comments as $comment)
                                <div class="comment-box">
                                    @include('users.posts.comment', ['comment' => $comment])
                                </div>
                            @endforeach
                      </div>

                      <div class="single-add-review">
                          <h4 class>Write a Review</h4>
                          <form id="commentForm_{{ $postDetails->id }}" >
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-2">
                                        <input type="text" name="author_name" placeholder="Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-2">
                                        <input type="email" name="author_email" placeholder="Email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-1">
                                    <div class="form-group">
                                        <textarea name="content" placeholder="Comment" class="form-control"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="post_id" value="{{ $postDetails->id }}">
                                <input type="hidden" name="parent_id" value="">
                                <div class="col-lg-6">
                                    <div class="form-btn">
                                        <button type="submit" class="nir-btn" >Submit Review</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
              </div>
          </div>

          <div class="col-lg-4 col-md-12">
              <div class="sidebar-sticky">
                  <div class="list-sidebar">
                     
                      <div class="popular-post sidebar-item mb-4">
                          <div class="sidebar-tabs">
                              <div class="post-tabs">

                                  <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab1" role="tablist">
                                      <li class="nav-item" role="presentation">
                                          <button aria-controls="popular" aria-selected="false"
                                              class="nav-link active" data-bs-target="#popular"
                                              data-bs-toggle="tab" id="popular-tab" role="tab"
                                              type="button">Recent Post</button>
                                      </li>
                                     
                                  </ul>

                                  <div class="tab-content" id="postsTabContent1">

                                      <div aria-labelledby="popular-tab" class="tab-pane fade active show"
                                          id="popular" role="tabpanel">
                                          @forelse ($recentPosts as $recentPost)
                                          <article class="post mb-3 border-b pb-3">
                                              <div
                                                  class="s-content d-flex align-items-center justify-space-between">
                                                  <div class="sidebar-image w-25 me-3">
                                                      <a href="#"><img src="{{ asset( $recentPost->image ) }}"
                                                              alt style=" width: 87px; height: 58px; object-fit: cover; "></a>
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

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $('[id^="commentForm_"]').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission
            
            var formId = $(this).attr('id'); // Get the ID of the form being submitted
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            const formData = new FormData(this);
            $.ajax({ 
                type: 'POST',
                url: '{{ route("comments.store") }}',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response) {
                    toastr.success("Comment submitted successfully");
                    setTimeout(function() {
                        window.location.reload(); // Reload the page after a short delay
                    }, 2000); // Reload after 2 seconds (adjust as needed)
        
                    $('#' + formId)[0].reset(); // Reset form fields using the form ID
                },
                error: function(error) {
                    toastr.error('Error submitting comment');
                    console.error('Error:', error);
                }
            });
        });
    });
</script>
