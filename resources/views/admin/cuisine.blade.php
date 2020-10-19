<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Cuisine</title>
  <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">Dashboard</div>
      </a>
      <hr class="sidebar-divider my-0">
        <li class="nav-item active">
        <a class="nav-link" href="{{ url('cuisine') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Manage cuisine</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('recipe') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Manage recipe</span></a>
      </li>
  <hr class="sidebar-divider">
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Logout</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="AdminLogin/logout">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

        </nav>

        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cuisine</h1>
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cuisineModal"> Add cuisine
            </button>
          </div> 
  <div class="card-body">
              <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Date</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                 
                  <tbody id="showcuision">
                   
                  </tbody>
                </table>
              </div>
</div>

       </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
   
  </div>


  <!-- The Modal -->
  <div class="modal" id="cuisineModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Cuisine</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <div class="form-group">
              <input type="text" class="form-control" placeholder="Enter cuisine name" id="cuisine_id" required>
           </div>
         <button type="submit" class="btn btn-primary float-right" onclick="addCuisine()">Submit</button>

        </div>
      </div>
    </div>
  </div>
  
 
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function(){

    $.ajaxSetup({
           headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
       });
     getAllRecipe();

  });  
 </script>
<script type="text/javascript">
  
   function addCuisine(){
         var cuisine_name = $("#cuisine_id").val();
         if (typeof(cuisine_name) !='undefined' && cuisine_name !='') {
           $.post("cuisine/addCuisine",{cuisine_name: cuisine_name},function(data)
          {
            var obj = JSON.parse(data);
            if(obj.type == "insert"){
              alert('Cuisine added successfully.');
               $('#cuisineModal').modal('hide');
               getAllRecipe();
               $("#cuisine_id").val('');
            }else{
              alert('Somethink went wrong!');
            }
          });
         }
          
     }

function getAllRecipe(){
   $.ajax({
       url:'cuisine/getAllCuisine',
       method:'POST',
       datatype:'JSON',
       success: function(res){
        console.log(res);
        var objCuision = JSON.parse(res); 
        var cuisineArr = $('#showcuision');  
        cuisineArr.empty(); 
        var sn = 1;
        if(objCuision.length > '0'){
          $.each(objCuision, function(key, value){
             cuisineArr.append('<tr><td>'+value.id+'</td> <td>'+value.cuisine_name+'</td><td>'+value.addedon+'</td> <td class="text-info">'+value.status+'</td></tr>');
           sn++;
        });
        }
       },
       error: function(err){
        console.log(err);
       }
   });
}


</script>

</body>


</html>
