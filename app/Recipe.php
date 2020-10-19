<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipe_tbl';
    public $timestamps = false;
}
