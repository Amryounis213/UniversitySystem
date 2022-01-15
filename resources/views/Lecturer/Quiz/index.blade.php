
  @extends('Lecturer.parent')
  @section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i>Quizes</h1>
        <p>Create New Quiz</p>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
      </ul>
    </div>
    <div class="col-md-12">
      <div class="row d-flex justify-content-between m-2">
          <div>
            
          </div>
          <div>
            <a href="{{route('Lecturer.quiz.create')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>New Quiz</a>
          </div>
      </div>  
        
  </div>
    <div class="row">
      
      <div class="col-md-12">
        
        <div class="tile">
          <div class="tile-body">
             
              <input style="width: 100%; padding:5px ; margin-bottom:5px;" type="text" name="search" placeholder="Search...">
            
            <div class="table-responsive">
              
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Quiz No. </th>
                    <th>Content Name </th>
                    <th>Courses Name </th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($quizzes as $quiz)
                  <tr>
                    
                    <td>{{$quiz->title}}</td>
                    <td>{{$quiz->content}}</td>
                    <td>{{$quiz->Courses->name}}</td>
                    <td>
                      <a href="{{route('Lecturer.AddQuastions',$quiz->id)}}" class="btn btn-primary">
                        <i class="fa fa-plus" aria-hidden="true"></i>Add Quastions</a>
                      <a class="btn btn-dark" href="{{route('Lecturer.ShowQuastionBelongsToQuiz',$quiz->id)}}">Show Quastions</a>
                      <a href="#" class="btn btn-info">Edit</a>
                      <a href="#" class="btn btn-danger">Delete</a>
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
         <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">$('#sampleTable').DataTable();</script>
   
    <!-- Data table plugin-->
   
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script> 
    @endsection
  </body>
</html>