@extends('Admin.parent')
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i>Create New Admin</h1>
      
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Control Panel</li>
      <li class="breadcrumb-item"><a href="#">create Admins</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="row">
          <div class="col-lg-5">
            <form action="{{route('Admin.admins.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input name="first_name" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter First Name"><small class="form-text text-muted" id="emailHelp"></small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input name="email" class="form-control" id="exampleInputPassword1" type="email" placeholder="Email Address">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input name="image" class="form-control" id="exampleInputPassword1" type="file">
              </div>
              
              
           
          </div>
          <div class="col-lg-5 offset-lg-1">
            
              
                <div class="form-group">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input name="last_name" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter Last Name"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input name="password" class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleSelect1">Role</label>
                  <select name="roles_id" class="form-control" id="exampleSelect1">
                    <option>--Select Role</option>
                    @foreach ($roles as $roles)
                    <option value="{{$roles->id}}">{{$roles->name}}</option>
                    @endforeach                 
                    
                  </select>
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
