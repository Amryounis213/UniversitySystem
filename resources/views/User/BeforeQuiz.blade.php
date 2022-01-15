@extends('User.parent')
@section('btns')
<h5>({{--$course->name--}}) كويزات <i class="fa fa-link" aria-hidden="true"></i></h5>
<hr>
@endsection
@section('title2','كويزات')
@section('contact')
<div class="content container-fluid p-1 m-2">
  @if(Session::has('message'))
  <div class="alert alert-danger" role="alert">
     {{Session::get('message')}}
    </div>
  @endif
  <div class="row">
    <div class="container">  
      <div class="row">
    
      <div  class="col-md-12">

        <div class="card">
          <h5 class="card-header">{{$Quiz->title}}</h5>
          <div class="card-body">
            <h5 class="card-title">This Quiz Active From <strong style="color: red"> {{$Quiz->time_from}} </strong> AM To <strong style="color: red"> {{$Quiz->time_to}} </strong> AM</h5>
            <p class="card-text">{{$Quiz->content}}</p>
            <p class="card-text"><strong>Course :</strong>{{$Quiz->Courses->name}}</p>
            <p class="card-text"><strong>Dr : </strong>{{$Quiz->Lecturers->first_name}} {{$Quiz->Lecturers->last_name}}</p>
            @if($hasAttempt)
            <p class="card-text" style="color: red"><strong>You Dont Have Access To quiz</strong></p>
            
            @endif
            @if(!$hasAttempt)
            <p class="card-text" style="color: seagreen"><strong>{{$Quiz->status}}</strong></p>
            <a href="{{route('Student.StoreTaker',$Quiz->id)}}" class="btn btn-primary">Attempt Quiz</a>
            @endif
          </div>
        </div>
        

      </div>
      </div>
   
    
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



