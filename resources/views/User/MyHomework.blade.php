@extends('User.parent')
@section('stylesheet')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  .flip-card {
  background-color: transparent;
  width: 300px;
  height: 200px;
  border: 1px solid #f1f1f1;
  perspective: 1000px; /* Remove this if you don't want the 3D effect */
}

/* This container is needed to position the front and back side */
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

/* Do an horizontal flip when you move the mouse over the flip box container */
.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

/* Position the front and back side */
.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden; /* Safari */
  backface-visibility: hidden;
}

/* Style the front side (fallback if image is missing) */
.flip-card-front {
  background-color: #6eace7;
 
  color: #ffffff;
}

/* Style the back side */
.flip-card-back {
  background-color: #164dbb;
  color: white;
  transform: rotateY(180deg);
}
</style>
@endsection
@section('title2','الواجبات')
@section('contact')

  <div class="container">

    <div class="row">
      @foreach ($courses as $course)
    <div class="col-md-4">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front c">
            <h4>{{$course->coursename}}</h4>
          </div>
          <div class="flip-card-back">
            <h1>John Doe</h1>
            <p>Architect & Engineer</p>
            <a href="{{route('Student.userhomeworks',[$course->courses_id , $course->lecturers_id])}}" class="btn btn-info">دخول</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    </div>
  </div>
	



@endsection

@section('script')
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
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
{{-- 
 --}}



