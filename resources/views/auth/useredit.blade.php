@extends('backend.layout.template')
@section('body-content')
 <div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
     <h4>Update User Information</h4>
    </div>
 </div>
 <div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Update User Information</h6>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form method="POST" action="{{ route('userupdate', $usrr->id) }}" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
       <label for="name"> Full Name</label>
      <input type="text" id="name" class="form-control" name="name" placeholder="Enter your Fullname" required autofocus  value="{{$usrr->name}}" >
    </div>
    <div class="form-group">
       <label for="email"> Email Address </label>
      <input type="email" id="email" class="form-control" name="email"value="{{old('email')}}" placeholder="Enter your Email" required>
    </div>
    <div class="form-group">
     <label for="password"> Password</label>
      <input type="password" id="password" class="form-control"name="password"placeholder="Enter your password" required autocomplete="new-password">
      </div>
      <div class="form-group">
      <label for="password_confirmation">Re-Type Password</label>
      <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Re-type your password" required>
      </div>
   
      
      
      <div class="form-group">
     <label for="phone"> Mobile No</label>
      <input type="text" id="phone" class="form-control"name="phone"placeholder="Enter your mobile no" autocomplete="off" value="{{$usrr->phone}}">
      </div>
      <div class="form-group">
     <label for="address">Address</label>
      <input type="text" id="address" class="form-control"name="address"placeholder="Enter your address" autocomplete="off" value="{{$usrr->address}}">
</div>
      
     
    <button type="submit" class="btn btn-info mb-3 btn-block">Update</button>
    <a class="btn btn-info mb-3 btn-block" href="{{route('admin.dashboard')}}" role="button">Go To Dashboard</a>
   
    
   


 
      
 
              
              
              
        
  
            
         
      </form>
    </div>
  </div>
@endsection