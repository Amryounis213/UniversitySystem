@extends('Admin.parent')
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i>Students</h1>
      
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Control Panel</li>
      <li class="breadcrumb-item"><a href="#">Student Update</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="row">
          <div class="col-lg-5">
            <form action="{{route('Admin.users.update',[$users->id])}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input name="first_name" value="{{$users->first_name}}" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter email"><small class="form-text text-muted" id="emailHelp"></small>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" value="{{$users->email}}" class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email"><small class="form-text text-muted" id="emailHelp"></small>
              </div>

              <div class="form-group">
                <label for="exampleFormControlSelect1">College</label>
                <select name="colleges_id" class="form-control" id="exampleFormControlSelect1">
                  <option>--Select--</option>
                  @foreach ($colleges as $college)
                  <option @if($college->id == $users->colleges_id)   value="{{$college->id}}" selected @endif >{{$college->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="toggle lg">
                <label>
                  <input name="status"  type="checkbox"><span class="button-indecator"></span>
                </label>
              </div>
             
              
            
          </div>
          <div class="col-lg-5 offset-lg-1">
            
                <div class="form-group">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input value="{{$users->last_name}}" name="last_name" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter email"><small class="form-text text-muted" id="emailHelp"></small>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Number</label>
                    <input name="number" value="{{$users->number}}" class="form-control" id="exampleInputEmail1" type="number" aria-describedby="emailHelp" placeholder="Enter email"><small class="form-text text-muted" id="emailHelp"></small>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Section</label>
                    <select name="sections_id" class="form-control" id="exampleFormControlSelect1">
                      <option>--Select--</option>
                      @foreach ($sections as $sections)
                      <option @if($sections->id == $users->colleges_id)   value="{{$sections->id}}" selected @endif >{{$sections->name}}</option>
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