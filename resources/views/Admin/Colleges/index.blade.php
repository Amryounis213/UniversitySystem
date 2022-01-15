@extends('Admin.parent')
@section('content')
<main class="app-content">
  <div class="row user">
    <div class="col-md-12">
        <div class="app-title">
            <div>
              <h1><i class="fa fa-th-list"></i>Colleges</h1>
              
            </div>
            <ul class="app-breadcrumb breadcrumb side">
              <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
            </ul>
          </div>
    </div>
    <div class="col-md-12">
      @if (Session::has('message'))
      <div class="alert alert-success" role="alert">
       {{Session::get('message')}}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div> 
      @endif
      <div class="row d-flex justify-content-between m-2">
          <div>
            
          </div>
          <div>
            <a href="{{route('Admin.colleges.create')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>New College</a>
          </div>
      </div>  
     
  </div>
    <div class="col-md-12">
        
      <div class="row">
         
       
          </div>


          <div class="row">
              @foreach ($colleges as $college)
              <div class="col-md-6">
                <div class="tile">
                  
                  <div class="content">
                      <div class="tile-title-w-btn">
                          <div class="row container">
                              <a href="#"><img style="height: 30px; width: 30px;" src="https://icon-library.com/images/college-icon-png/college-icon-png-6.jpg"></a>
                              <h5 class="ml-2"><a href="#">{{$college->name}}</a></h5>
                              </div>
                          <div class="btn-group"><a class="btn btn-primary" href="#"><i class="fa fa-lg fa-plus"></i></a><a class="btn btn-primary" href="{{route('Admin.colleges.edit',$college->id)}}"><i class="fa fa-lg fa-edit"></i></a><a class="btn btn-primary" href="#"><i class="fa fa-lg fa-trash"></i></a></div>
                        </div>
                     
                      
                    </div>
                  <div class="tile-body">Hey there, I am a very simple card. I am good at containing small bits of information. I am quite convenient because I require little markup to use effectively.</div>
                  <div class="tile-footer">
                    <a class="btn btn-primary active" href="{{route('Admin.ViewSections',$college->id)}}">Sections:<strong style="color: wheat">{{$college->sections_count}}</strong></a>
                    <a class="btn btn-info" href="{{route('Admin.ViewStudents',$college->id)}}">Students:{{$college->students_count}}</a>
                    <a class="btn btn-warning" href="{{route('Admin.ViewCourses',$college->id)}}">Courses:{{$college->courses_count}}</a>
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