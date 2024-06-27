<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Why Choose us statement</h4>
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

                
                <form method="POST" action="{{ isset($whyChooseUs) ? route('admin.settings.update_why_choose_us', $whyChooseUs->id) : route('admin.settings.store_why_choose_us') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset($whyChooseUs))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Why Choose Us Statements</label>
                            <textarea id="caption" class="form-control" placeholder="Why Choose Us Statements" name="why_choose_us" rows="8" spellcheck="false" required> {{ isset($whyChooseUs) ? $whyChooseUs->why_choose_us_statements : '' }}</textarea>
                        </div>
                        <div class="mb-3 col-md-10">
                            <label class="form-label">Our core value </label>
                            <textarea id="caption" class="form-control" placeholder="Mission Statements" name="core_value" rows="8" spellcheck="false" required> {{ isset($whyChooseUs) ? $whyChooseUs->core_values : '' }} </textarea>
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