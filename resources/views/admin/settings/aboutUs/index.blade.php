@extends('layouts.admin')

@section('content')
<div id="main-wrapper">
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Settings</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if(session('success'))
                                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error'))
                                <div id="success-danger" class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="col-sm-2">
                                <div class="nav flex-column nav-pills mb-3" role="tablist">
                                    <a href="{{ route('admin.settings.content') }}" class="nav-link show active">Why choose us</a>
                                    <a href="{{ route('admin.settings.executiveSummary') }}" class="nav-link ">Executive Summary</a>
                                    <a href="{{ route('admin.settings.aboutUs') }}"  class="nav-link show active" >About us</a>
                                    <a href="{{ route('admin.settings.contactUs') }}"  class="nav-link " >Contact us</a>
                                    <a href="{{ route('admin.termsCondition.index') }}"  class="nav-link" >Terms Condition</a>
                                    <a href="{{ route('admin.privacyPolicy.index') }}"  class="nav-link" >Privacy Policy</a>
                                    <a href="{{ route('admin.team.getTeam') }}"  class="nav-link" >Team</a>
                                    <a href="{{ route('admin.socialLink.index') }}"  class="nav-link active" >Social Link</a>
                                    <a href="{{ route('admin.quicklink.index') }}"  class="nav-link" >Quick Link</a>
                                    <a href="{{ route('admin.officeHours.index') }}"  class="nav-link " >Office Hours </a>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <div class="tab-content">
                                    
                                    <div  class="tab-pane fade show active" role="tabpanel">
                                        @include('admin.settings.aboutUs.about_us')
                                    </div>
                                   
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
