@extends('backend.layout.template')
@section('body-content')
   <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Manage Products</h4>
         
        </div>
   
  </div>
   <div class="br-pagebody">
   <div class="br-section-wrapper">
          <h4>Product Table</h4>
          <a class="btn btn-info float-right mb-4" href="{{route('products.create')}}" role="button">Add</a>

    <div class="row">
     <div class="col-lg-12 mt-5">
       

      <table class="table table-bordered table-striped table-dark ">
      <thead class="thead-dark">
       <tr>
        <th scope="col">Serial no</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Brand</th>
        <th scope="col">Price</th>
        <th scope="col">Offer Price</th>
        <th scope="col">Action</th>
      
      
       </tr>
    </thead>
     <tbody>

       @php $i=1; @endphp 
      @foreach($product as $Product)
       <tr>
         <th scope="row">{{$i}}</th>
         
         <td>
        
         @php $j=1; @endphp 
          @foreach($Product->images as $image)
          @if($j>0)

      
            <img src="{{ asset('backend/img/products/' . $image->image ) }}" width="50">
      @endif
            @php $j--; @endphp
         @endforeach



         </td>
         
         <td>{{$Product->name}}</td>
         <td>{{$Product->category->name}}</td>
         <td>{{$Product->brand->name}}</td>
         <td>{{$Product->price}}</td>
         <td>
            @if(!empty($Product->offer_price))
              {{$Product->offer_price}}
            @else
                -N/A-
            @endif
        </td>

        <td>
         <div class="action-button">
          <ul>
            <li><a href="{{ route('products.edit',$Product->id) }}"><i class="fa fa-edit"></i></a></li>
            <li><a href="" data-toggle="modal" data-target="#delete{{$Product->id}}"><i class="fa fa-trash"></i></a></li>
          </ul>
        <div class="modal fade" id="delete{{$Product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
          <div class="modal-content">
           <div class="modal-header">
          
           <h5 class="modal-title" id="exampleModalLabel">Do you want to confirm delete this product</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
         <div class="modal-body">
         <div class="modal-buttons">
          <ul>
            <li>
            
             
              <form action="{{ route('products.destroy', $Product->id ) }}" method="POST">
               @csrf
               
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                
                  <input type="submit" name="delete" class="btn btn-danger" value="confirm">
              
              </form>
              
           </li>
           
         </ul>
        </div>
    
          </div>
 
         </div>
         </div>
         </div>


        </div>
        </td>

        </tr>
    
    
   
    <!-- childCat start-->
 
   <!-- childCat end-->
  @php $i++; @endphp
@endforeach
  </tbody>
  @if($product->count()==0)
    <div class="alert alert-info" role="alert">
      Sorry! No Product Available. Please Add New Product
    </div>
  @endif

 
</table>

</div>
</div>
      </div>
</div>
@endsection
