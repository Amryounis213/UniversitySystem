@extends('User.parent')

@section('contact')
<div class="content container-fluid p-1 m-2">
  @if (Session::has('message'))
  <div class="alert alert-danger" role="alert">
    <i class="fa fa-times-circle-o" aria-hidden="true"></i> {{Session::get('message')}}
  </div>
  @endif
  
  <div class="row container">
    
    <div style="border:1px solid #ddd" class="bg-white col-md-12">
    <div  class="col-md-12 p-2 m-2 row ">
      <div class="col-md-6 justify-content-start align-items-center">
        <h5 class="h5"><i class="fa fa-table"></i><strong> Offered Course</strong></h5>
      </div>
      <div class="row col-md-6 justify-content-end">
          <a style="height: 30px; width:100px;" href="#" class="btn btn-info d-flex justify-content-center align-items-center ml-1"><i class="fa fa-plus"></i><small>Add Course</small></a>
          <a style="height: 30px; width:100px;" href="#" class="btn btn-warning d-flex justify-content-center align-items-center ml-1"><i class="fa fa-print "></i><small>PDF</small></a>
          <a style="height: 30px; width:100px;" href="#" class="btn btn-primary d-flex justify-content-center align-items-center ml-1"><i class="fa fa-refresh "></i><small>Refresh</small></a>
      </div>
      
      
    </div>
    <table class="table table-hover table-striped col-md-12">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Course :</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($courses as $courses)
            
        
         <tr>
          <th scope="col">#</th> 
          <th scope="row">{{$courses->Courses->name}}</th>
          <th scope="row">{{$courses->Courses->hours}}</th>
          <th scope="row">{{$courses->Lecturers->first_name}}{{$courses->Lecturers->last_name}}</th>
          <th scope="row">{{$courses->status}}</th>
             
             <th scope="row">
              <a style="height: 30px; width:100px;" class="btn btn-primary d-flex justify-content-center align-items-center ml-1" href="{{route('Student.register',$courses->id)}}"><small>Add Course</small></a>
             </th> 
            
           </tr>  
           @endforeach
     
      </tbody>
    </table>
    </div>
  
  <div class="row   cont mt-2">
    
    
  </div>
  </div>	

</div>



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

        
        axios.delete('/lecturers/'+id)
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











