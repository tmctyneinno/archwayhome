@extends('layouts.app')

@section('content')


<script src="<https://www.google.com/recaptcha/api.js>" async defer></script>

<section class="  bg-grey" style="padding-bottom: 0px ">
    <div class="container-fluid">
        <div class="contact-info-main"> 
            <div class="row">
                <div class="col-lg-4 col-offset-lg-1 d-none d-lg-block" style="background: #FEDC56;text-align:left">
                    <div class="about-image mt-5 p-3 box-shadow position-relative">
                        <img src="{{ asset('assets/images/consultant/consultant.jpg')}}" alt class="w-100">
                       
                    </div>
                    <div class="breadcrumb-content align-items-center pt-10" >
                      <h3 style="color: #000052; padding-top: 40px" >Archwayhomes and Investment Limited</h3>  
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
                            <span style="color: #fff; padding-right:20px">You are being refered by Arckwayhomes and Investment Limited</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        
                        <div id="contact-form1" class="contact-form px-5 pt-2">
                           
                            <form method="post" action="{{ route("consultant-form.store") }}" name="contactform2" id="consultantForm">
                                @csrf
                                <div class="row">
                                    <div class="mb-2 col-lg-6 col-sm-12"> 
                                        <input type="hidden" name="referral_code" class="form-control" value="{{ isset($referralDetails) ? $referralDetails->referralCode : '' }}" placeholder="Full Name" required>

                                        <label>Fullname</label>
                                        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Full Name" required>
                                        @error('fullname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>Mobile Number</label>
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Mobile Number" required>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>Email Address</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>Confirm Email Address</label>
                                        <input type="email" name="con_email" class="form-control" id="con_email" placeholder="Confirm Email" required>
                                        @error('con_email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>Date of Birth</label>
                                        <input type="date" name="dateofbirth" class="form-control" id="dateofbirth" placeholder="Date of Birth" required>
                                        @error('dateofbirth')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control" required>
                                            <option disabled selected>Select Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                        @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" id="city" placeholder="City" required>
                                        @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>Country</label>
                                        <input type="text" name="country" class="form-control" id="country" placeholder="Country" required>
                                        @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>State</label>
                                        <input type="text" name="state" class="form-control" id="state" placeholder="State" required>
                                        @error('state')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" rows="3" placeholder="Address" required></textarea>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <h4 class="mb-1">Bank Details</h4>
                                <div class="row">
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>Account Name</label>
                                        <input type="text" name="account_name" class="form-control" id="accountName" placeholder="Account Name" required>
                                        @error('account_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label>Account Number</label>
                                        <input type="text" name="account_number" class="form-control" id="accountNumber" placeholder="Account Number" required>
                                        @error('account_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                                        @error('bank')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                               
                                <div id="contactform-error-msg" class="invalid-feedback"></div>
                                <div class=" mt-3 text-center">
                                    <button type="submit" class="nir-btn g-recaptcha"
                                            data-sitekey="{{ config('services.recaptcha.siteKey') }}"
                                            data-callback="onConsultantFormSubmit" data-action="submit" id="submit2">Submit
                                    </button>
                                </div> 
                                {{-- <div class="text-center">
                                    <button type="submit" class="nir-btn" id="consultantForm">
                                        <span id="buttonText">Submit</span>
                                        <span id="loadingSpinner" style="display: none;">
                                            <i class="fa fa-spinner fa-spin"></i> Loading...
                                        </span>
                                    </button>
                                </div> --}}
                            </form>
                        </div>
                        
                        <script>
                            function onConsultantFormSubmit(token) {
                                if (navigator.onLine) {
                                    // Proceed to submit the form if online
                                    document.getElementById('g-recaptcha-response').value = token;
                                    document.getElementById("consultantForm").submit();
                                } else {
                                    alert("You need an active internet connection to submit the form.");
                                }
                                // document.getElementById("contactUsForm").submit();
                            }
                         
                            grecaptcha.ready(function() {
                                grecaptcha.execute('{{ config('services.recaptcha.siteKey') }}', { action: 'submit' }).then(function(token) {
                                    document.getElementById("submit2").disabled = false; // Enable button after token is received
                                }).catch(function(error) {
                                    console.error("reCAPTCHA error:", error);
                                    document.getElementById("submit2").disabled = false; // Enable button on error
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
