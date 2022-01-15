@extends('User.parent')
@section('stylesheet')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/card.css')}}">
@endsection
@section('title2','الواجبات')
@section('contact')

<div class="container container-homework">
  <section class="row">
    @foreach ($homeworks as $homework)
    <section class="col-md-4">
       <div class="homework">

        <div class="circle bg-info">
          <h1 class="h1">0{{$homework->id}}</h1>
        </div>
        
        <div class="content bg-light mt-4">

          <p><i class="fa fa-tasks" aria-hidden="true"></i>{{$homework->name}}</p>
        </div>

        <div class="btns">
          <a class="btn btn-info">مشاهدة</a>
        </div>





       </div>
    </section>
   @endforeach
  </section>

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
{{-- @if ($count > 0) 
	<div class="container">  
        <div class="row">
            @foreach ($homeworks as $homework)
            <div class="
            @if($count == 1)
            col-md-6
            @else
            col-md-12
            @endif
            mb-4">
               
                   
                    
                    
              
                <div class="accordion" id="accordionExample{{$homework->id}}">
                    
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$homework->id}}" aria-expanded="true" aria-controls="collapseOne">
                            {{$homework->name}} --->  {{$homework->created_at}}
                        </button>
                      </h2>
                     
                      <div id="collapseOne{{$homework->id}}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body d-flex justify-content-between">
                          <strong>{{$homework->content}}</strong>
                          <a href="#" type="button"  data-toggle="modal" data-target="#exampleModal" class="btn btn-info">اضف تسليم </a>
                          
                        </div>
                      </div>
                    </div>
                    
                   
                 
                </div>
                 
            </div>
            @endforeach
        
          </div>
    </div>

<!----- Model----->

    
@else
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          لا يوجد واجبات
        </div>
      </div>
    </div>
@endif
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!---End Model --->

@endsection

 --}}



