<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Recipe</title>
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
            <h1 class="h3 mb-0 text-gray-800">Recipe</h1>
          </div>
          <div class="container">
           <div class="row">
             <div class="col-sm-2"></div>
             <div class="col-sm-8">
                <form action="recipe/addRecipe" method="POST" enctype="multipart/form-data">
                   {{ csrf_field() }}
                   <div class="form-group">
                  <select class="form-control" id="" name="cuisineName" required="">
                    <option value="0">Select Cuisine</option>
                    @foreach ($cuisionData as $value)
                       <option value="{{$value->id}}">{{$value->cuisine_name}}</option>
                    @endforeach
                     
                  </select>
                  </div> 
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Recipe Name" name="recipeName" required="">
                  </div>
                  
                 <div class="form-group">
                   <div class="row">
                    <div class="col-sm-4"> <input type="number" class="form-control" placeholder="Enter prepration time" name="pre_time" required=""></div>
                    <div class="col-sm-4"> <input type="number" class="form-control" placeholder="Enter cook time" name="cookTime" required></div>
                    <div class="col-sm-4"> <input type="number" class="form-control" placeholder="Enter total time" name="totalTime" required></div>
                   </div>
                 </div>
                  <div class="form-group">
                    <input type="file" class="form-control-file border" name="recipeImage" required>
                  </div>
                <div class="form-group">
                  <label for="comment">Ingredients description:</label>
                  <textarea class="form-control" rows="2" name="ingredients" required></textarea>
                </div>   
                <div class="form-group">
                  <label for="comment">Recipe description:</label>
                  <textarea class="form-control" rows="2" name="recipeDescre" required></textarea>
                </div>   

               <button type="submit" class="btn btn-primary float-right">Submit</button>
             </form> 



             </div>
             <div class="col-sm-2"></div>
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


  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>

</html>
