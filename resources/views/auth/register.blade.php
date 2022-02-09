@extends('layouts.auth')
@section('content')
<div class="page-login" style="margin-top: 75px ">
 <div class="" data-aos="fade-up">
   <div class="container">
     <div class="row align-items-center row-login">
       <div class="col-lg-6 text-center">
         <img src="/images/login-app.png"  alt=""class="w-50 mb-4 mb-lg-none"/>
       </div>
       <div class="col-lg-5">
         <h2 class="text-center w-75">ContactApp </br>Hallo, please register</h2>
         <form method="POST" action="{{ route('register') }}" class="mt-3">
           @csrf
           <div class="form-group">
             <label>Name</label>
             <input id="name" type="text" class="form-control w-75 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

             @error('name')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
           </div>
           <div class="form-group">
             <label>Email address</label>
             <input id="email" type="email" class="form-control w-75 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>
             @error('email')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
             @enderror
           </div>
           <div class="form-group mt-3">
             <label>Password</label>
             <input id="password" type="password" class="form-control w-75  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
           </div>
           <div class="form-group mt-3">
             <label>{{ __('Confirm Password') }}</label>
             <input id="password-confirm" type="password" class="form-control w-75" name="password_confirmation" required autocomplete="new-password">
           </div>
           <button type="submit" class="btn btn-dark btn-block w-75 mt-4">
               {{ __('Sign In Now') }}
           </button>
           <a class="btn btn-signup w-75 mt-2" href="/login">
             Sign Up
           </a>
         </form>
       </div>
     </div>
   </div>
 </div>
</div>
@endsection

