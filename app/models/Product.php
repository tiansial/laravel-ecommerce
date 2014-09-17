<?php

class Product extends Eloquent {

	protected $fillable = array('category_id', 'title', 'description', 'price', 'availability', 'image', 'image_orig');

	public static $rules = array(
		'category_id' => 'required|integer',
		'title' => 'required|min:2',
		'description' => 'required',
		'price' => 'required|numeric',
		'availability' => 'integer',
		'image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif',
		'image_orig' => 'image|mimes:jpeg,jpg,bmp,png,gif'
	);

	public function category() {
		return $this->belongsTo('Category');
	}
}
