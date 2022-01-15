@extends('Lecturer.parent')
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i>Add Quastion For {{$Quizzes->title}}</h1>
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
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <form action="{{route('Lecturer.PostQuastions',$Quizzes->id)}}" method="POST">
              @csrf
              
              
              <div class="table-responsive">
                <input style="display:none" name="quizzes_id" class="form-control"  type="text"  value="{{$Quizzes->id}}"  readonly>
                
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Quastion</th>
                      <th style="width: 70%"><input name="quastion" class="form-control form-control-sm" type="text" placeholder="Write Quastion Here"></th>
                      <th><input name="mark" class="form-control form-control-sm" type="number" placeholder="Mark"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @for($i=0; $i <4 ; $i++)
                    <tr>
                      <th>Choice {{$i+1}}</th>
                      <th style="width: 70%"><input name="options[]" class="form-control form-control-sm" type="text" placeholder="Write Here"></th>
                      <th><input name="correct_answer" class="form-control form-control-sm" type="radio"></th>
                    </tr>
                    @endfor
                  </tbody>
                </table>
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
