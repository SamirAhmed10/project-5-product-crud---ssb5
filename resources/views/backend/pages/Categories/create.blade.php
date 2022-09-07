@extends('backend.layout.template')
@section('body-content')
 <div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
     <h4>Create Category</h4>
    </div>
    

 </div>
  <div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Create New Category</h6>
      <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-lg-6">
              <div class="form-group">
                 <label>Category </label>
                 <input type="text" class="form-control"  name="name" placeholder="Enter Category " required="required" autocomplete="off">
              </div>
              <div class="form-group">
                <label>Primary Category[optional]</label>
                <select class="form-control" name="is_parent">
                   <option value='0'>Please select the  category</option>
                   <!-- parent category-->
                   @foreach($parents as $p)
          
                   
                   <option value="{{ $p->id }}">{{$p->name}}
                   </option>
                    <!-- sub Category1 -->
                    @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $p->id)->get() as $cat )
                     <option value="{{ $cat->id }}">{{$p->name}}->{{$cat->name}}
                     </option>
                     <!-- sub Category2 -->
               
                    
                     @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $cat->id)->get() as $child )
                     <option value="{{ $child->id }}">{{$p->name}}->{{$cat->name}}->{{$child->name}}
                     </option>
                     <!-- sub Category3 -->
                     
                     
                     @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $child->id)->get() as $chi )
                     
                    


                     <option value="{{ $chi->id }}">{{$p->name}}->{{$cat->name}}->{{$child->name}}->{{$chi->name}}
                     </option>
                     <!-- sub category4 -->
            
                     @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $chi->id)->get() as $ch )
                     <option value="{{ $ch->id }}">{{$p->name}}->{{$cat->name}}->{{$child->name}}->{{$chi->name}}->{{$ch->name}}
                     </option>
                     <!-- sub category5 -->
                     
                     @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $ch->id)->get() as $c )
                     <option value="{{ $c->id }}">{{$p->name}}->{{$cat->name}}->{{$child->name}}->{{$chi->name}}->{{$ch->name}}->{{$c->name}}
                    </option>
                     @endforeach
                      
                     @endforeach
                     


                     @endforeach
                     
                     @endforeach
                     
                     @endforeach
                     @endforeach
                </select>
             </div>

              <div class="form-group">
                 <label>Status</label>
                 <select class="form-control" name="status">
                    <option value='0'>Please select the status</option>
                    <option value='1'>Active</option>
                    <option value='0'>Inactive</option>
                 </select>
              </div>
              <div class="form-group">
                 <label>Display</label>
                 <select class="form-control" name="display">
                    <option value='1'>Please select the display</option>
                    <option value='1'>Active</option>
                    <option value='0'>Inactive</option>
                 </select>
              </div>
         </div>
           
          <div class="col-lg-6">
                <div class="form-group">
                  <label>Category Description</label>
                  <textarea class="form-control" name="description" rows="5"></textarea>
                </div>
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control-file"  name="image">
               </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
               <input type="submit" name="addcategory" value="Save" class="btn btn-dark  mg-b-10">
            </div>
          </div>
       </div>
      </form>
    </div>
  </div>
@endsection