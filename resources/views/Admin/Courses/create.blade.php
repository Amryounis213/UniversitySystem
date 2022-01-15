@extends('Admin.parent')
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
          <div class="col-lg-5">
            <form action="{{route('Admin.courses.store')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Course Name</label>
                <input name="name" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter name of Course"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
              </div>
              
              <div class="form-group">
                <label for="exampleInputPassword1">Course Hours</label>
                <input name="hours" class="form-control" id="exampleInputPassword1" type="number" placeholder="Enter hours count">
              </div>

             
              
            
          </div>
          <div class="col-lg-5 offset-lg-1">
            <div class="form-group">
              <label for="exampleSelect1">Colleges</label>
              <select name="colleges_id" class="form-control" id="exampleSelect1">
                <option>--Select--</option>
                @foreach ($colleges as $college)
                  <option value="{{$college->id}}">{{$college->name}}</option>
                @endforeach
                
              </select>
            </div>
              
                
                <div class="form-group">
                  <label for="exampleSelect1">Section</label>
                  <select name="sections_id" class="form-control" id="exampleSelect1">
                    <option>--Select--</option>
                   @foreach ($sections as $section)
                    <option value="{{$section->id}}">{{$section->name}}</option>
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
