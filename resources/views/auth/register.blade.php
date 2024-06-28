@extends('layouts.app')

@section('content')

<section class="breadcrumbs-custom">
    <div class="container">
      <div class="breadcrumbs-custom__inner">
        <ul class="breadcrumbs-custom__path">
          <li><a href="index.html">Home</a></li>
          <li class="active">Contacts</li>
        </ul>
      </div>
    </div>
</section>

<section class="section-md bg-default">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-2 col-lg-2">
        
      </div>
      <div class="col-md-8 col-lg-6">
        <h4>Registration</h4>
        
        <!-- RD Mailform-->
        <form action="{{ route('register') }}" class="" method="post">
            @csrf
            
            <div class="form-wrap">
            <label class="form-label-outside" for="contact-first-name"> Name:*</label>
            <input class="form-input @error('name') is-invalid @enderror" id="contact-first-name" type="text" name="name" required placeholder="Full name"/>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
          <div class="form-wrap">
            <label class="form-label-outside" for="contact-email">Email:*</label>
            <input id="email" placeholder="Email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-wrap">
            <label class="form-label-outside" for="contact-phone">Password:*</label>
            <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-wrap">
            <label class="form-label-outside" for="contact-phone">Confirm Password:*</label>
            <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Password confirmation">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          
          
          <div class="col-md-6 offset-md-4 pt-5">
            <button type="submit" class="button button-primary">
                {{ __('Register') }}
            </button>
        </div>
        </form>
      </div>

      <div class="col-md-2 col-lg-2">
        
      </div>

    </div>
  </div>
</section>




@endsection
