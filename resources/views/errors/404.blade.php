@extends('layouts.app')

@section('content')
<section class="error overflow-hidden pb-10">
    <div class="container">
        <div class="error-content text-center">
            <h2 class="mb-2">Oops! Page not found</h2>
            <img src="{{ asset('assets/images/404-1.svg')}}" alt class="mb-4 w-75 mx-auto">
            <h3 class="m-0">we are sorry, but the page you requested was not found</h3>
            <div class="error-btn mt-4">
                <a href="{{ url('/') }}" class="nir-btn mr-2">GO TO HOMEPAGE</a>
                <a href="{{ route('home.pages', 'contact') }}" class="nir-btn-black">GO TO CONTACT PAGE</a>
            </div>
        </div>
    </div>
</section>



@endsection