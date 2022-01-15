

  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i>Students</h1>
        
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">--</li>
        <li class="breadcrumb-item active"><a href="#">Students</a></li>
      </ul>
    </div>
    <div class="col-md-12">
      <div class="row d-flex justify-content-between m-2">
          <div>
            
          </div>
          <div>
           
          </div>
      </div>  
        
  </div>
    <div class="row">
      
      <div class="col-md-12">
        
        <div class="tile">
          <div class="tile-body">
            <div  class="col-md-12 p-2 m-2 row ">
              <div class="col-md-6 justify-content-start align-items-center">
                <h5 class="h5"><i class="fa fa-table"></i><strong> Students </strong></h5>
              </div>
             
              
              
            </div>
             
            
            <div class="table-responsive">
              
              <table class="table table-hover " id="sampleTable">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>first Name</th>
                    <th>Last Name</th>
                    <th>Number</th>
                    <th>Email</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach ($students as $student)
                  <tr>
                    <td>
                      <img  src="{{url('images/students/'.$student->image)}}" style="height: 50px; width: 50px">
                    </td>
                    <td>{{$student->first_name}}</td>
                    <td>{{$student->last_name}}</td>
                    <td>{{$student->number}}</td>
                    <td>{{$student->email}}</td>

                   
                  
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
 
 