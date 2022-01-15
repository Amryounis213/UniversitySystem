<!DOCTYPE html>
<html>
<head>
	<title>University</title>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
 	
	<!-- CSS only -->
		@yield('stylesheet')
		<link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css')}}" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
		<link rel="stylesheet" href="{{asset('path/to/font-awesome/css/font-awesome.min.css')}}">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<!-------------Google Charts--------------->
		 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   
  </head>
   
  

        

		




	<body>
		<div class="box80">
		
		 <header class="nav-bar">

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
					
				<!---<a href="btn btn-primary" class="notification">
						<span>Inbox</span>
						<span class="badge">3</span>
					  </a>-->
				
				<a href="#" class="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-bell" aria-hidden="true"></i>
					<span class="badge">3</span>
				  </a>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="#">الاشعار الاول</a>
					<a class="dropdown-item" href="#">الاشعار الثاني</a>
					<a class="dropdown-item" href="#">الاشعار الثالث</a>
				  </div>
				
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
					  </button>
					  
					  
				<ul class="navbar-nav ml-auto">
					<!-- Authentication Links -->

					<li class="nav-item dropdown d-flex flex-row align-items-center ">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" style="color: white" role="button" data-toggle="dropdown" v-pre>
							{{Auth::guard('web')->user()->first_name }} <span class="caret"></span>
						</a>
						<img  src="{{url('images/students/'.Auth::guard('web')->user()->image)}}" class="img-thumbnail rounded-circle ml-1" alt="Cinque Terre" style="height: 50px; width: 50px;"> 
						
					

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{-- route('logout') --}}">
								اعدادات الطالب
							   
							</a>
							<a class="dropdown-item" href="{{route('Userlogout')}}">
							  
								تسجيل الخروج 
							</a>

							
						</div>
					</li>
					
				</ul>
			</nav>
				
	
				
		 </header>
        <div class="contact">
			<div class="box20">
				<nav class="menu">
					<ul>
						<h5 style="font-size: 12pt; text-align: left;padding: 10px 10px">Student Options</h5>
						
					<li>

						<i class="fa fa-home mr-1" style="color: white;"  ></i>
						<a href="{{route('Student.UserDashboard')}}">Home</a>
						
					</li>
					
					
					
					<li>
						<i class="fa fa-address-book mr-1" style="color: white;"></i>
						<a href="{{route('Student.UserOffered')}}">Offered Course</a>
						
					</li>
	
					<li>
						<i class="fa fa-address-book mr-1" style="color: white;"></i>
						<a href="{{route('Student.myCourses')}}">Registeration</a>
					</li>
					<li>
						<i class="fa fa-address-book mr-1" style="color: white;"></i>
						<a href="{{route('Student.full')}}">Assignment</a>
					</li>
					<li>
						<i class="fa fa-address-book mr-1" style="color: white;"></i>
						<a href="{{route('Student.viewQuizzes')}}">Quizzes</a>
					</li>
					
					
					
					</ul>
				</nav>
			</div>	
        @yield('contact')
		</div>
		</div>
        

      

		<!----------------SIDE NAV------------------->


{{--		<div class="box20">
			<nav class="menu">
				<ul>
					<h5 style="font-size: 12pt; text-align: right;padding: 10px 10px">خيارات الطالب</h5>
					<hr>
				<li>
					<a href="{{route('Student.UserDashboard')}}">الرئيسية</a>
					<i class="fa fa-home mr-1" style="color: white;"  ></i>
				</li>
				
				
				
				<li><a href="{{route('Student.UserOffered')}}">المساقات المطروحة</a>
					<i class="fa fa-address-book" style="color: white;"></i>

				</li>

				<li>

					<a href="{{route('Student.myCourses')}}">التسجيل الفصلي</a>
					<i class="fa fa-address-book" style="color: white;"></i>

				</li>
				<li><a href="{{route('Student.full')}}">الواجبات</a>
					<i class="fa fa-address-book" style="color: white;"></i>

				</li>
				<li><a href="{{route('Student.viewQuizzes')}}">الكويزات</a>
					<i class="fa fa-address-book" style="color: white;"></i>

				</li>
				
				
				
				</ul>
			</nav>








			</div>	
		</div> --}}













	


<!-- JS, Popper.js, and jQuery -->
@yield('script')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>