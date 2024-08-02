<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Office Hours</h4>
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
                <script>
                    window.setTimeout(function() {
                       var alert = document.getElementById('success-alert');
                       if (alert) {
                           alert.remove();
                       }
                   }, 3000);
               </script>

                 
                <form method="POST" action="{{ isset($officeHour) ? route('admin.office-hours.update', $officeHour->id) : route('admin.office-hours.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset($officeHour))
                        @method('PUT')
                    @endif
                    <div class="row">
                        
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Content</label>
                            <textarea class="form-control" placeholder="Content" name="content" rows="3" spellcheck="false" required> {{ isset($officeHour) ? $officeHour->content : '' }}</textarea>
                        </div>
                       
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($officeHour) ? 'Update' : 'Add' }}</button>
                </form>
                
            </div>
        </div>
    </div>
</div>

