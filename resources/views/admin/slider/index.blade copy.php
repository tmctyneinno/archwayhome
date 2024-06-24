@extends('user.layouts.dashboardheader') 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@section('content')
<body>
    <style>

		.hidden {

		display: none;

		}

	</style>
	<!-- wrapper -->
	<div class="wrapper">
	

    
		<!--page-wrapper-->
		<div class="page-wrapper">


			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				
				<div class="page-content"> 
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Vehicle</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Other Permit </li>
								</ol>
							</nav>
						</div> 
						 
					</div>
					<!--end breadcrumb-->
					
					<div class="row">
						<div class="col-xl-10 mx-auto">
						@if (session('success'))
							<div class="col-sm-12">
								<div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}
									
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>

							</div>
						@endif
						</div>
						<div class="col-xl-10 mx-auto">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-car me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Other Permit </h5>
                            </div>

							
							<div class="card radius-15 border-top border-0 border-4 ">
								<div class="row">
									<div class="col-12 col-lg-12 col-xl-12">
										<div class=" radius-15">
											<div class="card-body">
												<h6 class="text-justify text-success card-title">
													INSTRUCTION:
												</h6>
												<h6 class="card-subtitle mb-2">
													<b>Select the type of permit .</b>
												</h6>
												
												
												<h6 class="text-justify card-title text-danger">
													TIMELINE
												</h6> 
												<h6 class="card-subtitle mb-2">
													<b>Processing and Delivery Time:</b> 72 Hours
												</h6> 
											</div>
										</div>
									</div>
								</div>
							</div>

							<hr>
							<div class="card border-top border-0 border-4 border-primary">
								<div class="card-body p-5">
								    <form class="row g-3" id="vehicleForm"  >
										@csrf
										
                                        <div class="card-body  col-md-12 " style=" margin-bottom: 0px;">
											<label for="inputState" class="form-label">Select Permit Type</label>
										    <select required id="selected" name="otherpermint" class="form-select"> 
											    <option disabled selected="selected" value=""> -- Choose Permit Type -- </option>
											    @foreach($otherPermits as $otherPermit)
											    	 <option value="{{ $otherPermit->id }}" data-id = "{{$otherPermit->amount}}">{{ $otherPermit->otherPermitTypeInfo->permitType }}</option>
											    @endforeach
											</select>
											 @error('otherpermint')
												<span class="text-danger">{{$message}}</span>
											@enderror 
										</div>

									
									</form>	
									
									
									<div class="hidden " id="elementHide1" > 
									    <form class="row g-3" id="vehicleForm1" method="POST" action="{{ route('home.postotherpermit') }}" enctype="multipart/form-data" >
                                            @csrf
                                            <br>
                                                <h6 class="mb-0 text-dark"><b>Personal Information</b></h6>
                                            <hr>
                                            <input  required type="hidden" name="permittype" Value="Rider’s Card (Motorcycle)">
                                            <input  required type="hidden" name="amount" Value="10500">
                                            <div class="row mb-2" >
                                                <div class="col">
                                                
                                                    <label for="inputFirstName" class="form-label"> First name </label>
                                                    <input  required type="text" name="firstname" placeholder="First name" class="form-control" id="firstname">
                                                    @error('firstname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Middle name </label>
                                                    <input  required type="text" name="middlename" placeholder=" Middle name" class="form-control" id="middlename">
                                                    @error('middlename')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Last name </label>
                                                    <input  required type="text" name="lastname" placeholder="Last name" class="form-control" id="vehiclebrand">
                                                    @error('lastname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Mother’s maiden name</label>
                                                    <input  required type="text" name="mothermaidenname" placeholder="Mother’s maiden name" class="form-control" >
                                                    @error('mothermaidenname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-2" >
                                                <div class="col">
                                                    <label for="inputFirstName" class="form-label"> Email Address</label>
                                                    <input  required type="email" name="email" placeholder="Email Address" class="form-control" id="email">
                                                    @error('email')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputLastName" class="form-label"> Gender </label>
                                                    <select name="gender" id="inputState" class="form-select">
                                                        <option disabled selected="selected" value="">Select Gender</option>
                                                        <option value="Male"> Male </option>
                                                        <option value="Famale"> Female </option>
                                                    </select>
                                                    @error('gender')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Date of birth  </label>
                                                    <input required type="date" name="dateofbirth" class="form-control" id="dateofbirth">
                                                    @error('dateofbirth')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="inputLastName" class="form-label"> Marital status  </label>
                                                    <select required name="maritalstatus" id="inputState" class="form-select">
                                                        <option disabled selected="selected" value="">Select Marital status </option>
                                                        <option value="Single"> Single </option>
                                                        <option value="Married"> Married </option>
                                                        <option value="Divorced"> Divorced </option>
                                                    </select>
                                                    @error('dateofbirth')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>									

                                            <div class="row mb-2">
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Local government of origin </label>
                                                    <input required type="text" name="localgovernment" placeholder="Local government" class="form-control" id="localgovernment">
                                                    @error('dateofbirth')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputLastName" class="form-label"> State of origin </label>
                                                    <select required name="state" id="inputState" class="form-select">
                                                        <option disabled selected="selected" value="">Select State</option>
                                                        <option value="Abia"> Abia </option>
                                                        <option value="Adamawa"> Adamawa </option>
                                                        <option value="Akwa Ibom"> Akwa Ibom </option>
                                                        <option value="Anambra"> Anambra </option>
                                                        <option value="Bauchi"> Bauchi </option>
                                                        <option value="Bayelsa"> Bayelsa</option>
                                                        <option value="Benue"> Benue </option>
                                                        <option value="Borno"> Borno </option>
                                                        <option value="Cross River"> Cross River</option>
                                                        <option value="Delta"> Delta </option>
                                                        <option value="Ebonyi"> Ebonyi </option>
                                                        <option value="Enugu"> Enugu </option>
                                                        <option value="Edo"> Edo </option>
                                                        <option value="Ekiti"> Ekiti </option>
                                                        <option value="Enugu"> Enugu </option>
                                                        <option value="Gombe"> Gombe </option>
                                                        <option value="Imo"> Imo </option>
                                                        <option value="Jigawa"> Jigawa/option>
                                                        <option value="Kaduna"> Kaduna </option>
                                                        <option value="Kano"> Kano </option>
                                                        <option value="Katsina"> Katsina</option>
                                                        <option value="Kebbi"> Kebbi </option>
                                                        <option value="Kogi"> Kogi </option>
                                                        <option value="Kwara"> Kwara </option>
                                                        <option value="Lagos"> Lagos </option>
                                                        <option value="Nasarawa"> Nasarawa</option>
                                                        <option value="Niger"> Niger </option>
                                                        <option value="Ogun"> Ogun </option>
                                                        <option value="Ondo"> Ondo</option>
                                                        <option value="Osun"> Osun </option>
                                                        <option value="Oyo"> Oyo </option>
                                                        <option value="Plateau"> Plateau </option>
                                                        <option value="Rivers"> Rivers </option>
                                                        <option value="Sokoto"> Sokoto</option>
                                                        <option value="Taraba"> Taraba </option>
                                                        <option value="Yobe"> Yobe </option>
                                                        <option value="Zamfara"> Zamfara</option>
                                                    </select>
                                                    @error('state')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-2">
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Local govt place of birth  </label>
                                                    <input required type="text" name="localgovtplaceofbirth" placeholder="Local govt place of birth" class="form-control" id="localgovernment">
                                                    @error('localgovtplaceofbirth')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col">
                                                    <label for="inputFirstName" class="form-label"> Phone number  </label>
                                                    <input required  type="text" name="phonenumber" placeholder="Phone number " class="form-control" id="phone">
                                                    @error('phonenumber')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Blood group </label>
                                                    <select required name="bloodgroup" id="inputState" class="form-select">
                                                        <option selected disabled>Select Blood group</option>
                                                        <option value="A">Blood Group A</option>
                                                        <option value="B">Blood Group B</option>
                                                        <option value="AB">Blood Group AB</option>
                                                        <option value="O">Blood Group O</option>
                                                    </select>
                                                    @error('bloodgroup')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                </div>
                                                <div class="col">
                                                    <label for="inputFirstName" class="form-label"> Height </label>
                                                    <input required  type="text" name="height" placeholder="Height " class="form-control" id="phone">
                                                    @error('height')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Next of kin name </label>
                                                    <input required  type="text" name="nextofkinname" placeholder="Next of kin name " class="form-control" id="phone">
                                                    @error('nextofkinname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Next of kin phone number </label>
                                                    <input required  type="text" name="nextofkinphonenumber" placeholder="Next of kin phone number " class="form-control" id="phone">
                                                    @error('nextofkinphonenumber')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-12" >
                                                    <label for="inputFirstName" class="form-label">Contact Address </label>
                                                    <input required type="text" name="address" placeholder="Contact Address" class="form-control" id="address">
                                                    @error('address')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="card radius-10 mt-3 mb-3">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <p class="mb-0"><b>Upload Documents, and Means of ID  </b></p>
                                                    </div>
                                                    <hr/>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="passport" class="form-label">Passport Photograph </label> 
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="passport" >
                                                            @error('passport')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        
                                                        <div class="col-md-6 mb-3">
                                                            <label for="meansofID" class="form-label">Means of ID </label>  
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="meansofID" >
                                                            @error('meansofID')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" col-md-12 ">
                                                <div id="mainPrice" class="alert alert-info mt-3">Total Amount: ₦ <span >0</span></div>
                                            </div>
										
                                            <div class="col-12 mt-10 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary px-5">Start Permit Registration</button>
                                            </div>
                                            <script type="text/javascript">
                                                jQuery(document).ready(function ($) {
											      
											        $.ajaxSetup({
														headers: {
															'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
														}
													});
													$("#selected").change(function() {
													   // result = $(this).val();
													    var result = $('#selected option:selected').data('id');
													    
													   // alert(result);
                                                        result = isNaN(result) ? 0 : result;
                                                        var formattedValue = new Intl.NumberFormat().format(result);
                                                        $("#mainPrice span").text(formattedValue);
                                                        $("#mainPriceInp span").val(formattedValue);
													})
                                                });
                                            </script>
									    </form> 
									</div>
									
									<div class="hidden" id="elementHide2">
									    <form class="row g-3" id="vehicleForm2" method="POST" action="{{ route('home.postotherpermit') }}" enctype="multipart/form-data"  >
									        @csrf
                                            <br>
                                                <h6 class="mb-0 text-dark"><b>Personal Information</b></h6>
                                            <hr>
                                            <input  required type="hidden" name="permittype" Value=" Local Govt. Permit (Motorcycle)">
                                            <input  required type="hidden" name="amount" Value="15000">
                                            <div class="row mb-2" >
                                                <div class="col-sm-12">
                                                    <label for="inputFirstName" class="form-label"> Name on Vehicle Documents </label>
                                                    <input  required type="text" name="nameofvehicledocuments" placeholder="Name on Vehicle Documents" class="form-control" id="nod">
                                                    @error('firstname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Address</label>
                                                    <input  required type="text" name="address" placeholder="Address" class="form-control" id="vehiclebrand">
                                                    @error('lastname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Vehicle Make</label>
                                                    <input  required type="text" name="vehicle_make" placeholder="Vehicle Make" class="form-control" >
                                                    @error('mothermaidenname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
										
                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label">Vehicle Model</label>
                                                    <input  required type="text" name="vehicle_model" placeholder="Vehicle Model" class="form-control" >
                                                    @error('email')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Registration Number </label>
                                                    <input required type="text" name="reg_number" placeholder="Registration Number" class="form-control" id="localgovernment">
                                                    @error('dateofbirth')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="card radius-10 mb-3">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <p class="mb-0"><b>Upload Documents, and Means of ID  </b></p>
                                                    </div>
                                                    <hr/>
                                                    <div class="row">
                                                        
                                                        <div class="col-md-6 mb-3">
                                                            <label for="pictureoftheVehicleLicense" class="form-label">Picture of the Vehicle License </label>  
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="pictureoftheVehicleLicense" >
                                                            @error('pictureoftheVehicleLicense')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="meansofID" class="form-label">Means of ID </label>  
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="meansofID" >
                                                            @error('meansofID')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" col-md-12 ">
                                                <div id="mainPrice" class="alert alert-info mt-3">Total Amount: - (₦ <span  >0</span>)</div>
                                                
                                            </div>
                                            
                                            <div class="col-12 mt-10 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary px-5">Start Permit Registration</button>
                                            </div>
                                            <script type="text/javascript">
                                                jQuery(document).ready(function ($) {
											      
											        $.ajaxSetup({
														headers: {
															'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
														}
													});
													$("#selected").change(function() {
													   // result = $(this).val();
													    var result = $('#selected option:selected').data('id');
													    
													   // alert(result);
                                                        result = isNaN(result) ? 0 : result;
                                                        var formattedValue = new Intl.NumberFormat().format(result);
                                                        $("#mainPrice span").text(formattedValue);
                                                        $("#mainPriceInp span").val(formattedValue);
													})
                                                });
                                            </script>
                                        </form>
									</div>

									<div class="hidden" id="elementHide3">
									    <form class="row g-3" id="vehicleForm3" method="POST" action="{{ route('home.postotherpermit') }}" enctype="multipart/form-data" >
									        @csrf
                                            <br>
                                                <h6 class="mb-0 text-dark"><b>Personal Information</b></h6>
                                            <hr>
                                            <input  required type="hidden" name="permittype" Value=" Local Govt. Permit (Cars/Buses/Trucks)">
                                            <input  required type="hidden" name="amount" Value="25000">
                                            <div class="row mb-2" >
                                                <div class="col-sm-12">
                                                    <label for="inputFirstName" class="form-label"> Name on Vehicle Documents </label>
                                                    <input  required type="text" name="firstname" placeholder="Name on Vehicle Documents" class="form-control" id="nod">
                                                    @error('firstname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Address</label>
                                                    <input  required type="text" name="address" placeholder="Address" class="form-control" id="vehiclebrand">
                                                    @error('lastname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Vehicle Make</label>
                                                    <input  required type="text" name="vehicle_make" placeholder="Vehicle Make" class="form-control" >
                                                    @error('mothermaidenname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
										
                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label">Vehicle Model</label>
                                                    <input  required type="text" name="vehicle_model" placeholder="Vehicle Model" class="form-control" >
                                                    @error('email')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Registration Number </label>
                                                    <input required type="text" name="reg_number" placeholder="Registration Number" class="form-control" id="localgovernment">
                                                    @error('dateofbirth')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="card radius-10 mb-3">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <p class="mb-0"><b>Upload Documents, and Means of ID  </b></p>
                                                    </div>
                                                    <hr/>
                                                    <div class="row">
                                                        
                                                        <div class="col-md-6 mb-3">
                                                            <label for="vehiclelicensepaper" class="form-label">Picture of the Vehicle License </label>  
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="vehiclelicensepaper" >
                                                            @error('vehiclelicensepaper')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="vehiclelicensepaper" class="form-label">Means of ID </label>  
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="vehiclelicensepaper" >
                                                            @error('vehiclelicensepaper')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" col-md-12 ">
                                                <div id="mainPrice" class="alert alert-info mt-3">Total Amount: - (₦ <span  >0</span>)</div>
                                                
                                            </div>
                                            
                                            <div class="col-12 mt-10 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary px-5">Start Permit Registration</button>
                                            </div>
                                            <script type="text/javascript">
                                                jQuery(document).ready(function ($) {
											      
											        $.ajaxSetup({
														headers: {
															'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
														}
													});
													$("#selected").change(function() {
													   // result = $(this).val();
													    var result = $('#selected option:selected').data('id');
													    
													   // alert(result);
                                                        result = isNaN(result) ? 0 : result;
                                                        var formattedValue = new Intl.NumberFormat().format(result);
                                                        $("#mainPrice span").text(formattedValue);
                                                        $("#mainPriceInp span").val(formattedValue);
													})
                                                });
                                            </script>
                                        </form>
									</div>
									
									<div class="hidden" id="elementHide4">
									    <form class="row g-3" id="vehicleForm4" method="POST" action="{{ route('home.postotherpermit') }}" enctype="multipart/form-data" >
									        @csrf
                                            <br>
                                                <h6 class="mb-0 text-dark"><b>Personal Information</b></h6>
                                            <hr>
                                            <input  required type="hidden" name="permittype" Value="JTB Emblem - (Motorcycle/Cars/Buses/Trucks)">
                                            <input  required type="hidden" name="amount" Value="20000">
                                            <div class="row mb-2" >
                                                <div class="col-sm-12">
                                                    <label for="inputFirstName" class="form-label"> Name on Vehicle Documents </label>
                                                    <input  required type="text" name="firstname" placeholder="Name on Vehicle Documents" class="form-control" id="nod">
                                                    @error('firstname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Address</label>
                                                    <input  required type="text" name="address" placeholder="Address" class="form-control" id="vehiclebrand">
                                                    @error('lastname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Vehicle Make</label>
                                                    <input  required type="text" name="vehicle_make" placeholder="Vehicle Make" class="form-control">
                                                    @error('mothermaidenname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
										
                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label">Vehicle Model</label>
                                                    <input  required type="text" name="vehicle_model" placeholder="Vehicle Model" class="form-control" >
                                                    @error('email')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Registration Number </label>
                                                    <input required type="text" name="reg_number" placeholder="Registration Number" class="form-control" id="localgovernment">
                                                    @error('dateofbirth')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="card radius-10 mb-3">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <p class="mb-0"><b>Upload Documents, and Means of ID  </b></p>
                                                    </div>
                                                    <hr/>
                                                    <div class="row">
                                                        
                                                        <div class="col-md-6 mb-3">
                                                            <label for="vehiclelicensepaper" class="form-label">Picture of the Vehicle License </label>  
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="vehiclelicensepaper" >
                                                            @error('vehiclelicensepaper')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="vehiclelicensepaper" class="form-label">Means of ID </label>  
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="vehiclelicensepaper" >
                                                            @error('vehiclelicensepaper')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        
                                                    
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" col-md-12 ">
                                                <div id="mainPrice" class="alert alert-info mt-3">Total Amount: - (₦ <span  >0</span>)</div>
                                                
                                            </div>
                                            
                                            <div class="col-12 mt-10 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary px-5">Start Permit Registration</button>
                                            </div>
                                            <script type="text/javascript">
                                                jQuery(document).ready(function ($) {
											      
											        $.ajaxSetup({
														headers: {
															'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
														}
													});
													$("#selected").change(function() {
													   // result = $(this).val();
													    var result = $('#selected option:selected').data('id');
													    
													   // alert(result);
                                                        result = isNaN(result) ? 0 : result;
                                                        var formattedValue = new Intl.NumberFormat().format(result);
                                                        $("#mainPrice span").text(formattedValue);
                                                        $("#mainPriceInp span").val(formattedValue);
													})
                                                });
                                            </script>
                                        </form>
									</div>
									<div class="hidden" id="elementHide5">
									    <form class="row g-3" id="vehicleForm5" method="POST" action="{{ route('home.postotherpermit') }}" enctype="multipart/form-data" >
										     @csrf
                                            <br>
                                                <h6 class="mb-0 text-dark"><b>Personal Information</b></h6>
                                            <hr>
                                            <input  required type="hidden" name="permittype" Value=" Mid-Year Permit (Cars/Buses/Trucks)">
                                            <input  required type="hidden" name="amount" Value="10000">
                                            <div class="row mb-2" >
                                                <div class="col-sm-12">
                                                    <label for="inputFirstName" class="form-label"> Name on Vehicle Documents </label>
                                                    <input  required type="text" name="firstname" placeholder="Name on Vehicle Documents" class="form-control" id="nod">
                                                    @error('firstname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Address</label>
                                                    <input  required type="text" name="address" placeholder="Address" class="form-control" id="vehiclebrand">
                                                    @error('lastname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Vehicle Make</label>
                                                    <input  required type="text" name="vehicle_make" placeholder="Vehicle Make" class="form-control" >
                                                    @error('mothermaidenname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
										
                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label">Vehicle Model</label>
                                                    <input  required type="text" name="vehicle_model" placeholder="Vehicle Model" class="form-control" >
                                                    @error('email')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Registration Number </label>
                                                    <input required type="text" name="reg_number" placeholder="Registration Number" class="form-control" id="localgovernment">
                                                    @error('dateofbirth')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="card radius-10 mb-3">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <p class="mb-0"><b>Upload Documents, and Means of ID  </b></p>
                                                    </div>
                                                    <hr/>
                                                    <div class="row">
                                                        
                                                        <div class="col-md-6 mb-3">
                                                            <label for="vehiclelicensepaper" class="form-label">Picture of the Vehicle License </label>  
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="vehiclelicensepaper" >
                                                            @error('vehiclelicensepaper')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="vehiclelicensepaper" class="form-label">Means of ID </label>  
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="vehiclelicensepaper" >
                                                            @error('vehiclelicensepaper')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" col-md-12 ">
                                                <div id="mainPrice" class="alert alert-info mt-3">Total Amount: - (₦ <span  >0</span>)</div>
                                                
                                            </div>
                                            
                                            <div class="col-12 mt-10 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary px-5">Start Permit Registration</button>
                                            </div>
                                            <script type="text/javascript">
                                                jQuery(document).ready(function ($) {
											      
											        $.ajaxSetup({
														headers: {
															'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
														}
													});
													$("#selected").change(function() {
													   // result = $(this).val();
													    var result = $('#selected option:selected').data('id');
													    
													   // alert(result);
                                                        result = isNaN(result) ? 0 : result;
                                                        var formattedValue = new Intl.NumberFormat().format(result);
                                                        $("#mainPrice span").text(formattedValue);
                                                        $("#mainPriceInp span").val(formattedValue);
													})
                                                });
                                            </script>
                                        </form>
                                    </div>
                                    <div class="hidden" id="elementHide6">
									    <form class="row g-3" id="vehicleForm6" method="POST" action="{{ route('home.postotherpermit') }}" enctype="multipart/form-data" >
                                            @csrf
                                            <br>
                                                <h6 class="mb-0 text-dark"><b>Personal Information</b></h6>
                                            <hr>
                                            <input  required type="hidden" name="permittype" Value=" License Plates Number Reprint/Replacement">
                                            <input  required type="hidden" name="amount" Value="33500">
                                            <div class="row mb-2" >
                                                <div class="col-sm-12">
                                                    <label for="inputFirstName" class="form-label"> Name on Vehicle Documents </label>
                                                    <input  required type="text" name="firstname" placeholder="Name on Vehicle Documents" class="form-control" id="nod">
                                                    @error('firstname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Address</label>
                                                    <input  required type="text" name="address" placeholder="Address" class="form-control" id="vehiclebrand">
                                                    @error('lastname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Vehicle Make</label>
                                                    <input  required type="text" name="vehicle_make" placeholder="Vehicle Make" class="form-control" >
                                                    @error('mothermaidenname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
										
                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label">Vehicle Model</label>
                                                    <input  required type="text" name="vehicle_model" placeholder="Vehicle Model" class="form-control" >
                                                    @error('email')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Registration Number </label>
                                                    <input required type="text" name="reg_number" placeholder="Registration Number" class="form-control" id="localgovernment">
                                                    @error('dateofbirth')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="card radius-10 mb-3">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <p class="mb-0"><b>Upload Documents, and Means of ID  </b></p>
                                                    </div>
                                                    <hr/>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="passport" class="form-label">Passport Photograph </label> 
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="passport" >
                                                            @error('passport')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="affidavit" class="form-label">Affidavit </label>  
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="affidavit" >
                                                            @error('affidavit')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="policereport" class="form-label">Police Report </label> 
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="policereport" >
                                                            @error('policereport')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="vehiclelicensepaper" class="form-label">Picture of the Vehicle License </label>  
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="picturevehiclelicense" >
                                                            @error('vehiclelicense')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="vehiclelicensepaper" class="form-label">Means of ID </label>  
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="meansofID" >
                                                            @error('meansofID')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    										<div class=" col-md-12 ">
    											<div id="mainPrice" class="alert alert-info mt-3">Total Amount: - (₦ <span>0</span>)</div>
    											
    										</div>
										
										<div class="col-12 mt-10 d-flex justify-content-center">
											<button type="submit" class="btn btn-primary px-5">Start Permit Registration</button>
										</div>
										<script type="text/javascript">
                                            jQuery(document).ready(function ($) {
										      
										        $.ajaxSetup({
													headers: {
														'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
													}
												});
												$("#selected").change(function() {
												   // result = $(this).val();
												    var result = $('#selected option:selected').data('id');
												    
												   // alert(result);
                                                    result = isNaN(result) ? 0 : result;
                                                    var formattedValue = new Intl.NumberFormat().format(result);
                                                    $("#mainPrice span").text(formattedValue);
                                                    $("#mainPriceInp span").val(formattedValue);
												})
                                            });
                                        </script>
                                    </form>
                                    </div>
                                    <div class="hidden" id="elementHide7">
                                        <form class="row g-3" id="vehicleForm7" method="POST" action="{{ route('home.postotherpermit') }}" enctype="multipart/form-data">
                                            @csrf
                                            <br>
                                                <h6 class="mb-0 text-dark"><b>Personal Information for Affidavits and Police Report</b></h6>
                                            <hr>
                                            <input  required type="hidden" name="permittype" Value="Affidavits and Police Report">
                                            <input  required type="hidden" name="amount" Value="10000">
                                            <div class="row mb-2" >
                                                <div class="col-sm-12">
                                                    <label for="inputFirstName" class="form-label">Full Name  </label>
                                                    <input  required type="text" name="fullname" placeholder="Full Name " class="form-control" id="nod">
                                                    
                                                </div>
                                            </div>
                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Address</label>
                                                    <input  required type="text" name="address" placeholder="Address" class="form-control" id="vehiclebrand">
                                                    
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputLastName" class="form-label"> Marital status  </label>
                                                    <select required name="maritalstatus" id="inputState" class="form-select">
                                                        <option disabled selected="selected" value="">Select Marital status </option>
                                                        <option value="Single"> Single </option>
                                                        <option value="Married"> Married </option>
                                                        <option value="Divorced"> Divorced </option>
                                                    </select>
                                                    @error('dateofbirth')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
										
                                            <div class="row mb-4" >
                                                <div class="col-sm-12">
                                                    <label for="inputFirstName" class="form-label">Purpose</label>
                                                    <textarea required name="purpose" placeholder="Purpose" class="form-control" id="purpose"></textarea>
                                                
                                                </div>
                                            </div>
                                            
                                            <div class="card radius-10 mt-3 mb-3">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <p class="mb-0"><b>Upload Documents, and Means of ID  </b></p>
                                                    </div>
                                                    <hr/>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="passport" class="form-label">Passport Photograph </label> 
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="passport" >
                                                            @error('passport')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        
                                                        <div class="col-md-6 mb-3">
                                                            <label for="vehiclelicensepaper" class="form-label">Means of ID </label>  
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="vehiclelicensepaper" >
                                                            @error('vehiclelicensepaper')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class=" col-md-12 ">
                                                <div id="mainPrice" class="alert alert-info mt-3">Total Amount: - (₦ <span  >0</span>)</div>
                                                
                                            </div>
                                            
                                            <div class="col-12 mt-10 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary px-5">Start Permit Registration</button>
                                            </div>
                                            <script type="text/javascript">
                                                jQuery(document).ready(function ($) {
											      
											        $.ajaxSetup({
														headers: {
															'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
														}
													});
													$("#selected").change(function() {
													   // result = $(this).val();
													    var result = $('#selected option:selected').data('id');
													    
													   // alert(result);
                                                        result = isNaN(result) ? 0 : result;
                                                        var formattedValue = new Intl.NumberFormat().format(result);
                                                        $("#mainPrice span").text(formattedValue);
                                                        $("#mainPriceInp span").val(formattedValue);
													})
                                                });
                                            </script>
                                        </form>
                                    </div>

                                    <div class="hidden " id="elementHide8"> 
									    <form class="row g-3" id="vehicleForm8" method="POST" action="{{ route('home.postotherpermit') }}" enctype="multipart/form-data" >
										    @csrf
                                            <br>
                                                <h6 class="mb-0 text-dark"><b>Personal Information for Learner’s Permit</b></h6>
                                            <hr>
                                           
										

                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Last name </label>
                                                    <input  required type="text" name="lastname" placeholder="Last name" class="form-control" id="vehiclebrand">
                                                    @error('lastname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Mother’s maiden name</label>
                                                    <input  required type="text" name="mothermaidenname" placeholder="Mother’s maiden name" class="form-control" />
                                                    @error('mothermaidenname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
										
                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Email Address</label>
                                                    <input  required type="email" name="email" placeholder="Email Address" class="form-control" id="email">
                                                    @error('email')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputLastName" class="form-label"> Gender </label>
                                                    <select name="gender" id="inputState" class="form-select">
                                                        <option disabled selected="selected" value="">Select Gender</option>
                                                        <option value="Male"> Male </option>
                                                        <option value="Famale"> Female </option>
                                                    </select>
                                                    @error('gender')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Date of birth  </label>
                                                    <input required type="date" name="dateofbirth" class="form-control" id="dateofbirth">
                                                    @error('dateofbirth')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="inputLastName" class="form-label"> Marital status  </label>
                                                    <select required name="maritalstatus" id="inputState" class="form-select">
                                                        <option disabled selected="selected" value="">Select Marital status </option>
                                                        <option value="Single"> Single </option>
                                                        <option value="Married"> Married </option>
                                                        <option value="Divorced"> Divorced </option>
                                                    </select>
                                                    @error('dateofbirth')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>									

										    <div class="row mb-2">
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Local government of origin </label>
                                                    <input required type="text" name="localgovernment" placeholder="Local government" class="form-control" id="localgovernment">
                                                    @error('dateofbirth')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputLastName" class="form-label"> State of origin </label>
                                                    <select required name="state" id="inputState" class="form-select">
                                                        <option disabled selected="selected" value="">Select State</option>
                                                        <option value="Abia"> Abia </option>
                                                        <option value="Adamawa"> Adamawa </option>
                                                        <option value="Akwa Ibom"> Akwa Ibom </option>
                                                        <option value="Anambra"> Anambra </option>
                                                        <option value="Bauchi"> Bauchi </option>
                                                        <option value="Bayelsa"> Bayelsa</option>
                                                        <option value="Benue"> Benue </option>
                                                        <option value="Borno"> Borno </option>
                                                        <option value="Cross River"> Cross River</option>
                                                        <option value="Delta"> Delta </option>
                                                        <option value="Ebonyi"> Ebonyi </option>
                                                        <option value="Enugu"> Enugu </option>
                                                        <option value="Edo"> Edo </option>
                                                        <option value="Ekiti"> Ekiti </option>
                                                        <option value="Enugu"> Enugu </option>
                                                        <option value="Gombe"> Gombe </option>
                                                        <option value="Imo"> Imo </option>
                                                        <option value="Jigawa"> Jigawa/option>
                                                        <option value="Kaduna"> Kaduna </option>
                                                        <option value="Kano"> Kano </option>
                                                        <option value="Katsina"> Katsina</option>
                                                        <option value="Kebbi"> Kebbi </option>
                                                        <option value="Kogi"> Kogi </option>
                                                        <option value="Kwara"> Kwara </option>
                                                        <option value="Lagos"> Lagos </option>
                                                        <option value="Nasarawa"> Nasarawa</option>
                                                        <option value="Niger"> Niger </option>
                                                        <option value="Ogun"> Ogun </option>
                                                        <option value="Ondo"> Ondo</option>
                                                        <option value="Osun"> Osun </option>
                                                        <option value="Oyo"> Oyo </option>
                                                        <option value="Plateau"> Plateau </option>
                                                        <option value="Rivers"> Rivers </option>
                                                        <option value="Sokoto"> Sokoto</option>
                                                        <option value="Taraba"> Taraba </option>
                                                        <option value="Yobe"> Yobe </option>
                                                        <option value="Zamfara"> Zamfara</option>
                                                    </select>
                                                    @error('state')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
										
                                            <div class="row mb-2">
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Local govt place of birth  </label>
                                                    <input required type="text" name="localgovtplaceofbirth" placeholder="Local govt place of birth" class="form-control" id="localgovernment">
                                                    @error('localgovtplaceofbirth')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Phone number  </label>
                                                    <input required  type="text" name="phonenumber" placeholder="Phone number " class="form-control" id="phone">
                                                    @error('phonenumber')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Blood group </label>
                                                    <select required name="bloodgroup" id="inputState" class="form-select">
                                                        <option selected disabled>Select Blood group</option>
                                                        <option value="A">Blood Group A</option>
                                                        <option value="B">Blood Group B</option>
                                                        <option value="AB">Blood Group AB</option>
                                                        <option value="O">Blood Group O</option>
                                                    </select>
                                                    @error('bloodgroup')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Height </label>
                                                    <input required  type="text" name="height" placeholder="Height " class="form-control" id="phone">
                                                    @error('height')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Next of kin name </label>
                                                    <input required  type="text" name="nextofkinname" placeholder="Next of kin name " class="form-control" id="phone">
                                                    @error('nextofkinname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Next of kin phone number </label>
                                                    <input required  type="text" name="nextofkinphonenumber" placeholder="Next of kin phone number " class="form-control" id="phone">
                                                    @error('nextofkinphonenumber')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-12" >
                                                    <label for="inputFirstName" class="form-label">Contact Address </label>
                                                    <input required type="text" name="address" placeholder="Contact Address" class="form-control" id="address">
                                                    @error('address')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="card radius-10 mt-3 mb-3">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <p class="mb-0"><b>Upload Documents, and Means of ID  </b></p>
                                                    </div>
                                                    <hr/>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="passport" class="form-label">Passport Photograph </label> 
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="passport" >
                                                            @error('passport')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        
                                                        <div class="col-md-6 mb-3">
                                                            <label for="vehiclelicensepaper" class="form-label">Means of ID </label>  
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="vehiclelicensepaper" >
                                                            @error('vehiclelicensepaper')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" col-md-12 ">
                                                <div id="mainPrice" class="alert alert-info mt-3">Total Amount: - (₦ <span  >0</span>)</div>
                                                
                                            </div>
										
                                            <div class="col-12 mt-10 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary px-5">Start Permit Registration</button>
                                            </div>
										    <script type="text/javascript">
                                                jQuery(document).ready(function ($) {
											      
											        $.ajaxSetup({
														headers: {
															'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
														}
													});
													$("#selected").change(function() {
													   // result = $(this).val();
													    var amount = $('#selected option:selected').data('id');
													    
													   // alert(result);
                                                        var result = isNaN(amount) ? 0 : amount;
                                                        var formattedValue = new Intl.NumberFormat().format(result);
                                                        $("#mainPrice span").text(formattedValue);
                                                        $("#mainPriceInp span").val(formattedValue);
													})
                                                });
                                            </script>
									    </form>
									</div>
                                    
                                    <div class="hidden" id="elementHide9"> 
									    <form class="row g-3" id="vehicleForm9" method="POST" action="{{ route('home.postotherpermit') }}" enctype="multipart/form-data" >
										    @csrf
                                            <br>
                                                <h6 class="mb-0 text-dark"><b>Personal Information</b></h6>
                                            <hr>
                                            <input  required type="hidden" name="permittype" Value="Tinted Permit ">
                                            <input  required type="hidden" name="amount" Value="10000">
                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                
                                                    <label for="inputFirstName" class="form-label"> First name </label>
                                                    <input  required type="text" name="firstname" placeholder="First name" class="form-control" id="firstname">
                                                    @error('firstname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Last name </label>
                                                    <input  required type="text" name="lastname" placeholder="Last name" class="form-control" id="vehiclebrand">
                                                    @error('lastname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-2" >
                                                 <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Email Address</label>
                                                    <input  required type="email" name="email" placeholder="Email Address" class="form-control" id="email">
                                                    @error('email')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6" >
                                                    <label for="inputFirstName" class="form-label">NIN </label>
                                                    <input required type="text" name="nin" placeholder="National Identity Number" class="form-control" id="address">
                                                    @error('address')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                               
                                            </div>
								            <div class="row mb-2" >
                                                <div class="col-md-6" >
                                                    <label for="inputFirstName" class="form-label">Phone Number </label>
                                                    <input required type="text" name="phonenumber" placeholder="Phone Number" class="form-control" id="address">
                                                    @error('address')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="card radius-10 mt-3 mb-3">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <p class="mb-0"><b>Upload Documents </b></p>
                                                    </div>
                                                    <hr/>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="vehiclelicensepaper" class="form-label">Vehicle License </label> 
                                                            <input required class="form-control" id="fancy-file-upload" type="file" name="pictureoftheVehicleLicense" >
                                                            @error('vehiclelicensepaper')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        
                                                        <div class="col-md-6 mb-3">
                                                            <label for="proofofownership" class="form-label">Proof Of Ownership </label>  
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="proofofownership" >
                                                            @error('proofofownership')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" col-md-12 ">
                                                <div id="mainPrice" class="alert alert-info mt-3">Total Amount: - (₦ <span  >0</span>)</div>
                                                
                                            </div>
										
                                            <div class="col-12 mt-10 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary px-5">Start Permit Registration</button>
                                            </div>
										    <script type="text/javascript">
                                                jQuery(document).ready(function ($) {
											      
											        $.ajaxSetup({
														headers: {
															'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
														}
													});
													$("#selected").change(function() {
													   // result = $(this).val();
													    var result = $('#selected option:selected').data('id');
													    
													   // alert(result);
                                                        result = isNaN(result) ? 0 : result;
                                                        var formattedValue = new Intl.NumberFormat().format(result);
                                                        $("#mainPrice span").text(formattedValue);
                                                        $("#mainPriceInp span").val(formattedValue);
													})
                                                });
                                            </script>
									    </form>
									</div>
									<div class="hidden " id="elementHide10"> 
									    <form class="row g-3" id="vehicleForm10" method="POST" action="{{ route('home.postotherpermit') }}" enctype="multipart/form-data" >
										    @csrf
                                            <br>
                                                <h6 class="mb-0 text-dark"><b>Personal Information</b></h6>
                                            <hr>
                                            <input  required type="hidden" name="permittype" Value="CMRIS ">
                                            <input  required type="hidden" name="amount" Value="10000">
                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                
                                                    <label for="inputFirstName" class="form-label"> First name </label>
                                                    <input  required type="text" name="firstname" placeholder="First name" class="form-control" id="firstname">
                                                    @error('firstname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Last name </label>
                                                    <input  required type="text" name="lastname" placeholder="Last name" class="form-control" id="vehiclebrand">
                                                    @error('lastname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-2" >
                                               
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Email Address</label>
                                                    <input  required type="email" name="email" placeholder="Email Address" class="form-control" id="email">
                                                    @error('email')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                 <div class="col-md-6" >
                                                    <label for="inputFirstName" class="form-label">NIN </label>
                                                    <input required type="text" name="nin" placeholder="National Identity Number" class="form-control" id="address">
                                                    @error('address')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
								            <div class="row mb-2" >
                                                <div class="col-md-6" >
                                                    <label for="inputFirstName" class="form-label">Phone Number </label>
                                                    <input required type="text" name="phone_no" placeholder="Phone Number" class="form-control" id="address">
                                                    @error('address')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="card radius-10 mt-3 mb-3">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <p class="mb-0"><b>Upload Documents </b></p>
                                                    </div>
                                                    <hr/>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="passport" class="form-label">Vehicle License </label> 
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="vehiclelicensepaper" >
                                                            @error('passport')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        
                                                        <div class="col-md-6 mb-3">
                                                            <label for="proofofownership" class="form-label">Proof Of Ownership </label>  
                                                            <input required class="form-control" id="fancy-file-upload" type="file" name="proofofownership" >
                                                            @error('proofofownership')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" col-md-12 ">
                                                <div id="mainPrice" class="alert alert-info mt-3">Total Amount: - (₦ <span  >0</span>)</div>
                                                
                                            </div>
										
                                            <div class="col-12 mt-10 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary px-5">Start Permit Registration</button>
                                            </div>
										    <script type="text/javascript">
                                                jQuery(document).ready(function ($) {
											      
											        $.ajaxSetup({
														headers: {
															'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
														}
													});
													$("#selected").change(function() {
													   // result = $(this).val();
													    var result = $('#selected option:selected').data('id');
													    
													   // alert(result);
                                                        result = isNaN(result) ? 0 : result;
                                                        var formattedValue = new Intl.NumberFormat().format(result);
                                                        $("#mainPrice span").text(formattedValue);
                                                        $("#mainPriceInp span").val(formattedValue);
													})
                                                });
                                            </script>
									    </form>
									</div>
                                    
									<div class="hidden" id="elementHide11">
                                        <form class="row g-3" id="vehicleForm11" method="POST"  action="{{ route('home.postotherpermit') }}" enctype="multipart/form-data">
                                            @csrf
                                            <br>
                                                <h6 class="mb-0 text-dark"><b>Personal Information</b></h6>
                                            <hr>
                                            <input  required type="hidden" name="permittype" Value="Driver’s License Re-Issue">
                                            
                                            <div class="row mb-2" >
                                                <div class="col-sm-12">
                                                    <label for="inputFirstName" class="form-label">Select the Length of Years  </label>
                                                    <select class="form-select" id="mySelect2" name="lengthofyears" aria-label="Default select example">
                                                        <option value="00" >-- Select the Length of Years   --</option>
                                                        <option value="42,500">5 Years</option>
                                                        <option value="37,500">3 Years</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-2" >
                                                <div class="col-sm-12">
                                                    <label for="inputFirstName" class="form-label">Name on Driver’s License  </label>
                                                    <input  required type="text" name="nameondriver" placeholder="Name on Driver’s License " class="form-control" id="nod">
                                                    
                                                </div>
                                            </div>

                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Address</label>
                                                    <input  required type="text" name="address" placeholder="Address" class="form-control" id="vehiclebrand">
                                                    
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Driver License Number</label>
                                                    <input  required type="text" name="driverlicensenumber" placeholder=" Driver License Number" class="form-control" id="vehiclebrand">
                                                    
                                                </div>
                                                
                                            </div>
                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Date of Birth</label>
                                                    <input  required type="date" name="dateofbirth" placeholder=" Date of Birth" class="form-control" id="vehiclebrand">
                                                    
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Phone Number</label>
                                                    <input  required type="text" name="phonenumber" placeholder="Phone Number" class="form-control" id="vehiclebrand">
                                                    
                                                </div>
                                                
                                            </div> 
                                            <div class="row mb-2" >
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label"> Next of Kin</label>
                                                    <input  required type="text" name="nextofkin" placeholder=" Next of Kin" class="form-control" id="vehiclebrand">
                                                    
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label">Next of Kin Phone Number</label>
                                                    <input  required type="text" name="nextofkinphone_no" placeholder="Next of Kin Phone Number" class="form-control" id="vehiclebrand">
                                                    
                                                </div>
                                                
                                            </div> 
                                            <div class="row mb-2" >
                                                
                                                <div class="col-sm-6">
                                                    <label for="inputLastName" class="form-label"> Class of License </label>
                                                    <select required name="classoflicense" id="inputState" class="form-select">
                                                        <option disabled selected="selected" value="">Class of Licenses </option>
                                                        <option value="A"> A </option>
                                                        <option value="B">B </option>
                                                        <option value="C"> C </option>
                                                        <option value="D"> D </option>
                                                        <option value="E">E </option>
                                                        <option value="F"> F </option>
                                                        <option value="G"> G </option>
                                                        <option value="H">H </option>
                                                        <option value="I"> I </option>
                                                        <option value="J"> J </option>
                                                        <option value="V">V </option>
                                                    </select>
                                                    @error('dateofbirth')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label">Reason for Re-Issue</label>
                                                    <textarea required name="reasonfor" placeholder="Reason for Re-Issue" class="form-control" id="purpose"></textarea>
                                                </div>
                                            </div>

                                            <div class="card radius-10 mt-3 mb-3">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <p class="mb-0"><b>Upload Documents, and Means of ID  </b></p>
                                                    </div>
                                                    <hr/>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="vehiclelicensepaper" class="form-label">Picture of the Driver’s License </label>  
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="pictureoftheVehicleLicense" >
                                                            @error('vehiclelicensepaper')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        
                                                        <div class="col-md-6 mb-3">
                                                            <label for="affidavit" class="form-label">Affidavit </label>  
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="affidavit" >
                                                            @error('affidavit')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="policereport" class="form-label">Police Report </label> 
                                                            <input class="form-control" id="fancy-file-upload" type="file" name="policereport" >
                                                            @error('policereport')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" col-md-12 ">
                                                <div id="mainPrice" class="alert alert-info mt-3">Total Amount: - <span id="output2"></span></div>
                                                <input  required type="hidden" name="amount" id="selectedAmount"  value="">
                                                <div id="vehicleType"></div>
                                            </div>
                                            
                                            <div class="col-12 mt-10 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary px-5">Start Permit Registration</button>
                                            </div>
                                            <script type="text/javascript">
                                                jQuery(document).ready(function ($) {
											      
											        $.ajaxSetup({
														headers: {
															'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
														}
													});
													$("#selected").change(function() {
													   // result = $(this).val();
													    var result = $('#selected option:selected').data('id');
													    
													   // alert(result);
                                                        result = isNaN(result) ? 0 : result;
                                                        var formattedValue = new Intl.NumberFormat().format(result);
                                                        $("#mainPrice span").text(formattedValue);
                                                        $("#mainPriceInp span").val(formattedValue);
													})
                                                });
                                            </script>
                                            
                                         </form>
                                    </div>
									
                                          <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                var selected = document.getElementById("selected");
                                                var elements = [
                                                    document.getElementById("elementHide1"),
                                                    document.getElementById("elementHide2"),
                                                    document.getElementById("elementHide3"),
                                                    document.getElementById("elementHide4"),
                                                    document.getElementById("elementHide5"),
                                                    document.getElementById("elementHide6"),
                                                    document.getElementById("elementHide7"),
                                                    document.getElementById("elementHide8"),
                                                    document.getElementById("elementHide9"),
                                                    document.getElementById("elementHide10"),
                                                    document.getElementById("elementHide11")
                                                ];
                                        
                                                selected.addEventListener("change", function() {
                                                    var selectedValue = parseInt(selected.value); // Ensure it's parsed as integer
                                        
                                                    // Hide all elements first
                                                    elements.forEach(function(element) {
                                                        element.style.display = "none";
                                                    });
                                        
                                                    // Show the corresponding element based on selected value
                                                    if (selectedValue >= 1 && selectedValue <= elements.length) {
                                                        elements[selectedValue - 1].style.display = "block";
                                                    }
                                                });
                                            });
                                        </script>


								</div>
									
							</div>
				
						</div>
					</div>
				</div>
			</div>
			<!--end page-content-wrapper-->
			
			<script>
            function updateOutput2() {
              // Get the select element by its ID
              const selectElement2 = document.getElementById('mySelect2');
              const selectedAmount = document.getElementById('selectedAmount');
            
              // Get the selected option's value
              const selectedValue2 = selectElement2.value;
            
              // Update the output with the selected value
              const outputElement2 = document.getElementById('output2');
              outputElement2.textContent = `${selectedValue2}.00`;
              var originalValue = selectedValue2;
              selectedAmount.value = originalValue.replace(/,/g, "");
            }
            
            // Listen for the "change" event on the select element and call updateOutput() function
            document.getElementById('mySelect2').addEventListener('change', updateOutput2);
            
            // Call updateOutput() initially to show the initial value (optional)
            updateOutput2();
            </script>
		</div>
		<!--end page-wrapper-->
		@include('user.layouts.dashboardfooter');
	@endsection