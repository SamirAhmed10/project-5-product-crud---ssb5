@extends('layouts.app-layout')
 <title>Verify Email</title>
 @section('body-content')
  
 <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

<div class="login-wrapper password-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
<div class="signin-logo tx-center tx-36 tx-bold tx-inverse">
  <span class="tx-normal"></span> Verify
  <span class="tx-info">Email</span> 
  <span class="tx-normal"></span>
   </div>
  <div class="tx-center mg-b-30"></div>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <button type="submit" class="btn btn-info btn-block" style="margin-bottom:10px;">
                        {{ __('Resend Verification Email') }}
                    </button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="btn btn-info btn-block">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
</div>
</div>
  @endsection
