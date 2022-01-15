
  @extends('Admin.parent')
  @section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Students</h1>
        
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Control Panel</li>
        <li class="breadcrumb-item active"><a href="#">Students</a></li>
      </ul>
    </div>
    <div class="col-md-12">
      
      <div class="row d-flex justify-content-between m-2">
          <div>
            
          </div>
          <div>
            <a href="{{route('Admin.users.create')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>New Student</a>
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
                <h5 class="h5"><i class="fa fa-table"></i><strong> Students Table</strong></h5>
              </div>
              <div class="row col-md-6 justify-content-end">
                  <a style="height: 30px; width:100px;" href="#" class="btn btn-warning d-flex justify-content-center align-items-center ml-1"><i class="fa fa-print "></i><small>PDF</small></a>
                  <a style="height: 30px; width:100px;" href="#" class="btn btn-primary d-flex justify-content-center align-items-center ml-1"><i class="fa fa-refresh "></i><small>Refresh</small></a>
              </div>
              
              
            </div>
              <input style="width: 100%; padding:5px ; margin-bottom:5px;" type="text" name="search" placeholder="Search...">
            
            <div class="table-responsive">
              
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>first Name</th>
                    <th>Last Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>College</th>
                    <th>Section</th>
                    <th>Status</th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($students as $student)
                  <tr>
                    <td>
                      <img  src="{{url('images/students/'.$student->image)}}" style="height: 50px; width: 50px">
                    </td>
                    <td>{{$student->first_name}}</td>
                    <td>{{$student->last_name}}</td>
                    <td>{{$student->number}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->Colleges->name}}</td>
                    <td>{{$student->Sections->name}}</td>
                   

                    <td>
                      <div class="toggle lg">
                        <label>
                          <input name="status"  type="checkbox"
                          @if ($student->status == 'Active')
                          checked  
                          @endif
                          ><span class="button-indecator"></span>
                        </label>
                      </div>
                    </td>
                    <td>
                      <div class="btn-group">
                        <a style="height: 30px; width:100px;" href="{{route('Admin.users.edit',$student->id)}}" class="btn btn-primary d-flex justify-content-center align-items-center ml-1"><i class="fa fa-edit "></i><small>Edit</small></a>
                        <a style="height: 30px; width:100px;" href="{{----}}" class="btn btn-danger d-flex justify-content-center align-items-center ml-1"><i class="fa fa-trash"></i><small>Delete</small></a>
                        <a style="height: 30px; width:120px;" href="{{route('Admin.showallcourse',$student->id)}}" class="btn btn-info d-flex justify-content-center align-items-center ml-1"><i class="fa fa-eye"></i><small>Show Courses</small></a>
                       
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  
                 
                </tbody>
              </table>
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
      function ConfirmDelete(course,id){
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
              deleteElement(course,id)
           }
  })
      }
       function deleteElement(course,id){
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