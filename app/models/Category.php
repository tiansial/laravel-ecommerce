<?php 

class Category extends Eloquent {
	protected $fillable = array('name');

	public static $rules = array('name' => 'required|unique:categories');

	public function products() {
		return $this->hasMany('Product');
	}
}