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
                            <div class="col-sm-2">
                                <div class="nav flex-column nav-pills mb-3" role="tablist">
                                    <a href="#v-pills-home" data-bs-toggle="pill" class="nav-link show active " aria-selected="false" role="tab" tabindex="-1">Why choose us</a>
                                    <a href="#v-pills-profile" data-bs-toggle="pill" class="nav-link " aria-selected="false" role="tab" tabindex="-1">About us</a>
                                    <a href="#v-pills-messages" data-bs-toggle="pill" class="nav-link" aria-selected="false" role="tab" tabindex="-1">Contact us</a>
                                    <a href="#v-pills-termsConditions" data-bs-toggle="pill" class="nav-link " aria-selected="false" role="tab" tabindex="-1">Terms Conditions</a>
                                    <a href="#v-pills-privacy" data-bs-toggle="pill" class="nav-link " aria-selected="false" role="tab" tabindex="-1"> Privacy Policy </a>
                                    <a href="#v-pills-settings" data-bs-toggle="pill" class="nav-link " aria-selected="false" role="tab" tabindex="-1">Team</a>
                                    <a href="#v-pills-footer" data-bs-toggle="pill" class="nav-link " aria-selected="false" role="tab" tabindex="-1">Footer Navigation</a>
                                    <a href="#v-pills-social" data-bs-toggle="pill" class="nav-link " aria-selected="false" role="tab" tabindex="-1">Social Link</a>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <div class="tab-content">
                                    <div id="v-pills-home" class="tab-pane fade show active " role="tabpanel">
                                        @include('admin.settings.why_choose_us_statement')
                                    </div>
                                    <div id="v-pills-profile" class="tab-pane fade" role="tabpanel">
                                        @include('admin.settings.about_us')
                                    </div>
                                    <div id="v-pills-messages" class="tab-pane fade " role="tabpanel">
                                        @include('admin.settings.contact_us')
                                    </div>
                                    <div id="v-pills-termsConditions" class="tab-pane fade " role="tabpanel">
                                        @include('admin.settings.termsConditions')
                                    </div>
                                    <div id="v-pills-privacy" class="tab-pane fade " role="tabpanel">
                                        @include('admin.settings.privacyPolicy')
                                    </div>
                                    <div id="v-pills-settings" class="tab-pane fade " role="tabpanel">
                                        @include('admin.settings.team')
                                    </div>
                                    <div id="v-pills-footer" class="tab-pane fade" role="tabpanel">
                                        <p>Footer Nav</p>
                                    </div>
                                    <div id="v-pills-social" class="tab-pane fade" role="tabpanel">
                                        @include('admin.settings.socialLink')
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
