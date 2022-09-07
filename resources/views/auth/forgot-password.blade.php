@extends('layouts.app-layout')
 <title>reset password</title>
 @section('body-content')
 
 <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

<div class="login-wrapper password-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
<div class="signin-logo tx-center tx-36 tx-bold tx-inverse">
  <span class="tx-normal"></span> Reset
  <span class="tx-info">Password</span> 
  <span class="tx-normal"></span>
   </div>
  <div class="tx-center mg-b-30"></div>

       

          <x-auth-session-status class="mb-4" :status="session('status')" />

          <x-auth-validation-errors class="mb-4" :errors="$errors" />
          <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
             <label for="email">Email</label>
                 <input type="email" id="email" class="form-control"  name="email" value="{{old('email')}}" placeholder="Enter your Email"required autofocus>
            </div>
             <div class="form-group">
             <button type="submit" class="btn btn-info btn-block">Email Password Reset Link</button>
                
            </div>
         </div>
        </div>
    </form>
@endsection

