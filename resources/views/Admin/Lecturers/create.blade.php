@extends('Admin.parent')
@section('content')

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i>Lecturers</h1>
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
          <div class="col-lg-5">
            <form action="{{route('Admin.lecturers.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input name="first_name" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter email"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
              </div>
              
              <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input name="image" class="form-control" id="exampleInputPassword1" type="file" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="exampleSelect1">Degree</label>
                <select name="degree" class="form-control" id="exampleSelect1" >
                    <option>--Select--</option>
                    <option value="Debloma">Debloma</option>
                    <option value="BA">Bachelor</option>
                    <option value="MA">Master</option>
                    <option value="PH">Doctorate</option>
                  
                </select>
              </div>
              <div class="form-group">
                <label for="exampleSelect1">Sections</label>
                <select name="sections_id" class="form-control" id="exampleSelect1" >
                    <option>--Select--</option>
                  @foreach ($sections as $section)
                    <option value="{{$section->id}}">{{$section->name}}</option>
                  @endforeach
                  
                 
                  
                </select>
              </div>
            
          </div>
          <div class="col-lg-5 offset-lg-1">
            
                <div class="form-group">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input name="last_name" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter email"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input name="password" class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleSelect1">Courses</label>
                  <select name="courses_id[]" class="form-control" id="courses_id" multiple>
                    
                    @foreach ($courses as $course)
                      <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                    
                   
                    
                  </select>
                </div>

                

                <div class="form-group">
                  <label for="exampleSelect1">College</label>
                  <select name="colleges_id" class="form-control" id="colleges_id" >
                    
                    @foreach ($colleges as $college)
                      <option value="{{$college->id}}">{{$college->name}}</option>
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
           $("#courses_id").select2();
          });
          $(document).ready(function() { 
           $("#colleges_id").select2();
          });
    </script>
@endsection