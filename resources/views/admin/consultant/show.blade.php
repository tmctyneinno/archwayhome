@extends('layouts.admin')
@section('content')

<div id="main-wrapper">
     <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start">
                <div class="me-auto d-lg-block d-block">
                    <h2 class="text-black font-w600">Consultant</h2>
                    <p class="mb-0">Welcome to {{ $contactUs->company_name}} backend</p>
                </div>
                <a href="{{route('admin.consultant.index')}}" class="btn btn-primary rounded light">View Consultant</a>
            </div> 
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 align-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST"  action="#" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Full Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Title" name="title" id="title" disabled value="{{ $consultant->fullname}}" >
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Email" name="email" id="email" disabled value="{{ $consultant->email}}" >
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Phone Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Phone" name="phone" id="phone" disabled value="{{ $consultant->phone}}" >
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Date of birth</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Date of Birth" name="date_of_birth" id="date_of_birth" disabled value="{{ $consultant->date_of_birth ? \Carbon\Carbon::parse($consultant->date_of_birth)->format('d F Y')  : '' }}" >
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Gender</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Gender" name="gender" id="gender" disabled value="{{ $consultant->gender}}" >
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">City</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="City" name="city" id="city" disabled value="{{ $consultant->city}}" >
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Country</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Country" name="country" id="country" disabled value="{{ $consultant->country}}" >
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">State</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="state" name="state" id="state" disabled value="{{ $consultant->state}}" >
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea disabled class="form-control" required>{{$consultant->address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Account Name</label>
                                        <div class="col-sm-9">
                                            <textarea disabled class="form-control" required>{{$consultant->account_name }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Account Number</label>
                                        <div class="col-sm-9">
                                            <textarea disabled class="form-control" required>{{$consultant->account_number }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Bank</label>
                                        <div class="col-sm-9">
                                            <textarea disabled class="form-control" required>{{$consultant->bank }}</textarea>
                                        </div>
                                    </div>
                                    
                                   
                                   
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4 align-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <h4 class="text-black font-w600">Referral details</h4>
                                <h5>Referred by:</h5>
                                @if($referrerDetails->isNotEmpty())
                                   
                                    <ul>
                                        @foreach($referrerDetails as $referrer)
                                            <li>{{ $referrer->fullname }} ({{ $referrer->email }})</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p >ARCHWAYHOMES AND INVESTMENT LIMITED </p>
                                @endif
                                <br/>
                                <h5>Referrals Made:</h5>
                                @if($consultant->referralsMade->isNotEmpty())
                                    
                                    <ul>
                                        @foreach($consultant->referralsMade as $referral)
                                            <li>Referred: {{ $referral->consultant->fullname }} ({{ $referral->consultant->email }})</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No referrals made.</p>
                                @endif

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
           

        </div>
    </div>
</div>
@endsection