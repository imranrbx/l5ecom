<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Product;

class Category extends Model
{
	use SoftDeletes;
     protected $guarded = [];

     protected $dates = ['deleted_at'];
    
     public function products(){
    	return $this->belongsToMany('App\Product');
    }
    public function childrens(){
    	return $this->belongsToMany(Category::class,'category_parent','category_id','parent_id');
    }
}
