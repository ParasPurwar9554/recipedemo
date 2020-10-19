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

<div class="container" style="padding-top: 30px;">
  
   <div class="row">
      <div class="col-sm-4">
           <div class="form-group">
             <input type="text" class="form-control form-control-sm" placeholder="Search Recipe" id="recipe_search_id" name="recipe_search_id">
            </div>
      </div>
      <div class="col-sm-4">
          <button type="button" class="btn btn-success btn-sm" style="background-color: #d54215" onclick="getRecipeBySearch()">Search</button>
      </div>
      <div class="col-sm-4"></div>
  </div>   
  
</div>
</div> 


  
<div class="container" style="margin-top:30px; margin-bottom: 30px;">
  <div class="row">
    <div class="col-sm-2">
      <h3>Cuisine</h3>
      <ul class="nav nav-pills flex-column" id="showcuisionHome">
        
      </ul>
      <hr class="d-sm-none">
    </div>

<div class="col-sm-10">
  <div class="container">

     <div class="row" id="showRecipe">

      

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
     var cuisineId;
     getAllCuisine();
     getRecipeById(cuisineId);

  }); 

</script>
<script type="text/javascript">
  
function getAllCuisine(){
   $.ajax({
       url:'cuisine/getAllCuisine',
       method:'POST',
       datatype:'JSON',
       success: function(res){
        console.log(res);
        var objCuision = JSON.parse(res); 
        var cuisineArr = $('#showcuisionHome'); 
        console.log(objCuision); 
        cuisineArr.empty(); 
        var sn = 1;
        if(objCuision.length > '0'){
    $.each(objCuision, function(key, value){cuisineArr.append('<li class="nav-item" ><a class="nav-link"  href="javascript:void(0)" onclick="getRecipeById('+value.id+')">'+value.cuisine_name+'</a></li>');
           sn++;
        });
        }
       },
       error: function(err){
        console.log(err);
       }
   });
}

function getRecipeById(cuisineId){
      //var recipe_search_id = $("#recipe_search_id");
      $.ajax({
       url:'recipe/fetchAllRecipe',
       method:'POST',
       data:{cuisineId:cuisineId},
       datatype:'JSON',
       success: function(ress){
        console.log(ress);
        var obj = JSON.parse(ress); 
        var showDiv = $("#showRecipe");
        showDiv.empty();
        var sn = 1;
        if(obj.length > '0'){
          $.each(obj, function(key, value){
            var url1 = "RecipeDetail?recipe_id="+value.id;
            console.log(url1);
             showDiv.append('<div class="col-sm-6"><div class="card" style="width:400px"><img class="card-img-top" src="'+value.image_path+'" alt="Card image" style="width:100%"><div class="card-body"><a href='+url1+'><h4 class="card-title">'+value.recipe_name+'</h4></a><p class="card-text">'+value.recipe_des+'</p></div></div></div>');
           sn++;
        });
        }
        
       },
       error: function(err){
        console.log(err);
       }
   });
   
}

function getRecipeBySearch(){
  var recipe_search_id = $("#recipe_search_id").val();
  //alert(recipe_search_id);

   $.ajax({
       url:'recipe/fetchAllRecipe',
       method:'POST',
       data:{recipeName:recipe_search_id},
       datatype:'JSON',
       success: function(ress){
        console.log(ress);
        var obj = JSON.parse(ress); 
        var showDiv = $("#showRecipe");
        showDiv.empty();
        var sn = 1;
        if(obj.length > '0'){
          $.each(obj, function(key, value){
             showDiv.append('<div class="col-sm-6"><div class="card" style="width:400px"><img class="card-img-top" src="'+value.image_path+'" alt="Card image" style="width:100%"><div class="card-body"><a href="#"><h4 class="card-title">'+value.recipe_name+'</h4></a><p class="card-text">'+value.recipe_des+'</p></div></div></div>');
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