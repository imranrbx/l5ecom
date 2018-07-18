<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
class Profile extends Model
{
	use SoftDeletes;
   protected $guarded = [];
    protected $dates = ['deleted_at'];
    //
    public function getRouteKeyName(){
   	 return 'slug';
	}
	public function users(){
		return $this->belongsToMany('App\User');
	}
}
