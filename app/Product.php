<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;

class Product extends Model
{
	use SoftDeletes;
    
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    //

    public function categories(){
    	return $this->belongsToMany('App\Category','category_product');
    }
    public function getRouteKeyName(){
   	 return 'slug';
	}
}
