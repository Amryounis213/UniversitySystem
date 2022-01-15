@extends('Lecturer.parent')
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i>Courses</h1>
      <p>Bootstrap default form components</p>
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
          <div class="col-lg-12">
            <form action="{{route('Lecturer.homeworks.store')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleSelect1">Course</label>
                <select name="courses_id" class="form-control" id="exampleSelect1">
                  <option>--Select--</option>
                  @foreach ($myCourses as $myCourse)
                    <option value="{{$myCourse->id}}">{{$myCourse->name}}</option>
                  @endforeach
                  
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Name</label>
                <input name="name" class="form-control" id="exampleInputPassword1" type="text" placeholder="Enter Homework Name">
              </div>

             
              
              <div class="form-group">
                <label for="exampleInputPassword1">The Required</label>
                <textarea name="content" class="form-control" id="exampleInputPassword1" type="text" placeholder="Enter What you required for Students"></textarea>
              </div>

             
              
              <div class="tile-footer">
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
          </div>
         
            
           
                
               
               
            </form>
          
        </div>
        
      </div>
    </div>
  </div>
</main>

@endsection
