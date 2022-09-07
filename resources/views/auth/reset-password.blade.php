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

<x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="form-group">
            
            <div class="form-group">
            <label for="email">Email</label>
                <input type="email" id="email" class="form-control"  name="email" :value="old('email', $request->email)" required autofocus />
            </div>
            <div class="form-group">
           <label for="email">Password</label>
            

           <input type="password" id="password" class="form-control"  name="password" required />
            </div>

            <div class="form-group" >
                <label for="password_confirmation">Confirm Password</label>

                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                            
                                    
            </div>

            <div class="form-group">
             <button type="submit" class="btn btn-info btn-block">Reset Password</button>
                
            </div>
            </div>
        </form>
</div>
</div>
@endsection
