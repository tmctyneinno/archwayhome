@extends('layouts.app')

@section('content')
<section class="bg-default section-md"> 
    <div class="container">
      <div class="row row-60 justify-content-sm-center">
        <div class="col-lg-8 section-divided__main">
          <section class="section-divided__main-section-single post-single-body">
            <h4>{{ $postDetails->title }}</h4>
            <div class="post-meta">
                <div class="group">
                    <a href="#"><time datetime="{{ $postDetails->created_at->format('Y-m-d') }}">{{ $postDetails->created_at->format('d F Y') }}</time></a>
                    <a href="#"> {{ $postDetails->comments->count() }} comment(s)</a>
                </div>
            </div>
            <img class="img-shadow-gray" src="{{ asset($postDetails->image) }}" alt="" width="769" height="410" style="width: 769px; height: 410px; object-fit: cover;"/>
            <div>{!! $postDetails->content !!}</div>
          </section>

          <section class="section-divided__main-section-single">
            <h6>{{ $postDetails->comments->count() }} Comments</h6>
            @foreach ($postDetails->comments as $comment)
                @include('home.comment', ['comment' => $comment])
            @endforeach
          </section>

          <section class="section-divided__main-section-single">
                <h4>Leave a reply</h4>
                @if(session('success'))
                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('home.comments.store') }}">
                    @csrf
                    <div class="form-wrap">
                        <label class="form-label-outside" for="contact-name">Your Name:*</label>
                        <input class="form-input" id="contact-name" type="text" name="author_name" placeholder="Your Name" required>
                    </div>
                    <div class="form-wrap">
                        <label class="form-label-outside" for="contact-email">E-mail:*</label>
                        <input class="form-input" id="contact-email" type="email" name="author_email" placeholder="Email" required>
                    </div>
                    <div class="form-wrap">
                        <label class="form-label-outside" for="contact-message">Comment:*</label>
                        <textarea class="form-input" id="contact-message" name="content" placeholder="Comment" required></textarea>
                    </div>
                    <input type="hidden" name="post_id" value="{{ $postDetails->id }}">
                    <input type="hidden" name="parent_id" value="">
                    <button class="button button-primary" type="submit">Submit</button>
                </form>
            </section>
        </div>

        <div class="col-lg-4 section-divided__aside section-divided__aside-left">
          <div class="ps-lg-4">
            <!-- Search-->
            <section class="section-divided__aside-section">
              <h4>Search</h4>
              <!-- RD Search-->
              <form class="rd-search rd-mailform-inline-flex text-center" action="search-results.html" method="GET" data-search-live="rd-search-results-live">
                <div class="form-wrap">
                  <label class="form-label" for="rd-search-form-input">Enter keyword</label>
                  <input class="form-input" id="rd-search-form-input" type="text" name="s" autocomplete="off"/>
                </div>
                <button class="button button-primary" type="submit">Go!</button>
              </form>
            </section>

            <!-- Posts-->
            <section class="section-divided__aside-section">
              <h4>Recent Posts</h4>
              <ul class="list-sm">
                @forelse ($recentPosts as $recentPost)
                    <li>
                        <!-- Post inline-->
                        <article class="post-inline">
                        <div class="post-inline__header">
                            <span class="post-inline__time">{{ $recentPost->created_at->format('d F Y') }}</span>
                        </div>
                        <h5 class="post-inline__link">
                            <a href="{{ route('home.post.details', $recentPost->id) }}">{{ $recentPost->title }}</a>
                        </h5>
                        </article>
                    </li>
                @empty
                   <li>No Recent Posts</li>
                @endforelse
              </ul>
            </section>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
