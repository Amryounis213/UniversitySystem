@extends('Admin.parent')
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i> Form Components</h1>
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
            <form method="POST" action="{{route('Admin.colleges.store')}}">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">College Name</label>
                <input name="name" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter Name"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
              </div>
               
           
          </div>
          <div class="col-lg-5 offset-lg-1">
            
              
                <div class="form-group">
                  <label for="exampleInputEmail1">Register Cost Per Hour</label>
                  <input name="cost" class="form-control" id="exampleInputEmail1" type="number" aria-describedby="emailHelp" placeholder="Cost"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Years</label>
                  <input name="years" class="form-control" id="exampleInputPassword1" type="number" placeholder="Study year">
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
