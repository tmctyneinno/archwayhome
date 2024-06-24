<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Social links</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
               
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                 
                <form method="POST" action="{{ isset($sociallink) ? route('admin.settings.updateSocialLinks', $sociallink->id) : route('admin.settings.storeSocialLinks') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset($sociallink))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Facebook Link</label>
                            <input type="text" class="form-control" placeholder="Face Link" name="facebook" value=" {{ isset($sociallink) ? $sociallink->facebook : '' }}" required>
                        </div>
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Twitter Link</label>
                            <input type="text" class="form-control" placeholder="Twitter Link" name="twitter" value=" {{ isset($sociallink) ? $sociallink->twitter : '' }}" required>
                        </div>

                        <div class="mb-3 col-md-10">
                            <label class="form-label">WhatsApp Link</label>
                            <input type="text" class="form-control" placeholder="WhatsApp Link" name="whatsapp" value=" {{ isset($sociallink) ? $sociallink->whatsapp : '' }}" required>
                        </div>
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Instagram Link </label>
                            <input type="text" class="form-control" placeholder="Title" name="instagram" value=" {{ isset($sociallink) ? $sociallink->instagram : '' }}" required>
                        </div>
                        <div class="mb-3 col-md-10">
                            <label class="form-label"> Linkedin Link </label>
                            <input type="text" class="form-control" placeholder="Linkedin Link" name="linkedin" value=" {{ isset($sociallink) ? $sociallink->linkedin : '' }}" required>
                        </div>
                        <div class="mb-3 col-md-10">
                            <label class="form-label">YouTube Link</label>
                            <input type="text" class="form-control" placeholder="YouTube Link" name="youtube" value=" {{ isset($sociallink) ? $sociallink->youtube : '' }}" required>
                        </div>
                         
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($sociallink) ? 'Update' : 'Add' }}</button>
                </form>
              
            </div>
        </div>
    </div>
</div>