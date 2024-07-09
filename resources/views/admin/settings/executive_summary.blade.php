<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Executive Summary</h4>
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

                 
                <form method="POST" action="{{ isset($executiveSummary) ? route('admin.settings.updateExecutiveSummary', $executiveSummary->id) : route('admin.settings.storeExecutiveSummary') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset($executiveSummary))
                        @method('PUT')
                    @endif
                    <div class="row">
                        
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Content</label>
                            <textarea id="content" class="form-control" placeholder="Content" name="content" rows="8" spellcheck="false" required> {{ isset($executiveSummary) ? $executiveSummary->content : '' }}</textarea>
                        </div>
                       
                        <div class="mb-3 col-md-10">
                            <label class="form-label"> Image </label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"  onchange="previewImage(event)">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if(isset($executiveSummary))
                            <img src="{{ asset($executiveSummary->image) }}" alt="{{ $executiveSummary->title }}" class="img-thumbnail mt-2" width="200">
                            @endif
                            <img id="image-preview" src="" alt="Image Preview" class="img-thumbnail mt-2" style="display:none; max-width: 200px;">
                        </div>
                        <small class="text-danger">Maximum file size: 2MB. Allowed file types: JPEG, PNG, JPG, GIF.</small>
                           
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($executiveSummary) ? 'Update' : 'Add' }}</button>
                </form>
                <script>
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
                    function previewImagebg(event) {
                        const input = event.target;
                        const preview = document.getElementById('image-previewbg');
                        
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
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>