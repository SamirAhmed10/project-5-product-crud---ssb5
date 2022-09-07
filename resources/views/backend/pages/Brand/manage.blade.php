@extends('backend.layout.template')
@section('body-content')
  <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Manage Brands</h4>
          
        </div>
</div>
<div class="br-pagebody">
 <div class="br-section-wrapper">
          <h4>Brand Table</h4>
          <a class="btn btn-info float-right mb-4" href="{{route('brand.create')}}" role="button">Add</a>

        <div class="row">
          <div class="col-lg-12 mt-5">
       

      <table class="table table-bordered table-striped table-dark ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Serial no</th>
      <th scope="col">Image</th>
      <th scope="col">Brand</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
      
      
    </tr>
  </thead>
  <tbody>
    @php $i=1; @endphp
    @foreach($brand as $Brands)
    <tr>
      <th scope="row">{{$i}}</th>
      <td>
        @if(!empty($Brands->image))
        <img src="{{asset('backend/img/brand/'.$Brands->image)}}"height="40">
        @else
           No image found
        @endif
      </td>
      <td>{{ $Brands->name }}</td>
      <td>
         @if ( $Brands->status == 0 )
             <span class="badge badge-danger">Inactive</span>
         @elseif ( $Brands->status == 1 )
             <span class="badge badge-success">Active</span>
         @endif
        </td>
      <td>
      <div class="action-button">
          <ul>
            <li><a href="{{ route('brand.edit',$Brands->id) }}"><i class="fa fa-edit"></i></a></li>
            <li><a href="" data-toggle="modal" data-target="#delete{{$Brands->id}}"><i class="fa fa-trash"></i></a></li>
          </ul>
        <div class="modal fade" id="delete{{$Brands->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
          <div class="modal-content">
           <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Do you want to confirm delete this brand</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
         <div class="modal-body">
         <div class="modal-buttons">
          <ul>
            <li>
                
              <form action="{{ route('brand.destroy', $Brands->id ) }}" method="POST">
               @csrf
                  <input type="submit" name="delete" class="btn btn-danger" value="confirm">
              </form>
           </li>
           <li>
              <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
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
    @php $i++; @endphp
    @endforeach
  </tbody>
  @if($brand->count()==0)
    <div class="alert alert-info" role="alert">
      Sorry! No Brand Available. Please Add New Brand
    </div>
  @endif

</table>
</div>
</div>
</div>
      </div>

    @endsection
