
  @extends('Admin.parent')
  @section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i>Section</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Control Panel</li>
        <li class="breadcrumb-item active"><a href="#">Sections</a></li>
      </ul>
    </div>
    <div class="col-md-12">
      <div class="row d-flex justify-content-between m-2">
          <div>
            
          </div>
          <div>
            <a href="{{route('Admin.sections.create')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>New Section</a>
          </div>
      </div>  
        
  </div>
    <div class="row">
     
      <div class="col-md-12">
        
        <div class="tile">
          @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
         {{Session::get('message')}}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div> 
        @endif
          <div class="tile-body">
            <div  class="col-md-12 p-2 m-2 row ">
              <div class="col-md-6 justify-content-start align-items-center">
                <h5 class="h5"><i class="fa fa-table"></i><strong> Sections Table</strong></h5>
              </div>
              <div class="row col-md-6 justify-content-end">
                  <a style="height: 30px; width:100px;" href="#" class="btn btn-warning d-flex justify-content-center align-items-center ml-1"><i class="fa fa-print "></i><small>PDF</small></a>
                  <a style="height: 30px; width:100px;" href="#" class="btn btn-primary d-flex justify-content-center align-items-center ml-1"><i class="fa fa-refresh "></i><small>Refresh</small></a>
              </div>
              
              
            </div>
              <input style="width: 100%; padding:5px ; margin-bottom:5px;" type="text" name="search" placeholder="Search...">
            
            <div class="table-responsive">
              
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>College Name -- Sections</th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($sections as $sections)
                  <tr>
                    
                    <td>{{$sections->Colleges->name}}--{{$sections->name}}</td>
                  
                    
                    <td>
                      <div class="btn-group">
                        <a style="height: 30px; width:130px;" class="btn btn-dark d-flex justify-content-center align-items-center ml-1" href="{{route('Admin.sectionShow',$sections->id)}}"><i class="fa fa-eye" aria-hidden="true"></i><small>Show Student</small></a>
                        <a style="height: 30px; width:100px;" href="{{route('Admin.sections.edit',$sections->id)}}" class="btn btn-primary d-flex justify-content-center align-items-center ml-1"><i class="fa fa-edit "></i><small>Edit</small></a>
                        <a style="height: 30px; width:100px;" href="#" class="btn btn-danger d-flex justify-content-center align-items-center ml-1"><i class="fa fa-trash"></i><small>Delete</small></a>
                      </div>
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