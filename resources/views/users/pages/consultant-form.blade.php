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
                           
                            <form method="post" action="#" name="contactform2" id="signup-form">
                                <div class="row">
                                    <div class="mb-2 col-6">
                                        <label>Fullname</label>
                                        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Full Name">
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label>Mobile Number</label>
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Mobile Number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-6">
                                        <label>Email Address</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label>Confirm Email Address</label>
                                        <input type="email" name="con_email" class="form-control" id="con_email" placeholder="Confirm Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-6">
                                        <label>Date of Birth</label>
                                        <input type="date" name="dateofbirth" class="form-control" id="dateofbirth" placeholder="Date of Birth">
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control">
                                            <option disabled selected>Select Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-6">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" id="city" placeholder="City">
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label>Country</label>
                                        <input type="text" name="country" class="form-control" id="country" placeholder="Country">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-6">
                                        <label>State</label>
                                        <input type="text" name="state" class="form-control" id="state" placeholder="State">
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" rows="3" placeholder="Address"></textarea>
                                    </div>
                                </div>
                                <h4 class="mb-1">Bank Details</h4>
                                <div class="row">
                                    <div class="mb-2 col-6">
                                        <label>Account Name</label>
                                        <input type="text" name="account_name" class="form-control" id="accountName" placeholder="Account Name">
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label>Account Number</label>
                                        <input type="text" name="account_number" class="form-control" id="accountNumber" placeholder="Account Number">
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label>Bank</label>
                                        <select name="bank" id="bank" class="form-control">
                                            <option value="">Select Bank</option>
                                            {{-- Assuming $banks variable is passed from the controller --}}
                                            @foreach ($banks as $bank)
                                                <option value="{{ $bank->name }}">{{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="contactform-error-msg"></div>
                                <div class="comment-btn text-center">
                                    <button class="nir-btn" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                        
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                        <script>
                            jQuery(document).ready(function ($) {
                                $('#signup-form').submit(function (event) {
                                    event.preventDefault(); 
                        
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    var formData = $(this).serialize();
                                    // alert(formData);
                        
                                    // AJAX request
                                    $.ajax({
                                        type: 'POST',
                                        url: '{{ route("consultant-form.store") }}',
                                        data: formData,
                                        dataType: 'json',
                                        success: function (response) {
                                            if (response.success) {
                                                toastr.success("Consultant form submitted successfully");
                                                setTimeout(function() {
                                                    window.location.reload(); 
                                                }, 2000); 
                                                console.log('Form submitted successfully.');
                                                
                                            } else {
                                                if (response.errors) {
                                                    toastr.error("Failed to submit form. Please check your input.");
                                                    console.error('Error occurred:', response.errors);
                                                    // Display validation errors if any
                                                    $.each(response.errors, function (key, value) {
                                                        $('#contactform-error-msg').html('<div class="alert alert-danger alert-dismissible fade show">'+value+'</div>');
                                                    });
                                                } else {
                                                    toastr.error("Failed to submit form. Unknown error occurred.");
                                                    console.error('Unknown error occurred:', response);
                                                }
                                            }
                                        },
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
