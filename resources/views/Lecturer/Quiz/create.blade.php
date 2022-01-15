@extends('Lecturer.parent')
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i>Quizzes</h1>
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
            <form action="{{route('Lecturer.quiz.store')}}" method="POST">
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
                <label for="formGroupExampleInput">Title</label>
                <input name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="Quiz Title">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Content</label>
                <input name="content" type="text" class="form-control" id="formGroupExampleInput" placeholder="Content of Quiz">
              </div>

              <div class="form-group">
                <label for="formGroupExampleInput">day</label>
                <input name="day" type="text" class="form-control" id="formGroupExampleInput" placeholder="Whats The Day ?">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">From</label>
                <input name="time_from" type="text" class="form-control" id="formGroupExampleInput" placeholder="Time:Start">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">To</label>
                <input name="time_to" type="text" class="form-control" id="formGroupExampleInput" placeholder="Time:Finish">
              </div>
              <div class="form-group">
                <label for="exampleSelect1">Status</label>
                <select name="status" class="form-control" id="exampleSelect1">
                  <option value="Active">Active</option>
                  <option value="Closed">Closed</option>
                </select>
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
