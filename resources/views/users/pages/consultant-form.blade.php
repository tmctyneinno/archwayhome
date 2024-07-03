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
                            
                            <div id="contactform-error-msg"></div>
                            <form method="post" action="#" name="contactform2" id="contactform2">
                                <div class="row">
                                    <div class=" mb-2 col-6">
                                        <label>Fullname</label>
                                        <input type="text" name="first_name" class="form-control" id="fullname"
                                            placeholder="Full Name">
                                    </div>
                                    <div class=" mb-2 col-6">
                                        <label>Mobile Number</label>
                                        <input type="text" name="phone" class="form-control" id="phone"
                                            placeholder="Mobile Number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" mb-2 col-6">
                                        <label>Email Address</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Email">
                                    </div>
                                    <div class=" mb-2 col-6">
                                        <label>Confirm Email Address</label>
                                        <input type="email" name="con_email" class="form-control" id="email"
                                            placeholder="confirm Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" mb-2 col-6">
                                        <label>Date of birth</label>
                                        <input type="date" name="dateofbirth" class="form-control" id="dateofbirth"
                                            placeholder="Date of birth">
                                    </div>
                                    <div class=" mb-2 col-6">
                                        <label>Gender</label>
                                        <select class="form-group" name="gender">
                                            <option disabled selected>select gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                       
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" mb-2 col-6">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" id="city"
                                            placeholder="City">
                                    </div>
                                    <div class=" mb-2 col-6">
                                        <label>Country</label>
                                        <input type="text" name="country" class="form-control" id="country"
                                            placeholder="Country">
                                    </div>
                                </div>

                                <div class="textarea mb-2">
                                    <label>Address</label>
                                    <textarea name="comments" placeholder="Address"></textarea>
                                </div>
                                {{-- <div class="form-group text-center">
                                    <div class="">
                                      <div class="form-check col-sm-10">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            I agree to terms and conditions
                                        </label>
                                      </div>
                                    </div>
                                </div> --}}

                                <div class="comment-btn text-center">
                                    <input type="submit" class="nir-btn" id="submit2" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
