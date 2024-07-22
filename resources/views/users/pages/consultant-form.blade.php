@extends('layouts.app')

@section('content')

<section class="breadcrumb-main pb-0 pt-20" style="background-image: url({{ asset($aboutUs->header_image) }});">
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content d-md-flex align-items-center pt-6">
                <h1 class="mb-0">Consultant Form</h1>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Consultant Form </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <br>
    <div class="dot-overlay"></div>
</section>

<section class="blog pt-10 bg-grey">
    <div class="container">
        <div class="contact-info-main">
            <div class="row">
                <div class="col-lg-10 col-offset-lg-1 mx-auto">
                    <div class="contact-info bg-white pt-10 pb-10 px-5">
                        <div class="contact-info-title text-center mb-4 px-5">
                            <h3 class="mb-1">Realtors Registration Form
                            </h3>
                        </div>
                        
                        <div id="contact-form1" class="contact-form px-5">
                           
                            <form method="post" action="#" name="contactform2" id="consultantForm">
                                @csrf
                                <div class="row">
                                    <div class="mb-2 col-6">
                                        <label>Fullname</label>
                                        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Full Name" required>
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label>Mobile Number</label>
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Mobile Number" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-6">
                                        <label>Email Address</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label>Confirm Email Address</label>
                                        <input type="email" name="con_email" class="form-control" id="con_email" placeholder="Confirm Email" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-6">
                                        <label>Date of Birth</label>
                                        <input type="date" name="dateofbirth" class="form-control" id="dateofbirth" placeholder="Date of Birth" required>
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control" required>
                                            <option disabled selected>Select Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-6">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" id="city" placeholder="City" required>
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label>Country</label>
                                        <input type="text" name="country" class="form-control" id="country" placeholder="Country" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-6">
                                        <label>State</label>
                                        <input type="text" name="state" class="form-control" id="state" placeholder="State" required>
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" rows="3" placeholder="Address" required></textarea>
                                    </div>
                                </div>
                                <h4 class="mb-1">Bank Details</h4>
                                <div class="row">
                                    <div class="mb-2 col-6">
                                        <label>Account Name</label>
                                        <input type="text" name="account_name" class="form-control" id="accountName" placeholder="Account Name" required>
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label>Account Number</label>
                                        <input type="text" name="account_number" class="form-control" id="accountNumber" placeholder="Account Number" required>
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label>Bank</label>
                                        <select name="bank" id="bank" class="form-control" required>
                                            <option value="">Select Bank</option>
                                            {{-- Assuming $banks variable is passed from the controller --}}
                                            @foreach ($banks as $bank)
                                                <option value="{{ $bank->name }}">{{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 captcha">
                                        <span>{!! captcha_img('math') !!}</span>
                                        <button type="button" class="btn btn-danger reload" id="reload">&#x21bb;</button>
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label>Enter Captcha</label>
                                        <input type="text" name="captcha" class="form-control @error('captcha') is-invalid @enderror" placeholder="Enter Captcha" >
                                        @error('captcha') 
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror 
                                    </div>
                                </div>
                                <div id="contactform-error-msg" class="invalid-feedback"></div>
                                <div class="comment-btn text-center">
                                    <button type="submit" class="nir-btn" id="consultantForm"
                                    >Submit 
                                </button>
                                </div>
                            </form>
                        </div>
                       
                        <script>
                            $(document).ready(function() {
                                $('#reload').click(function(){
                                    event.preventDefault();
                                    $.ajax({
                                        type: 'GET',
                                        url: '{{ route('reload.captcha') }}',
                                        success: function(response) {
                                            console.error('response.captch', response.captcha);
                                            $(".captcha span").html(response.captcha);
                                       

                                        },
                                        error: function(xhr, textStatus, errorThrown) {
                                            console.error(' while reloading captcha');
                                            // alert('Error');
                                        }
                                    });
                                });
                                $('#consultantForm').submit(function(event) {
                                    event.preventDefault(); 

                                    // Perform Ajax validation
                                    $.ajax({
                                        type: 'POST',
                                        url: '{{ route("consultant-form.store") }}', 
                                        data: $('#consultantForm').serialize(), 
                                        dataType: 'json',
                                        success: function(response) {
                                            if (response.success) {
                                                // $('#consultantForm').unbind('submit').submit(); 
                                                setTimeout(function() {
                                                    window.location.reload(); 
                                                }, 2000); 
                                                toastr.success(response.successs);
                                            } else {
                                                // Display validation errors
                                                toastr.error(response.errors.join('<br>'));
                                                $('#contactform-error-msg').html('<div class="alert alert-danger">' + response.errors.join('<br>') + '</div>');
                                            }
                                        },
                                        error: function(xhr, textStatus, errorThrown) {
                                            console.error('Error:', errorThrown);
                                        }
                                    });
                                });
                            });
                        </script>
                      
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
