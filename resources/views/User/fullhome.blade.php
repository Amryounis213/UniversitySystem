@extends('User.parent')
@section('btns')

	<a href="{{--route('lecturers.create')--}}" class="btn btn-primary">اضافة محاضر جديد</a>
	

@endsection
@section('title2','المحاضرين')
@section('contact')
<div class="container border  bg-light">
    @foreach ($courses as $course)
    <a href="{{route('Student.userhomeworks',$course->id)}}" style="width: 100% ;height:100px;"  class="btn btn-primary mb-2">
        {{$course->coursename}} <span class="badge bg-secondary">4</span>
    </a>
    @endforeach
	
     
      
{{--<div class="row justify-content-center">
  {{$lecturers->links()}}
</div>--}}
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



