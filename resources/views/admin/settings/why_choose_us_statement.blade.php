<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Why Choose us statement</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
               
               

                
                <form method="POST" action="{{ isset($whyChooseUs) ? route('admin.settings.update_why_choose_us', $whyChooseUs->id) : route('admin.settings.store_why_choose_us') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset($whyChooseUs))
                        @method('PUT')
                    @endif 
                    <div class="row">
                        <div class="mb-3 col-md-10"> 
                            <label class="form-label">Why Choose Us Statements</label>
                            <textarea id="why_choose_us" class="form-control" placeholder="Why Choose Us Statements" name="why_choose_us" rows="8" spellcheck="false" required> {{ isset($whyChooseUs) ? $whyChooseUs->why_choose_us_statements : '' }}</textarea>
                        </div>
                        <div class="mb-3 col-md-10"> 
                            <label class="form-label">Why Choose Us Image</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required onchange="previewImage(event)">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                            <small class="text-danger">Maximum file size: 2MB. Allowed file types: JPEG, PNG, JPG, GIF.</small>
                            <br>
                            <img id="image-preview" src="" alt="Image Preview" class="img-thumbnail mt-2" style="display:none; max-width: 200px;">
                            @if(empty($whyChooseUs->image))
                            @else
                                <img src="{{ asset($whyChooseUs->image) }}" alt="{{ $whyChooseUs->title }}" class="img-thumbnail mt-2" width="200">
                            @endif
                        </div>
                        
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Our core value </label>
                            <textarea id="core_value" class="form-control" placeholder="Mission Statements" name="core_value" rows="8" spellcheck="false" required> {{ isset($whyChooseUs) ? $whyChooseUs->core_values : '' }} </textarea>
                        </div>
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Mission statement</label>
                            <textarea id="caption" class="form-control" placeholder="Mission Statements" name="mission" rows="8" spellcheck="false" required> {{ isset($whyChooseUs) ? $whyChooseUs->mission : '' }} </textarea>
                        </div>
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Vision statement</label>
                            <textarea id="caption" class="form-control" placeholder="Vision Statements" name="vision" rows="8" spellcheck="false" required> {{ isset($whyChooseUs) ? $whyChooseUs->vision : '' }} </textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($whyChooseUs) ? 'Update' : 'Add' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('core_value');
    CKEDITOR.replace('why_choose_us');
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