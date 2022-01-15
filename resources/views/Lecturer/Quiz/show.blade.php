
  @extends('Lecturer.parent')
  @section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Quastions </h1>
        <p>Show All Quastion</p>
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
            <a href="{{route('Lecturer.AddQuastions',$QuizId->id)}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>New Quastion</a>
          </div>
      </div>  
        
  </div>
    <div class="row">
      
      <div class="col-md-12">
        
        <div class="tile">
          <div class="tile-body">
             
             
            
            <div class="table-responsive">
              
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <div  class="col-md-12 p-2 m-2 row ">
                    <div class="col-md-6 justify-content-start align-items-center">
                      <h5 class="h5"><i class="fa fa-table"></i><strong> Quastions of Quiz </strong></h5>
                    </div>
                    <div class="row col-md-6 justify-content-end">
                        <a style="height: 30px; width:100px;" href="#" class="btn btn-warning d-flex justify-content-center align-items-center ml-1"><i class="fa fa-print "></i><small>PDF</small></a>
                        <a style="height: 30px; width:100px;" href="#" class="btn btn-primary d-flex justify-content-center align-items-center ml-1"><i class="fa fa-refresh "></i><small>Refresh</small></a>
                    </div>
                    
                    
                  </div>
                </thead>
                <hr>
                <tbody>
                 
                    @foreach ($Quiz as $quiz)
                    @foreach ($quiz->Quastions as $key=>$quastion)
                        
                   
                    <div class="col-md-12">
                      <div class="tile">
                        
                        <div class="content">
                            <div class="tile-title-w-btn">
                                <div class="row container">
                                    <a href="#">{{$key+1}}</a>
                                    <h5 class="ml-2">{{$quastion->quastion}}</h5>
                                    </div>
                                <div class="btn-group">
                                  <a class="btn btn-primary" href="{{route('Lecturer.UpdateQuastions',[$quiz->id,$quastion->id])}}"><i class="fa fa-lg fa-edit"></i></a>
                                  <a class="btn btn-primary" href="#"><i class="fa fa-lg fa-trash"></i></a>
                                </div>
                              </div>
                           
                            
                          </div>
                          <hr>
                        <div class="tile-body">
                          @foreach($quastion->answer as $key=>$answer)
                          <li style="list-style: none" class="p-2 ">
                            <span class="badge badge-primary p-1 m-1">{{$key+1}}</span>
                            {{$answer->answer}} 
                            @if($answer->is_correct == 1)
                                <span class="badge badge-success p-1">correct</span>
                             @endif
                            
                          </li> 
                          
                          @endforeach
                        </div>
                        
                      </div>
                    </div>  
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