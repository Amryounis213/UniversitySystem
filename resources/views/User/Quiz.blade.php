@extends('User.parent')

@section('title2','كويزات')
@section('contact')
<div class="content container-fluid p-1 m-2 cor">
  <div class="container">
    <div  class="alert alert-primary d-flex justify-content-start align-items-center">
       <i class="fa fa-info-circle p-2" aria-hidden="true"></i> Remember Solve All Quastions ! Dont Cry ^_^ 
    </div>
    </div>
    <form action="{{route('Student.submitAnswer')}}" method="POST">
      @csrf
    @foreach ($quastions as $key=>$q)
    <div class="container">
    <div class="row align-items-center">
      
    <div class="col-md-3">
      <div class="card" style="height:150px;">
        <div class="card-header bg-info q">
          {{$q->mark}} Mark
        </div>
        <div class="card-body d-flex justify-content-start align-items-center">
          <i class="fa fa-flag fa-x2 m-2" aria-hidden="true" style="color:red"></i> <strong>Qustion {{$key +1}}</strong>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="card m-3">
        <section class="row">
        
        <div class="col-md-12">
        <div class="card-header bg-info q">
          {{$q->quastion}}
        </div>
        <div class="card-body">
          <fieldset id="Q{{$q->id}}">
            @foreach($q->answer as $answer)
          <div class="form-check">
            <input class="form-check-input" type="radio" name="answer[][answer]" id="answer1">
            <label class="form-check-label" for="answer1">
              {{$answer->answer}}
            </label>
          </div> 
          @endforeach
          </fieldset>
        </div>
        </div>
        </section>
      </div>
    </div>
    </div>
    </div>
    @endforeach
    <div class="col-md-12 d-flex  justify-content-center ">
      <button type="submit" style="height: 40px; width: 150px" class="btn btn-info"><i class="fa fa-stop mr-2" aria-hidden="true"></i>Finish Quiz</a>
    </div>
    </form>
    
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



