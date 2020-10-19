<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>Recipe</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

             a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

          
        </style>
    </head> 
<body>
<div class="jumbotron jumbotron-fluid">

<nav class="navbar navbar-expand-lg" style="background-color: #d54215">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand text-white" href="#" >Recipe</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{ route('register') }}" class="text-white"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="{{ route('login') }}" class="text-white"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav> 
</div> 


  
<div class="container" style="margin-top:30px; margin-bottom: 30px;">
  <div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <div class="intro article-info">         
          <div class="headline-wrapper">
               <h1 class="headline heading-content">{{$recipeDetail[0]->recipe_name}}</h1>
             <div id="karma-lazy-sponsorLogo" class="sponsor-logo"></div>
          </div>
    </div>
    <p class="dek margin-16-tb padded-mobile">
      {{$recipeDetail[0]->recipe_descri}}
    </p>
    <div class="component lazy-image lazy-image-udf undefined lead-media aspect_3x2 cache-only align-default rendered image-loaded">
      <div class="inner-container js-inner-container  image-overlay">
        <img src="{{url('/upload/'.$recipeDetail[0]->image_path)}}" width="600" height="250">
                          
     </div>
      </div>
<div class="section-headline">
  <h2>Ingredients</h2>
{{$recipeDetail[0]->ingredients}}
</div>

  <div class="col-sm-2">
    <div class="two-subcol-content-wrapper">
           <div class="recipe-meta-item">
                                        <div class="recipe-meta-item-header">
                                          Prep Time:
                                        </div>
                                        <div class="recipe-meta-item-body">
                                          {{$recipeDetail[0]->pre_time}} mins
  
                                        </div>
                                      </div>
                                      <div class="recipe-meta-item">
                                        <div class="recipe-meta-item-header">
                                          Cook Time:
                                        </div>
                                        <div class="recipe-meta-item-body">
                                          {{$recipeDetail[0]->cook_time}} mins
                                        </div>
                                      </div>
                                      <div class="recipe-meta-item">
                                        <div class="recipe-meta-item-header">
                                          Total time:
                                        </div>
                                        <div class="recipe-meta-item-body">
                                          {{$recipeDetail[0]->total_time}} mins
                                          
                                        </div>
                                      </div>
                                </div>
            </div>
  
</div> 

</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>

       
</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){

    $.ajaxSetup({
           headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
       });
  }); 

</script>
