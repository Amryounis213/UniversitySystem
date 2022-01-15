@extends('User.parent')
@section('stylesheet')

@endsection
@section('contact')


	
	<div class="content container-fluid p-1 m-2">
		
		<div class="alert alert-info" role="alert">
			A simple primary alert—check it out!
		  </div>
		
		<div class="row container ">
			<div  class="col-lg-5 ms-auto" style="box-shadow: 0px 0px 5px #ddd; ">
				<div class="title btn btn-info" style="padding-top:8px; margin:28px;">
					<i class="fa fa-user" style="color: white"></i>
					<h5>MY COURSES </h5>
					</div>
				
				<h6>Logic Design</h6>
				<div  class="progress">
					
					<div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
				  </div>
				  <hr>
				  <h6>Logic Design</h6>
				  <div  class="progress">
					<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width:25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				  </div>
				  <hr>
				  <h6>Logic Design</h6>
				  <div  class="progress">
					<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
				  </div>
				  <hr>
				  <h6>Logic Design</h6>
				  <div class="progress">
					<div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
				  </div>
				
				  
			</div>
			<div  class="col-lg-6 m-auto " style="box-shadow: 0px 0px 5px #ddd; ">
				<div class="index-view">
					<div class="title btn btn-info">
					<i class="fa fa-user" style="color: white"></i>
					<h5>Student Data</h5>
					</div>
					
					<div class="avatar-data mt-2" style="text-align: left;">
					<div class="text-data">
					<span>Name : <strong>{{Auth::user()->first_name}}{{Auth::user()->last_name}}</strong></span>
					<span>Email : <strong>{{Auth::user()->email}}</strong></span>
					<span>Number : <strong>{{Auth::user()->number}}</strong></span>
					</div>
					<img src="{{url('images/students/'.Auth::user()->image)}}" class="img-thumbnail rounded-circle" alt="Cinque Terre" style="height: 100px; width: 100px;"> 
					</div>
					<hr>
					<i class="fa fa-university" style="color: orange" aria-hidden="true"></i>
					<strong>{{Auth::user()->Colleges->name}}</strong>
					
					<hr>
					<i class="fa fa-university" style="color: orange" aria-hidden="true"></i>
					<strong>{{Auth::user()->Sections->name}}</strong>
					
  
					<hr>
					<div class="btns">
						<a class="btn btn-warning" href="#">Reports</a>
						<a class="btn btn-info" href="#">Chats</a>
						<a class="btn btn-dark" href="#">Edit </a>
					</div>
  
				</div>
				
				  
			</div>
			
		</div>
			
		
			
		
		</div>	

	</div>
	
@endsection
@section('script')
<script>
		$('.horizontal .progress-fill span').each(function(){
  var percent = $(this).html();
  $(this).parent().css('width', percent);
});


$('.vertical .progress-fill span').each(function(){
  var percent = $(this).html();
  var pTop = 100 - ( percent.slice(0, percent.length - 1) ) + "%";
  $(this).parent().css({
    'height' : percent,
    'top' : pTop
  });
});
</script>
@endsection