@extends('Admin.parent')
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i>Admins</h1>
      
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Forms</li>
      <li class="breadcrumb-item"><a href="#">Form Components</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="row">
          <div class="col-lg-5">
            <form action="{{route('Admin.admins.update',[$admins->id])}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input name="first_name" value="{{$admins->first_name}}" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter email"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" value="{{$admins->email}}" class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
              </div>
              
              
             
              
            
          </div>
          <div class="col-lg-5 offset-lg-1">
            
                <div class="form-group">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input value="{{$admins->last_name}}" name="last_name" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter email"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
                </div>
               
               
                <div class="tile-footer">
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</main>

@endsection
@section('script')
    <script type="text/javascript">
       $(document).ready(function() { 
           $("#courses_id").select2({
            placeholder: "Select a Course"
           });
          });
          $(document).ready(function() { 
           $("#colleges_id").select2();
          });
    </script>
@endsection