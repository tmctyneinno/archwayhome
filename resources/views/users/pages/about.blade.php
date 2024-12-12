@extends('layouts.app')

@section('content')

<section class="breadcrumb-main pb-0 pt-20" style="background-image: url({{ asset($aboutUs->header_image) }});">
  <div class="breadcrumb-outer">
      <div class="container">
          <div class="breadcrumb-content d-md-flex align-items-center pt-6">
              <h1 class="mb-0">About Us</h1>
              <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">About Us</li>
                  </ul>
              </nav>
          </div>
      </div>
  </div>
  <br>
  <div class="dot-overlay"></div>
</section>

<section class="about-us pb-3">
  <div class="container">
      <div class="about-image-box">
         
          <div class="row   text-lg-start justify-center">
              <div class="col-lg-7 col-sm-12 mb-4">
                  <div class="about-content">
                      <h4 class="theme d-inline-block">About Us</h4>
                      {{-- <h3 class="border-b mb-2 pb-2">{{$aboutUs->title}}</h3> --}}
                      <p class="border-b mb-2 pb-2 text-wrap" >
                        {!! ($aboutUs->content) !!}
                      </p>
                  </div>
              </div>
              <div class="col-lg-5 col-sm-12 mb-4">
                

                  <div class="about-image mt-10 p-3 box-shadow position-relative">
                      <img src="{{ asset($aboutUs->image)}}" alt class="w-100">
                     
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@include('users.pages.core_value')
@include('users.pages.services')
@include('users.pages.why_choose_us_aboutus')

    
  
  {{-- Your existing Blade section --}}
  <section class="our-team " style="">
    <div class="container">
      <div class="section-title mb-6 pb-1 w-75 text-center mx-auto">
        <h2 class="m-0"> Our <span>Team </span></h2>
      </div>
      <div class="team-main ">
        <div class="row mb-3 justify-content-center">
          @forelse ($teams as $team)
              @if ($loop->first)
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-4 text-center">
                      <div class="team-image" style="box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);">
                          <img src="{{ asset($team->image) }}" alt="team" class="img-fluid" style="max-width: 477px; height: auto;">
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                      <h2 class="border-b" style="color: #000052;">{{$team->name}}</h2>
                      <h5 class="theme">{{$team->position}}</h5>
                      <p class="mb-3">
                          {!! Str::limit($team->content, 920, '') !!}
                      </p>
                      <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalTeam" class="nir-btn">
                          Read more <i class="fa fa-arrow-right white pl-1"></i>
                      </a>
                  </div>
              @endif
          @empty
              <p>No Data</p>
          @endforelse
      </div>
      
      <style>
        .team-image {
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);
            max-width: 477px; /* Optional: can be controlled by Bootstrap */
            margin: 0 auto;   /* Centers the team-image div */
        }

      </style>
      
      </div>
          <div class="section-title mb-6 pb-1 w-75 text-center mx-auto">
            <h2 class="m-0"> <span>Management </span></h2>
          </div>
 
          <div class="row justify-content-center mb-4">
            @forelse ($teams as $team)
                @if ($loop->first)
                    @continue
                @endif
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4 ml-4 mr-4">
                    <div class="position-relative">
                        <div class="team-image" style="
                            height: 400px; 
                            border-radius: 20px; 
                            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
                            overflow: hidden;">
                            <img src="{{ asset($team->image) }}" alt="team" class="img-fluid h-100 " style="object-fit: fill;">
                            <!-- Floating button with data attributes -->
                            <a href="#" 
                               data-bs-toggle="modal" 
                               data-bs-target="#exampleModalManagement" 
                               data-name="{{$team->name}}" 
                               data-position="{{$team->position}}"
                               data-content="{{ $team->content }}"
                               class="btn btn-primary position-absolute" 
                               style="background: rgba(0, 0, 82, 0.7); bottom: 150px; left: 50%; transform: translateX(-50%);">
                                Learn more
                            </a>
                        </div>
                        <div class="team-content text-center p-3 bg-white">
                            <h4 class="mb-0 text-uppercase">
                                <a href="{{ route('users.team.detail', encrypt($team->id)) }}">
                                    {{$team->name}}
                                </a>
                            </h4>
                            <p class="mb-0 text-uppercase">{{$team->position}}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center w-100">No Data</p>
            @endforelse
        </div>
        



      </div>
    </div>
  </section>
  

  <!-- Team-->
  <div class="modal modal-dialog-scrollable  " id="exampleModalTeam" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          @forelse ($teams as $team)
            @if ($loop->first)
              <div class="col-lg-12">
                <h2 class="border-b" style="color:#000052">{{$team->name}}</h2>
                <h5 class="theme">{{$team->position}}</h5>
                  <p class="mb-3 text-justify">
                      {!! $team->content!!}
                  </p>
              </div>
            @endif
          @empty
            <p>No Data</p>
          @endforelse
          </div>
        
        </div>
      </div>
  </div>
    
  <!-- Management -->

  <div class="modal modal-dialog-scrollable " id="exampleModalManagement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="modalTitle"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <h6 id="modalPosition"></h6>
                  <p id="modalContent"></p>
              </div>
          </div>
      </div>
  </div>


@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    var exampleModalManagement = document.getElementById('exampleModalManagement');
    
    exampleModalManagement.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        
        var name = button.getAttribute('data-name');
        var position = button.getAttribute('data-position');
        var content = button.getAttribute('data-content');
        
        var modalTitle = exampleModalManagement.querySelector('.modal-title');
        var modalPosition = exampleModalManagement.querySelector('#modalPosition');
        var modalContent = exampleModalManagement.querySelector('#modalContent');
        
        modalTitle.textContent = name;
        modalPosition.textContent = position;
        modalContent.innerHTML = content;
    });
});

</script>
<style>
.modal-dialog {
    max-height: 90vh; /* Set a maximum height for the modal */
    margin-top: auto;
    margin-bottom: auto;
} 

.modal-body {
    overflow-y: auto; /* Enables vertical scrolling */
    max-height: 70vh; /* Limits the height of the modal body to ensure space for scrolling */
}

</style>