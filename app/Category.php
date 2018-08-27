<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Product;
use App\CategoryParent;

class Category extends Model
{
	 use SoftDeletes;

     protected $guarded = [];

     protected $dates = ['deleted_at'];
    
     public function products(){
    	return $this->belongsToMany('App\Product', 'category_product');
    }
    public function childrens(){
        return $this->belongsToMany(Category::class,'category_parent','parent_id','category_id');
    }
    public function parents(){
        return $this->belongsToMany(Category::class,'category_parent','category_id','parent_id');
    }
	public function getRouteKeyName(){
   	 return 'slug';
	}

}
