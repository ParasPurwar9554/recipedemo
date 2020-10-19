<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Admin Login</title>
  <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Admin Login </h1>
              </div>
              <form class="user" method="POST" action="AdminLogin/loginAdmin">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="username" placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user"  placeholder="Enter Password" name="userpass" required>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
              
               
              </form>
             
             
             
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

 <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
