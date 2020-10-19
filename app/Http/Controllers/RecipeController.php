<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Recipe;
use DB;

class RecipeController extends Controller
{
    public function index()
    {
    	$cuisines = DB::table('cuisine_tbl')->get()->toArray();
        return view('admin.recipe',['cuisionData' => $cuisines]);
    }

    public function addRecipe(Request $request){
       	$recipeModel = new Recipe();
        $recipeImage =  $request->file('recipeImage');
        if(!empty($recipeImage)){
          $fileName = time().'_'.$recipeImage->getClientOriginalName(); 
        //  $filePath = $recipeImage->storeAs('upload', $fileName, 'public'); 
          $recipeImage->move(public_path("upload"),$fileName); 
          $recipeModel->image_path = $fileName;
        }
        $recipeModel->recipe_name =  $request->post('recipeName');
        $recipeModel->cuisine_id =  $request->post('cuisineName');
        $recipeModel->pre_time =  $request->post('pre_time');
        $recipeModel->cook_time =  $request->post('cookTime');
        $recipeModel->total_time =  $request->post('totalTime');
        $recipeModel->ingredients =  $request->post('ingredients');
        $recipeModel->recipe_descri  =  $request->post('recipeDescre');
        $recipeModel->addedon  =  time();
        $success = $recipeModel->save();
           return redirect()->action('RecipeController@index');
    }
public function fetchAllRecipe(Request $request){
            $recipeModel = new Recipe();
            $returnArrr = array();
            $cuisineId= $request->post('cuisineId');
            $recipeName= $request->post('recipeName');
            if(isset($cuisineId) && $cuisineId !=''){
               $recipes = DB::table('recipe_tbl')->where('cuisine_id',$cuisineId)->orderBy('id', 'desc')->get()->toArray();
            }else if(isset($recipeName) && $recipeName !=""){
                 $recipes = DB::table('recipe_tbl')->where('recipe_name', 'like', "%$recipeName%")->orderBy('id', 'desc')->get()->toArray();
            }else{
                $recipes = DB::table('recipe_tbl')->orderBy('id', 'desc')->get()->toArray();
            }
            
            if(!empty($recipes)){
               foreach ($recipes as $key => $value) {
                $fullPath = url('/upload/'.$value->image_path);
                $returnArrr[$key]['id'] = $value->id;
                $returnArrr[$key]['image_path'] = $fullPath;
                $returnArrr[$key]['recipe_name'] =  $value->recipe_name;
                $returnArrr[$key]['recipe_des'] = substr($value->recipe_descri,0,100);
                
               }
            }
            echo json_encode($returnArrr); die;
}



}
