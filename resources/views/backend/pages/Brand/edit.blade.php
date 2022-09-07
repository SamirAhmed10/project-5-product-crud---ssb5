@extends('backend.layout.template')
@section('body-content')
 <div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
     <h4>Update Brand Information</h4>
    </div>
 </div>
  <div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Update Brand Information</h6>
      <form action="{{ route('brand.update', $brnd->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-lg-6">
              <div class="form-group">
                 <label>Brand name</label>
                 <input type="text" class="form-control"  name="name" placeholder="Enter Brand Name" required="required" autocomplete="off" value="{{$brnd->name}}">
              </div>
              
              
              <div class="form-group">
                 <label>Status</label>
                 <select class="form-control" name="status">
                    <option value='0'>Please select the status</option>
                    <option value='1' @if($brnd->status == 1 )  
                     selected 
                     @endif
                     >Active</option>
                    <option value='0' @if($brnd->status == 0) 
                     selected 
                     @endif
                     >Inactive</option>
                 </select>
              </div>
         </div>
           
          <div class="col-lg-6">
                <div class="form-group">
                  <label>Brand Description</label>
                  <textarea class="form-control" name="description" rows="5">{{$brnd->description}}</textarea>
                </div>
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control-file"  name="image">
               </div>
          </div>
          <div class="col-lg-12">  
            <div class="form-group">
               <input type="submit" name="updatebrand" value="Update" class="btn btn-dark mg-b-10">
            </div>
          </div>
       </div>
      </form>
    </div>
  </div>
@endsection