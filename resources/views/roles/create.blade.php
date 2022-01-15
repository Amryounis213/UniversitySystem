@extends('Admin.parent')
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i>Roles</h1>
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
            <form method="POST" action="{{route('roles.store')}}">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Add New Role</label>
                <input name="name" class="form-control" id="exampleInputEmail1" type="text"  placeholder="Enter Role"><small class="form-text text-muted" id="emailHelp">Important</small>
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
