@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Events</a></li>
                
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
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
                            <h3 class="card-title">Events List</h3>
                        </div>
                        <div class="clearfix text-center">
                            <a href="{{route('admin.events.create')}}" class="btn btn-primary">Add Event</a>
                        </div>
                    </div>

                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Title</th>
                                        <th>Video Link</th>
                                        <th>Image</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($events as $index => $event)
                                        <tr>
                                            <td><strong>{{ $events->firstItem() + $index }}</strong></td>
                                            <td>{{ $event->title }}</td>
                                            <td>{{ $event->video_link }}</td>
                                            <td>
                                                @if ($event->images)
                                                    @foreach (json_decode($event->images, true) as $image)
                                                        <img style="width: 100px; height: 100px; object-fit: cover;" src="{{ asset($image) }}" class="img-thumbnail" alt="{{ $event->title }}">
                                                    @endforeach
                                                @else
                                                    <p>No images found</p>
                                                @endif
                                            </td>
                                            
                                            
                                            <td>{{ $event->created_at->format('d F Y') }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('admin.events.edit', encrypt($event->id)) }}">Edit</a>
                                                        <a class="dropdown-item text-danger" href="{{ route('admin.events.destroy', encrypt($event->id)) }}" onclick="return confirm('Are you sure you want to delete this Event?');">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No event items found.</td>
                                        </tr>
                                    @endforelse
                                 </tbody>
                            </table>
                            
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <p class="mb-2 me-3">
                                    Page {{ $events->currentPage() }} of {{ $events->lastPage() }}, showing {{ $events->count() }} records out of {{ $events->total() }} total, starting on record {{ $events->firstItem() }}, ending on record {{ $events->lastItem() }}
                                </p> 
                                <nav aria-label="Page navigation example mb-2">
                                  <ul class="pagination mb-2 mb-sm-0">
                                    <!-- Previous Page Link -->
                                    <li class="page-item {{ $events->onFirstPage() ? 'disabled' : '' }}">
                                      <a class="page-link" href="{{ $events->previousPageUrl() }}">
                                        {{-- <i class="fa-solid fa-angle-left"></i> --}}
                                        <i>Previous</i>
                                      </a>
                                    </li>

                                    <!-- Pagination Elements -->
                                    @for ($i = 1; $i <= $events->lastPage(); $i++)
                                      <li class="page-item {{ $events->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $events->url($i) }}">{{ $i }}</a>
                                      </li>
                                    @endfor

                                    <!-- Next Page Link -->
                                    <li class="page-item {{ $events->hasMorePages() ? '' : 'disabled' }}">
                                      <a class="page-link" href="{{ $events->nextPageUrl() }}">
                                        {{-- <i class="fa-solid fa-angle-right"></i> --}}
                                        <i>Next</i>
                                      </a>
                                    </li>
                                  </ul>
                                </nav>
                            </div>
                            
                    
                        </div>
                    </div>
                    
                </div>
            </div>
           
          
           
            
           
        </div>
    </div>
</div>
    @endsection