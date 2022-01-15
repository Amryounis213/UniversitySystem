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
            <form method="POST" action="{{route('Admin.users.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input name="first_name" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter Name"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Number</label>
                <input name="number" class="form-control" id="exampleInputEmail1" type="number" aria-describedby="emailHelp" placeholder="Enter Student Number"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="email" class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
              </div>
              
              <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input name="image" class="form-control" id="exampleInputPassword1" type="file">
              </div>
              <div class="form-group">
                <label for="exampleSelect1">Section</label>
                <select name="sections_id" class="form-control" id="exampleSelect1">
                  <option>---Select---</option>
                  @foreach ($sections as $sections)
                  <option value="{{$sections->id}}">{{$sections->name}}</option>  
                  @endforeach
                  
                </select>
                
              </div>
              
              
           
          </div>
          <div class="col-lg-5 offset-lg-1">
            
              
                <div class="form-group">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input name="last_name" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter Last"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input name="password" class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
                </div>
                
                

                <div class="form-group">
                  <label for="exampleSelect1">Colleges</label>
                  <select name="colleges_id" class="form-control" id="exampleSelect1">
                    <option>--Select---</option>
                    @foreach ($colleges as $colleges)
                    <option value="{{$colleges->id}}">{{$colleges->name}}</option>  
                    @endforeach
                    
                  </select>
                </div>
                <div class="toggle lg">
                  <label for="exampleSelect1">Status( Active : Blocked )</label><br>
                  <label>
                    <input name="status"  type="checkbox" checked><span class="button-indecator"></span>
                  </label>
                </div>
                <div class="tile-footer">
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</main>

@endsection
