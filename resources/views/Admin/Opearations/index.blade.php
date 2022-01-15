
  @extends('Admin.parent')
  @section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i>Courses</h1>
        
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Control Panel</li>
        <li class="breadcrumb-item active"><a href="#">Courses</a></li>
      </ul>
    </div>
    <div class="col-md-12">
      <div class="row d-flex justify-content-between m-2">
          <div>
            
          </div>
          <div>
            
          </div>
      </div>  
        
  </div>
    <div class="row">
      
      <div class="col-md-12">
        
        <div class="tile">
          @if (Session::has('message'))
          <div class="alert alert-success" role="alert">
           {{Session::get('message')}}
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div> 
          @endif
          <div class="tile-body">
            <div  class="col-md-12 p-2 m-2 row ">
              <div class="col-md-6 justify-content-start align-items-center">
                <h5 class="h5"><i class="fa fa-table"></i><strong> Courses Table</strong></h5>
              </div>
              <div class="row col-md-6 justify-content-end">
                  <a style="height: 30px; width:100px;" href="#" class="btn btn-warning d-flex justify-content-center align-items-center ml-1"><i class="fa fa-print "></i><small>PDF</small></a>
                  <a style="height: 30px; width:120px;" href="#" class="btn btn-primary d-flex justify-content-center align-items-center ml-1"><i class="fa fa-plus "></i><small>Add Course</small></a>
              </div>
              
              
            </div>
              <div class="row container m-1 align-items-center justify-content-between">

                <div>
                <img style="width: 50px ; height: 50px;" src="{{url('images/students/'.$student->image)}}">
                <strong> {{$student->first_name}} {{$student->last_name}} </strong>
                </div>

                <strong>{{$student->number}}</strong>

              </div>
            <div class="table-responsive">
              
              <table class="table table-hover " id="sampleTable">
                <thead>
                  <tr>
                    <th>Course</th>
                    <th>Lecturer</th>
                    <th>Hours</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach ($StudentCourses as $student)
                 
                 <tr>
                  

                    <td>{{$student->coursename}}</td>
                    <td>{{$student->lecturer_firstname}}{{$student->lecturer_lastname}}</td>
                   
                    <td>{{$student->hours}}</td>
      
                  <td>
                    <div class="btn-group">
                     <form action="{{route('Admin.operation.destroy',$student->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-sm" type="submit">Revoke</button>
                      
                     </form>
                    </div>
                  </td>
                </tr>  
            
                 @endforeach 
                 
                 
                </tbody>
               
              </table>
              <hr>
              <tfoot class="container">
                
                <div class="row col-md-12 justify-content-start">
                  <h5>Hours: <strong class="badge badge-primary p-1"> 5 </strong></h5>
              </div>
              </tfoot>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  @endsection
  @section('script')
  <script src="{{asset('js/axios.js')}}"></script> 
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
      function ConfirmDelete(student,id){
          'use strict'
          Swal.fire({
              title: 'Are You Sure ?',
              text: "",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes ,Revoke' ,
              cancelButtonText:'Cancel'
              })
  
              .then((result) => {
               if (result.value) {
              deleteElement(student,id)
           }
  })
      }
       function deleteElement(student,id){
          'use strict'
          axios.delete('Admin/operation/'+id)
              .then(function (response) {
               // handle success
               console.log(response);
  
               course.closest('tr').remove();
               showMessage();
              })
  
              .catch(function (error) {
               // handle error
                console.log(error);
                  })
              .then(function () {
               // always executed
               });
               }
  
               function showMessage(){
                  Swal.fire({  
                      icon: 'success',
                      title: 'تم الحدف ',
                      showConfirmButton: false,
                      timer: 1500
  })
               }
  
  </script>
  
  
  @endsection
  
  </body>
</html>