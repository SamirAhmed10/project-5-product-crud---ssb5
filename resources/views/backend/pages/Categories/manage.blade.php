@extends('backend.layout.template')
@section('body-content')
   <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Manage Categories</h4>
         
        </div>
   
  </div>
   <div class="br-pagebody">
   <div class="br-section-wrapper">
          <h4>Category Table</h4>
          <a class="btn btn-info float-right mb-4" href="{{route('category.create')}}" role="button">Add</a>

    <div class="row">
     <div class="col-lg-12 mt-5">
       

      <table class="table table-bordered table-striped table-dark ">
      <thead class="thead-dark">
       <tr>
        <th scope="col">Serial no</th>
        <th scope="col">Image</th>
        <th scope="col">Category</th>
        <th scope="col">Parent</th>
        <th scope="col">Status</th>
        <th scope="col">Display</th>
        <th scope="col">Action</th>
      
      
       </tr>
    </thead>
     <tbody>
       @php $i=1; @endphp
       @foreach($categories as $Category)
       <tr>
         <th scope="row">{{$i}}</th>
           <td>
             @if(!empty($Category->image))
              <img src="{{asset('backend/img/category/'.$Category->image)}}"height="40">
           
            @else
             No image found
            @endif
          </td>
         <td>{{ $Category->name }}</td>
         <td>

           @if ( $Category->is_parent == 0 )
             <span></span>
             
           @elseif( $Category->is_parent !=0 )
           @foreach( App\Models\Category::orderBy('name', 'asc')->get() as $child )
           @if($Category->is_parent==$child->id)
              <span>{{$child->name}}</span>
              @endif
           @endforeach
           @endif

          </td>
        <td>

        @if ( $Category->status == 0 )
           <span class="badge badge-danger">Inactive</span>
         @elseif ( $Category->status == 1 )
           <span class="badge badge-success">Active</span>
         @endif
        </td>
        <td>

         @if ( $Category->display == 0 )
           <span class="badge badge-danger">Inactive</span>
         @elseif ( $Category->display == 1 )
           <span class="badge badge-success">Active</span>
         @endif
        </td>
        <td>
         <div class="action-button">
          <ul>
            <li><a href="{{ route('category.edit',$Category->id) }}"><i class="fa fa-edit"></i></a></li>
            <li><a href="" data-toggle="modal" data-target="#delete{{$Category->id}}"><i class="fa fa-trash"></i></a></li>
          </ul>
        <div class="modal fade" id="delete{{$Category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
          <div class="modal-content">
           <div class="modal-header">
          
           <h5 class="modal-title" id="exampleModalLabel">Do you want to confirm delete this category</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
         <div class="modal-body">
         <div class="modal-buttons">
          <ul>
            <li>
            
             
              <form action="{{ route('category.destroy', $Category->id ) }}" method="POST">
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
  @if($categories->count()==0)
    <div class="alert alert-info" role="alert">
      Sorry! No Category Available. Please Add New Category
    </div>
  @endif

 
</table>

</div>
</div>
      </div>
</div>
@endsection
