<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    protected $table = 'cuisine_tbl';
    public $timestamps = false;
}
