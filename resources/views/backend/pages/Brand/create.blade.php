@extends('backend.layout.template')
@section('body-content')
 <div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
     <h4>Create Brand</h4>
    </div>
 </div>
  <div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Create New Brand</h6>
      <form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-lg-6">
              <div class="form-group">
                 <label>Brand </label>
                 <input type="text" class="form-control"  name="name" placeholder="Enter Brand " required="required" autocomplete="off">
              </div>
             
              
              <div class="form-group">
                 <label>Status</label>
                 <select class="form-control" name="status">
                    <option value='0'>Please select the status</option>
                    <option value='1'>Active</option>
                    <option value='0'>Inactive</option>
                 </select>
              </div>
         </div>
           
          <div class="col-lg-6">
                <div class="form-group">
                  <label>Brand Description</label>
                  <textarea class="form-control" name="description" rows="5"></textarea>
                </div>
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control-file"  name="image">
               </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
               <input type="submit" name="addcategory" value="Save" class="btn btn-dark mg-b-10">
            </div>
          </div>
       </div>
      </form>
    </div>
  </div>
@endsection