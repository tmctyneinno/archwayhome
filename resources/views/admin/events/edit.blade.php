@extends('layouts.admin')
@section('content')

<div id="main-wrapper">
     <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start">
                <div class="me-auto d-lg-block d-block">
                    <h2 class="text-black font-w600">Events</h2>
                    <p class="mb-0">Welcome to Archway Home backend</p>
                </div>
                <a href="{{route('admin.events.index')}}" class="btn btn-primary rounded light">View event</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 align-center">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Event</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                @if(session('success'))
                                    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert" >
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
                
                                
                                <form method="POST"  action="{{ route('admin.events.update', $event->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Title" name="title" id="title" required value="{{ $event->title }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Video Embed Code link</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Video YouTube link" name="video_link" id="video_link" value="{{ $event->video_link }}" required>
                                            <small class="text-info">Get the Embed Code not the youTube link</small>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row align-items-center">
                                        <label for="images" class="col-sm-3 col-form-label form-label">Images</label>
                                        <div class="col-sm-9">
                                            <!-- Existing images -->
                                            @if ($event->images)
                                                @foreach (json_decode($event->images, true) as $image)
                                                    <img src="{{ asset($image) }}" alt="{{ $event->title }}" class="img-thumbnail mt-2" width="200">
                                                @endforeach
                                            @else
                                                <p>No images found</p>
                                            @endif
                                
                                            <!-- Upload new images -->
                                            <input id="images" type="file" class="form-control @error('images.*') is-invalid @enderror" name="images[]" multiple accept="image/jpeg,image/png,image/jpg,image/gif" onchange="previewImages(event)">
                                            @error('images.*')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <!-- Image preview -->
                                            <div id="image-preview-container" class="mt-2"></div>
                                
                                            <small class="text-danger">Maximum file size: 2MB. Allowed file types: JPEG, PNG, JPG, GIF.</small>
                                        </div>
                                    </div>
                                      
                                    
                                  
                                    <div class="mb-3 row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Update event</button>
                                        </div>
                                    </div>
                                   
                                </form>
                                <script>
                                   
                                    function previewImages(event) {
                                        var previewContainer = document.getElementById('image-preview-container');
                                        previewContainer.innerHTML = '';

                                        var files = event.target.files;

                                        for (var i = 0; i < files.length; i++) {
                                            var file = files[i];
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                var img = document.createElement('img');
                                                img.src = e.target.result;
                                                img.className = 'img-thumbnail mt-2';
                                                img.width = 200;
                                                previewContainer.appendChild(img);
                                            };

                                            reader.readAsDataURL(file);
                                        }
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
@endsection