@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Projects</a></li>
                
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-12 align-center mt-2">
                            @if(session('success'))
                                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <script>
                         window.setTimeout(function() {
                            var alert = document.getElementById('success-alert');
                            if (alert) {
                                alert.remove();
                            }
                        }, 3000);
                    </script>

                    <div class="card-header border-0 pb-0">
                        <div class="clearfix">
                            <h3 class="card-title">Projects Menu</h3>
                        </div>
                        
                    </div>

                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Title</th>
                                        <th>DATE   </th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($projectMenus as $index => $projectMenu)
                                        <tr>
                                            <td><strong>{{  $index + 1 }}</strong></td>
                                            <td>{{ $projectMenu->name }}</td>

                                            <td>{{ $projectMenu->created_at->format('d F Y') }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('admin.projectMenu.edit',  encrypt($projectMenu->id) ) }}">Edit</a>
                                                        <a class="dropdown-item text-danger" href="{{ route('admin.projectMenu.destroy', encrypt($projectMenu->id) )  }}" onclick="return confirm('Are you sure you want to delete this project?');">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No Project items found.</td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                                
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Project Menu</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            @if(session('addProjectMenu'))
                                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('addProjectMenu') }}
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
            
                            
                            <form method="POST"  action="{{ route('admin.projectMenu.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Name" name="name" id="name" required>
                                    </div>
                                </div>
                                
                                
                                <br><br>
                                <div class="mb-3 row align-items-center">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary">Create Project Menu</button>
                                    </div>
                                </div>
                               
                            </form>
                           
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
    @endsection