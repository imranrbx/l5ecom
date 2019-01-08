<?php

namespace App;

use App\City;
use App\Country;
use App\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model {
	use SoftDeletes;
	protected $guarded = [];
	protected $dates = ['deleted_at'];
	//
	public function getRouteKeyName() {
		return 'slug';
	}
	public function user() {
		return $this->belongsTo('App\User');
	}
	public function country() {
		return $this->belongsTo('App\Country');
	}
	public function state() {
		return $this->belongsTo('App\State');
	}
	public function city() {
		return $this->belongsTo('App\City');
	}
	public function getCountry() {
		return $this->country->name;
	}
}
