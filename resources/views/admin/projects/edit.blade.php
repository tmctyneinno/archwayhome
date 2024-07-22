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
                    <h2 class="text-black font-w600">Project</h2>
                    <p class="mb-0">Welcome to Archway Home backend</p>
                </div>
                <a href="{{route('admin.project.index')}}" class="btn btn-primary rounded light">View Project</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 align-center">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Update Project</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
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
                
                                
                                <form method="POST"  action="{{ route('admin.project.update',  $project->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($project))
                                        @method('PUT')
                                    @endif
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Title"  value="{{ old('title', $project->title ?? '') }}"  name="title" id="title" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Sub title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Sub title" value="{{ old('title', $project->sub_title ?? '') }}" name="sub_title" id="sub_title" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Location</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Location" name="location" id="location" value="{{ $project->location }}"  required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Land Size</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Land size" name="land_size"  id="land_size" value="{{ $project->land_size }}"  required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Select Project type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control default-select mb-3" name="project_menu_id" required>
                                                <option  selected disabled>Select Project type</option>
                                                @foreach ($projectMenus as $menu)
                                                    <option value="{{ $menu->id }}" {{ $menu->id == $project->project_menu_id ? 'selected' : '' }}>
                                                        {{ $menu->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Content</label>
                                        <div class="col-sm-9">
                                            <div class="">
                                                <textarea name="content" id="content" class="form-control" required>{{ old('content', $project->content ?? '') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Upload Brochure</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="brochure" id="brochure" accept="application/pdf">
                                            @if(isset($project) && $project->brochure)
                                                <a href="{{ asset($project->brochure) }}" target="_blank" class="text-primary">View current brochure</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Upload Land Payment Plan</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" placeholder="Location" name="landPaymentPlan" id="land_payment_plan" accept="image/png, image/jpeg, image/gif" >
                                            @if(isset($project) && $project->land_payment_plan)
                                                <img id="image-preview" src="{{ isset($project) ? asset($project->land_payment_plan) : '' }}" alt="Image Preview" class="img-thumbnail mt-2" style="{{ isset($project) ? '' : 'display:none;' }} max-width: 200px;">
                                             @endif
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Upload Subcription Form</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control"  name="subscription_forms" id="subscription_forms" accept="application/pdf" >
                                            @if(isset($project) && $project->subscription_form)
                                               <a href="{{ asset($project->subscription_form) }}" target="_blank" class="text-primary">View Subcription Form</a>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label"> Video Link</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Video link" value="{{ old('title', $project->video_link ?? '') }}" name="video_link" id="video_link" required>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Project Image</label>
                                        <div class="col-sm-9">
                                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" accept="image/jpeg,image/png,image/gif" onchange="previewImage(event)">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="text-danger">Maximum file size: 2MB. Allowed file types: JPEG, PNG, JPG, GIF.</small>
                                            <img id="image-preview" src="{{ isset($project) ? asset($project->image) : '' }}" alt="Image Preview" class="img-thumbnail mt-2" style="{{ isset($project) ? '' : 'display:none;' }} max-width: 200px;">
                                        </div>
                                    </div>
                                  
                                    <div class="mb-3 row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Update Project</button>
                                        </div>
                                    </div>
                                   
                                </form>
                                <script>
                                    // Initialize CKEditor

                                    function previewImage(event) {
                                        const input = event.target;
                                        const preview = document.getElementById('image-preview');
                                        
                                        if (input.files && input.files[0]) {
                                            const reader = new FileReader();
                                            
                                            reader.onload = function(e) {
                                                preview.src = e.target.result;
                                                preview.style.display = 'block';
                                            };
                                            
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>
                                <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
                                <script>
                                    CKEDITOR.replace('content');
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