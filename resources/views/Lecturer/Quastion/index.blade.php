
  @extends('Lecturer.parent')
  @section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i>Make Quastions For Quiz</h1>
        <p>Create New Quastion</p>
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
            <a href="{{--route('Lecturer.Quiz.create')--}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>New Quastion</a>
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
                    <th>#</th>
                    <th>Course</th>
                    <th>Quiz</th>
                    <th style="width:55%">Quastion Content</th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($courses as $key=>$course )
                  @foreach ($course->Quizzes as $quiz)
                    @foreach ($quiz->Quastions as $quastion)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$course->name}}</td>
                      <td>{{$quiz->title}}</td>
                      <td>{{$quastion->quastion}}</td>
                      <td>
                          <div>
                            <a class="btn btn-info btn-sm" href="{{route('Lecturer.ShowQuastions',[$quiz->id,$quastion->id])}}"> <i class="fa fa-edit"></i> Edit</a>
                            <a class="btn btn-success btn-sm" href="#"><i class="fa fa-plus"></i>Add Answers</a>
                          </div>
                    </td> 
                    @endforeach
                 
                  </tr>  
                  @endforeach
                  
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