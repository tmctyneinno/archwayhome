@extends('layouts.app')

@section('content')


<script src="<https://www.google.com/recaptcha/api.js>" async defer></script>

<section class="  bg-grey" style="padding-bottom: 0px ">
    <div class="container-fluid">
        <div class="contact-info-main">
            <div class="row">
                <div class="col-lg-4 col-offset-lg-1 d-none d-lg-block" style="background: #FEDC56;text-align:left">
                    <div class="breadcrumb-content align-items-center pt-20" >
                      <h3 style="color: #000052; padding-top: 300px" >Archwayhome and Investment Limited</h3>  
                    </div>
                </div>
                <div class="col-lg-8 col-offset-lg-1 mx-auto">
                    <div class="contact-info bg-white pt-10 pb-10 px-0">
                        
                        <div class="contact-info-title text-center mb-2 px-5">
                            <h3 class="mb-1">Realtors Registration Form
                            </h3>
                        </div>
                        @if(isset($referralDetails))
                        <div style="background:#000052; border-radius:8px" class="text-center alert alert-info alert-dismissible fade show p-2" role="alert">
                            <span style="color: #fff; padding-right:20px">You are being refered by {{$referralDetails->fullname}}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @else
                        <div style="background:#000052; border-radius:8px" class="text-center alert alert-warning alert-dismissible fade show p-2" role="alert">
                            <span style="color: #fff; padding-right:20px">You are being refered by Ackwayhome and Investment Limited</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        
                        <div id="contact-form1" class="contact-form px-5 pt-2">
                           
                            <form method="post" action="" name="contactform2" id="consultantForm">
                                @csrf
                                <div class="row">
                                    <div class="mb-2 col-lg-6 col-sm-12"> 
                                        <label>Fullname</label>
                                        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Full Name" required>
                                    </div>
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>Mobile Number</label>
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Mobile Number" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>Email Address</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                    </div>
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>Confirm Email Address</label>
                                        <input type="email" name="con_email" class="form-control" id="con_email" placeholder="Confirm Email" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>Date of Birth</label>
                                        <input type="date" name="dateofbirth" class="form-control" id="dateofbirth" placeholder="Date of Birth" required>
                                    </div>
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control" required>
                                            <option disabled selected>Select Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" id="city" placeholder="City" required>
                                    </div>
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>Country</label>
                                        <input type="text" name="country" class="form-control" id="country" placeholder="Country" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>State</label>
                                        <input type="text" name="state" class="form-control" id="state" placeholder="State" required>
                                    </div>
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" rows="3" placeholder="Address" required></textarea>
                                    </div>
                                </div>
                                <h4 class="mb-1">Bank Details</h4>
                                <div class="row">
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>Account Name</label>
                                        <input type="text" name="account_name" class="form-control" id="accountName" placeholder="Account Name" required>
                                    </div>
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>Account Number</label>
                                        <input type="text" name="account_number" class="form-control" id="accountNumber" placeholder="Account Number" required>
                                    </div>
                                    <div class="mb-2 col-lg-6 col-sm-12">
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
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <br>
                                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                        @error('g-recaptcha') 
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror 
                                    </div>
                                </div>
                                <div id="contactform-error-msg" class="invalid-feedback"></div>
                                <div class="comment-btn text-center">
                                    <button type="submit" class="nir-btn" id="consultantForm">
                                        <span id="buttonText">Submit</span>
                                        <span id="loadingSpinner" style="display: none;">
                                            <i class="fa fa-spinner fa-spin"></i> Loading...
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                       
                        <script>
                            $(document).ready(function() {
                                
                                $('#consultantForm').submit(function(event) {
                                    event.preventDefault(); 
                                    $('#loadingSpinner').show();
                                    $('#buttonText').hide();

                                    $.ajax({
                                        type: 'POST',
                                        url: '{{ route("consultant-form.store") }}', 
                                        data: $('#consultantForm').serialize(), 
                                        dataType: 'json',
                                        success: function(response) {
                                            console.log('AJAX response:', response); // Log the response for debugging

                                            if (response.success) {
                                                toastr.success(response.successs);
                                                setTimeout(function() {
                                                    window.location.reload(); 
                                                }, 2000); 
                                            } else {
                                                if (Array.isArray(response.errors)) {
                                                    toastr.error(response.errors.join('<br>'));
                                                    $('#contactform-error-msg').html('<div class="alert alert-danger">' + response.errors.join('<br>') + '</div>');
                                                } else if (typeof response.errors === 'object') {
                                                    let errorMessages = Object.values(response.errors).flat().join('<br>');
                                                    toastr.error(errorMessages);
                                                    $('#contactform-error-msg').html('<div class="alert alert-danger">' + errorMessages + '</div>');
                                                } else {
                                                    toastr.error('Check the E-mail Notification');
                                                    $('#contactform-error-msg').html('<div class="alert alert-danger">An unexpected error occurred.</div>');
                                                }
                                            }
                                        },
                                        error: function(xhr, textStatus, errorThrown) {
                                            console.error('Error:', errorThrown);
                                            toastr.error('An unexpected error occurred.');
                                        },
                                        complete: function() {
                                            $('#loadingSpinner').hide();
                                            $('#buttonText').show();
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
