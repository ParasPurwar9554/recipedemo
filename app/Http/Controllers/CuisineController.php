<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuisine;
use DB;

class CuisineController extends Controller
{
    
    public function index()
    {
        return view('admin.cuisine');
    }

    public function addCuisine(Request $request){
    	  $cuisineModel = new Cuisine();
          $cuisine_name = $request->post('cuisine_name');
          $returnArr = array();
          if(isset($cuisine_name) && $cuisine_name !='') {
          	$cuisineModel->cuisine_name = trim($cuisine_name);
          	$cuisineModel->addedon = time();
          	$success = $cuisineModel->save();
          	if ($success) {
            	$returnArr['type']= "insert";  
          	}else{
          		$returnArr['type']= "ont insert";  
          	}
          }

          echo json_encode($returnArr); die;
    }

    public function getAllCuisine(){
    	$cuisineArr = array();
    	$cuisines = DB::table('cuisine_tbl')->get()->toArray();
    	if (!empty($cuisines)) {
    		foreach ($cuisines as $key => $value) {
    			$cuisineArr[$key]['id'] = $value->id;
    			$cuisineArr[$key]['cuisine_name'] = $value->cuisine_name;
    			$cuisineArr[$key]['status'] = ($value->status ==1)?"Active":"Not Active";
    			$cuisineArr[$key]['addedon'] = date("d/m/Y",$value->addedon);
    		}
    	}
    	echo json_encode($cuisineArr); die;
    	
    }
}
