@extends('backend.layout.template')
@section('body-content')
  <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Manage Users</h4>
          
        </div>
</div>
<div class="br-pagebody">
 <div class="br-section-wrapper">
          <h4>User Table</h4>
          <a class="btn btn-info float-right mb-4" href="{{route('register')}}" role="button">Add</a>

        <div class="row">
          <div class="col-lg-12 mt-5">
       

      <table class="table table-bordered table-striped table-dark ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Serial no</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Action</th>
      
      
    </tr>
  </thead>
  <tbody>
    @php $i=1; @endphp
    @foreach($users as $userss)
    <tr>
      <th scope="row">{{$i}}</th>
       <td>{{ $userss->name }}</td>
      
      <td>{{ $userss->email }}</td>

      <td>{{ $userss->address }}</td>
      <td>{{ $userss->phone}}</td>
      <td>
         <div class="action-button">
          <ul>
            <li><a href="{{ route('useredit',$userss->id) }}"><i class="fa fa-edit"></i></a></li>
            <li><a href="" data-toggle="modal" data-target="#delete{{$userss->id}}"><i class="fa fa-trash"></i></a></li>
          </ul>
        <div class="modal fade" id="delete{{$userss->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
          <div class="modal-content">
           <div class="modal-header">
          
           <h5 class="modal-title" id="exampleModalLabel">Do you want to confirm delete this user</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
         <div class="modal-body">
         <div class="modal-buttons">
          <ul>
            <li>
            
             
              <form action="{{ route('userdestroy', $userss->id ) }}" method="POST">
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
      

    </tr>
    @php $i++; @endphp
    @endforeach
  </tbody>
  @if($users->count()==0)
    <div class="alert alert-info" role="alert">
      Sorry! No User Available.
    </div>
  @endif

</table>
</div>
</div>
</div>
      </div>

    @endsection
