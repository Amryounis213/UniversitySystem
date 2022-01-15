@extends('User.parent')
@section('btns')
<h5>({{$course->name}}) كويزات <i class="fa fa-link" aria-hidden="true"></i></h5>
<hr>
@endsection
@section('title2','كويزات')
@section('contact')
<div class="content container-fluid p-1 m-2">
  <div class="alert alert-info" role="alert">
    A simple primary alert—check it out!
    </div>
  <div class="row">
    <div class="container">  
      <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-header bg-info q">
            المساقات الاخرى
          </div>
          <div class="card-body">
            <nav class="lista">
              <ul>
                <li><a href="#"><i class="fa fa-arrow-right m-2" aria-hidden="true" style="color:red"></i> <strong>Logic Design</strong></a></li>
                <li><a href="#"><i class="fa fa-arrow-right m-2" aria-hidden="true" style="color:red"></i> <strong>Programming</strong></a></li>
                <li><a href="#"><i class="fa fa-arrow-right m-2" aria-hidden="true" style="color:red"></i> <strong>Computer</strong></a></li>
                <li><a href="#"><i class="fa fa-arrow-right m-2" aria-hidden="true" style="color:red"></i> <strong>Qustion 1</strong></a></li>
              </ul>
            </nav>
            
            
          </div>
        </div>
      </div>
      <div  class="col-md-9">
        
      @foreach($Quizzes as $q)
        
      <nav  class="quiz card mb-2">
        <ul>
          <li>
            <i class="fa fa-file-word-o" style="color: rgb(105, 105, 238)" aria-hidden="true"></i> <a href="{{route('Student.ConfirmAttempt',$q->id)}}" >{{$q->title}} </a>
           </li>
           <hr>
          <li><small>{{$q->created_at}}</small></li>
          <li><small style="color: rgb(105, 105, 238)">{{$q->content}}</small></li>
        </ul>
      </nav>
      
      
    @endforeach
      </div>
      </div>
    <!-- Button trigger modal -->
    
    
    <!-- Modal -->
    
    
    </div>
  
  </div>	

</div>
@endsection
@section('script')
<script src="{{asset('js/axios.js')}}"></script> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    function ConfirmDelete(patient,id){
        'use strict'
        Swal.fire({
            title: 'هل انت متأكد ؟',
             text: "لن تستطيع استرجاع البيانات",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'نعم ,احدف' ,
            cancelButtonText:'الغاء'
            })

            .then((result) => {
             if (result.value) {
            deleteElement(patient,id)
         }
})
    }
     function deleteElement(patient,id){
        'use strict'

        
        axios.delete('/lecturers/'+id)
            .then(function (response) {
             // handle success
             console.log(response);

             patient.closest('tr').remove();
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



