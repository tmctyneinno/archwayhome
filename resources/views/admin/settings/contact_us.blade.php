<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Contact us</h4>
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

                 
                <form method="POST" action="{{ isset($contactUs) ? route('admin.settings.updateContactUs', $contactUs->id) : route('admin.settings.storeContactUs') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset($contactUs))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Company name </label>
                            <input autocomplete="off" type="text" class="form-control" placeholder="Company name" name="company_name" value=" {{ isset($contactUs) ? $contactUs->company_name : '' }}" required>
                       </div>
                       <div class="mb-3 col-md-10">
                            <label class="form-label">Website link </label>
                            <input autocomplete="off" type="text" class="form-control" placeholder="Website link " name="website_link" value=" {{ isset($contactUs) ? $contactUs->website_link : '' }}" required>
                        </div>
                        <div class="mb-3 col-md-10">
                            <label class="form-label">First Phone number</label>
                            <input autocomplete="off" type="phone" class="form-control" placeholder="First Phone number" name="first_phone" value=" {{ isset($contactUs) ? $contactUs->first_phone : '' }}" required>
                        </div>
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Second Phone number</label>
                            <input autocomplete="off" type="phone" class="form-control" placeholder="Second Phone number" name="second_phone" value=" {{ isset($contactUs) ? $contactUs->second_phone : '' }}" >
                        </div>

                        <div class="mb-3 col-md-10">
                            <label class="form-label">First Email </label>
                            <input autocomplete="off" type="email" class="form-control" placeholder="First Email" name="first_email" value=" {{ isset($contactUs) ? $contactUs->first_email : '' }}" required>
                        </div>
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Second Email </label>
                            <input autocomplete="off" type="email" class="form-control" placeholder="Second Email" name="second_email" value=" {{ isset($contactUs) ? $contactUs->second_email : '' }}" >
                        </div>
                        <div class="mb-3 col-md-10">
                            <label class="form-label">First Address </label>
                            <textarea  class="form-control" placeholder="First Address" name="first_address" rows="3" spellcheck="false" required> {{ isset($contactUs) ? $contactUs->first_address : '' }}</textarea>
                        </div>
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Second Address </label>
                            <textarea  class="form-control" placeholder="Second Address" name="second_address" rows="3" spellcheck="false" > {{ isset($contactUs) ? $contactUs->second_address : '' }}</textarea>
                        </div>
                       
                        <div class="mb-3 col-md-10">
                            <label class="form-label"> Site Logo </label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="site_logo"  onchange="previewImage(event)">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if(isset($contactUs)) 
                            <img src="{{ asset($contactUs->site_logo) }}" alt="{{ $contactUs->title }}" class="img-thumbnail mt-2" width="200">
                            @endif
                            <img id="image-preview" src="" alt="Image Preview" class="img-thumbnail mt-2" style="display:none; max-width: 200px;">
                        </div>
                        <small class="text-danger">Maximum file size: 2MB. Allowed file types: JPEG, PNG, JPG, GIF.</small>
                           
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($contactUs) ? 'Update' : 'Add' }}</button>
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
                </script>
            </div>
        </div>
    </div>
</div>