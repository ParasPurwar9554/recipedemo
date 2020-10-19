<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class RecipeDetailController extends Controller
{
    public function index(Request $request)
    {
    	 $recipe_id = $request->get('recipe_id');
    	 $fetchRecipe = DB::table('recipe_tbl')->where('id',$recipe_id)->get()->toArray();
        return view('recipedetails',['recipeDetail'=>$fetchRecipe]);
    }
}
