@extends('Admin.parent')
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i>College Update</h1>
      
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Control Panel</li>
      <li class="breadcrumb-item"><a href="#">Edit Colleges</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="row">
          <div class="col-lg-5">
            <form action="{{route('Admin.courses.update',[$courses->id])}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="exampleInputEmail1">Course</label>
                <input name="name" value="{{$courses->name}}" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter email"><small class="form-text text-muted" id="emailHelp"></small>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Hours</label>
                <input name="hours" value="{{$courses->hours}}" class="form-control" id="exampleInputEmail1" type="number" aria-describedby="emailHelp" placeholder="Enter email"><small class="form-text text-muted" id="emailHelp"></small>
              </div>
              
              
              
             
              
            
          </div>
          <div class="col-lg-5 offset-lg-1">
            
            <div class="form-group">
                <label for="exampleFormControlSelect1">College</label>
                <select name="colleges_id" class="form-control" id="exampleFormControlSelect1">
                  <option>--Select--</option>
                  @foreach ($colleges as $college)
                  <option @if($college->id == $courses->colleges_id)   value="{{$college->id}}" selected @endif >{{$college->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="exampleFormControlSelect1">Section</label>
                <select name="sections_id" class="form-control" id="exampleFormControlSelect1">
                  <option>--Select--</option>
                  @foreach ($sections as $sections)
                  <option @if($sections->id == $sections->colleges_id)   value="{{$sections->id}}" selected @endif >{{$sections->name}}</option>
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