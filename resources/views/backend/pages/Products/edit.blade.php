@extends('backend.layout.template')
@section('body-content')


 <div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
     <h4>Update Product Information</h4>
    </div>
    

 </div>
  <div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Update Product Information</h6>
    


      <form action="{{route('products.update',$prdcts->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-lg-6">
              <div class="form-group">
                 <label>Product</label>
                 <input type="text" class="form-control"  name="name" placeholder="Enter Product" required="required" autocomplete="off" value="{{ $prdcts->name }}">
              </div>
              <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category_id">
                   <option>Please select the Category</option>
                   @foreach($categories as $ca)
                   @php $o=0; @endphp
                    @php $p=0; @endphp
                   @foreach($categoriess as $catssss)
                   @php $g = $o++; @endphp
                   @if($ca->id!=$catssss->is_parent)
                   @php $h = $p++; @endphp
                       @endif
                     @endforeach


                

               
                     @if($o==$p)
                     
                    
                  
                   
                   <option value="{{ $ca->id }}"
                   @if($ca->id==$prdcts->category_id)
                         selected
                         @endif
                   >{{$ca->name}}
                   </option>
                   @endif
               
                
                    <!-- sub Category1 -->
                    
                    @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $ca->id)->get() as $cat )
                    @php $i=0; @endphp
                    @php $j=0; @endphp
                     @foreach($categoriess as $cats)
                    
                     @php $a = $i++; @endphp
                        @if($cat->id!=$cats->is_parent)
                        @php $b = $j++; @endphp
                       @endif
                     @endforeach
                     
                    
                        @if($i==$j)
                     
                           <option value="{{ $cat->id }}"
                           @if($cat->id==$prdcts->category_id)
                            selected
                         @endif
                           >{{$ca->name}}->{{$cat->name}}
                           </option>
                        @endif
                        
                        
                  
                  
                  
                    
                  
                   
                  

                     
                     <!-- sub Category2 -->
                
                    
                     @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $cat->id)->get() as $child )
                     @php $k=0; @endphp
                    @php $l=0; @endphp
                     @foreach($categoriess as $catss)
                     @php $c = $k++; @endphp
                      
                        @if($child->id!=$catss->is_parent)
                         @php $d = $l++; @endphp
                         @endif
                        @endforeach
                        
                    
                        @if($c==$d)
                     
                           <option value="{{ $child->id }}"
                           @if($child->id==$prdcts->category_id)
                            selected
                         @endif
                           >{{$ca->name}}->{{$cat->name}}->{{$child->name}}
                           </option>
                        @endif
                        
                     
                    
                
                    
                     <!-- sub Category3 -->
                     
                     
                    
                     
                     @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $child->id)->get() as $chi )
                     @php $m=0; @endphp
                     @php $n=0; @endphp
                     @foreach($categoriess as $catsss)
                     @php $e = $m++; @endphp
                         
                        @if($chi->id!=$catsss->is_parent)
                        @php $f = $n++; @endphp
                        @endif
                      @endforeach
                        
                     
                        @if($e==$f)
                     
                           <option value="{{ $chi->id }}"
                           @if($chi->id==$prdcts->category_id)
                            selected
                         @endif
                           >{{$ca->name}}->{{$cat->name}}->{{$child->name}}->{{$chi->name}}
                           </option>
                        @endif
                        
                    
                   
              
                     <!-- sub category4 -->
                
                     @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $chi->id)->get() as $ch )
                     @php $q=0; @endphp
                     @php $r=0; @endphp
                     @foreach($categoriess as $catsssss)
                    
                     @php $s = $q++; @endphp
                        @if($ch->id!=$catsssss->is_parent)
                        @php $t = $r++; @endphp
                       @endif
                     @endforeach
                     
                    
                        @if($q==$r)
                     <option value="{{ $ch->id }}"
                     @if($ch->id==$prdcts->category_id)
                            selected
                         @endif
                     >{{$ca->name}}->{{$cat->name}}->{{$child->name}}->{{$chi->name}}->{{$ch->name}}
                     </option>
                     @endif
                     <!-- sub category5 -->
            
                     @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $ch->id)->get() as $c )
                     @php $u=0; @endphp
                    @php $v=0; @endphp
                     @foreach($categoriess as $catssssss)
                    
                     @php $w = $u++; @endphp
                        @if($cat->id!=$catssssss->is_parent)
                        @php $x = $v++; @endphp
                       @endif
                     @endforeach
                     
                    
                        @if($u==$v)
                     <option value="{{ $c->id }}"
                     @if($c->id==$prdcts->category_id)
                            selected
                         @endif
                     >{{$ca->name}}->{{$cat->name}}->{{$child->name}}->{{$chi->name}}->{{$ch->name}}->{{$c->name}}
                    </option>
                    @endif
                     
                  
                     
                     @endforeach
            
                     @endforeach
                    


                     @endforeach
                  
                     @endforeach
                     
                     
                     
                     @endforeach
                     
                     
                   @endforeach
                  
                      
                </select>
             </div>
              <div class="form-group">
                <label>Brand</label>
                <select class="form-control" name="brand_id">
                   <option>Please select the Brand</option>
                       @foreach($brand as $brands)
                         <option value="{{ $brands->id }}"
                         @if($brands->id==$prdcts->brand_id)
                         selected
                         @endif
                         >{{ $brands->name }} </option>
                       @endforeach
                      </select>
             </div>
         
             <div class="form-group">
                 <label>Product Quantity</label>
                 <input type="text" class="form-control"  name="quantity" placeholder="Enter Product Quantity" required="required" autocomplete="off" value="{{ $prdcts->quantity }}">
            </div>
              <div class="form-group">
                 <label>Product price</label>
                 <input type="text" class="form-control"  name="price" placeholder="Enter Product price" required="required" autocomplete="off" value="{{ $prdcts->price }}">
              </div>
              <div class="form-group">
                 <label>Product offer price [Optional]</label>
                 <input type="text" class="form-control"  name="offer_price" placeholder="Enter Product Offer Price" autocomplete="off" value="{{ $prdcts->offer_price }}">
              </div>
              
          
           
            
         </div>
           
       <div class="col-lg-6">
                <div class="form-group">
                  <label>Product Description</label>
                  <textarea class="form-control" name="description" rows="5">{{ $prdcts->description }}</textarea>
                </div>
                <div class="form-group">
                  <label>Product Specification</label>
                  <textarea class="form-control" name="specification" rows="5">{{ $prdcts->specification }}</textarea>
                </div>

                <div class="container">
               <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
          @if(session('success'))
            <div class="alert alert-success">
          {{ session('success') }}
           </div> 
        @endif
        @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> Some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
    
  
        <div class="input-group control-group img_div form-group col-md-4" >
          <input type="file" name="profileImage[]" class="form-control">
          <!-- Add More Button -->
          <div class="input-group-btn"> 
            <button class="btn btn-success btn-add-more" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
          </div>
          <!-- End -->
        </div>
        <!-- Add More Image upload field  -->
        <div class="clone hide ">
          <div class="control-group input-group form-group col-md-4" style="margin-top:10px">
            <input type="file" name="profileImage[]" class="form-control">
            <div class="input-group-btn"> 
              <button class="btn btn-danger btn-remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
          </div>
        </div>
        <!-- End -->
 
 
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          
          </div>
        </div>
        
  
  </div>

<script type="text/javascript">
 
    $(document).ready(function() {
 
      $(".btn-add-more").click(function(){ 
          var html = $(".clone").html();
          $(".img_div").after(html);
      });
 
      $("body").on("click",".btn-remove",function(){ 
          $(this).parents(".control-group").remove();
      });
 
    });
 
</script>
       
<div class="col-lg-6">
            <div class="form-group">
            <input type="submit" name="updateproduct" value="Update" class="btn btn-dark mg-b-10">
            </div>
          </div>
         
       </div>
      </form>
      
      <div class="modal-body">
         <div class="modal-buttons">
      <div class ="float-right">
        @foreach($prdcts->images as $image)
               <img src="{{ asset('backend/img/products/' . $image->image ) }}"width="50">
                @if($image->id)
                  <form action="{{ route('products.destroyimage', $image->id ) }}" method="POST" >
                  @csrf
                 <input type="submit" name="deleteimages" value="remove">
                  </form>
               @endif
        @endforeach
      </div>
    </div>
  
</div>
</div>
         
           </div>
     
  
@endsection