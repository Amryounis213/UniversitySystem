@extends('Admin.parent')
@section('content')
<main class="app-content">
  <div class="row user">
    <div class="col-md-12">
        <div class="app-title">
            <div>
              <h1><i class="fa fa-th-list"></i>Colleges</h1>
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
                          <div class="btn-group"><a class="btn btn-primary" href="#"><i class="fa fa-lg fa-plus"></i></a><a class="btn btn-primary" href="#"><i class="fa fa-lg fa-edit"></i></a><a class="btn btn-primary" href="#"><i class="fa fa-lg fa-trash"></i></a></div>
                        </div>
                     
                      
                    </div>
                  <div class="tile-body">Hey there, I am a very simple card. I am good at containing small bits of information. I am quite convenient because I require little markup to use effectively.</div>
                  <div class="tile-footer"><a class="btn btn-primary" href="#">Link</a></div>
                </div>
              </div>  
              @endforeach
            
            
            
            
          </div>
   
    </div>
    </div>
  </div>
</main>
@endsection