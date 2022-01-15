@extends('Lecturer.parent')
@section('content')
<main class="app-content">
  <div class="row user">
    <div class="col-md-12">
        <div class="app-title">
            <div>
              <h1><i class="fa fa-th-list"></i>My Courses </h1>
              <p>Table to display analytical data effectively</p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
              <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
            </ul>
          </div>
    </div>
    <div class="col-md-12">
      <div class="row d-flex justify-content-between m-2">
          <div>
            
          </div>
          
      </div>  
        
  </div>
    <div class="col-md-12">
        
      <div class="row">
         
       
          </div>


          <div class="row">
            @foreach ($myCourses as $course)
              <div class="col-md-6">
                <div class="tile">
                  
                  <div class="content">
                      <div class="tile-title-w-btn">
                          <div class="row container">
                              <a href="#"><img style="height: 30px; width: 30px;" src="https://icon-library.com/images/college-icon-png/college-icon-png-6.jpg"></a>
                              <h5 class="ml-2"><a href="#">{{$course->name}}</a></h5>
                              </div>
                          
                        </div>
                     
                      
                    </div>
                  <div class="tile-body">Colleges:<a href="#"> {{$course->Colleges->name}}</a> <br> Section:{{$course->Sections->name}}
                    
                  </div>
                  <div class="tile-footer">
          
                    <a class="btn btn-primary" href="{{route('Lecturer.mystudent',$course->id)}}"><i class="fa fa-eye"></i>  Show Student</a>
                  </div>
                </div>
              </div>  
              
             @endforeach
            
            
            
          </div>
   
    </div>
    </div>
  </div>
</main>
@endsection