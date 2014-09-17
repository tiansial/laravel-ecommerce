<?php

class ProductsController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on' => 'post'));
	}

	public function getIndex() {
		$categories = array();

		foreach(Category::all() as $category) {
			$categories[$category->id] = $category->name;
		}
		return View::make('products.index')
			->with('products', Product::all())
			->with('categories', $categories);
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Product::$rules);

		if ($validator->passes()) {
			$product = new Product;
			$product->category_id = Input::get('category_id');
			$product->title = Input::get('title');
			$product->description = Input::get('description');
			$product->price = Input::get('price');

			$image = Input::file('image');
			$filename = date('Y-m-d-H-i-s')."-".$image->getClientOriginalName();
			Image::make($image->getRealpath())->resize(300,300)->save('public/assets/images-orig/'.$filename);
			$product->image = 'assets/images/'.$filename;
			$product->image_orig = 'assets/images-orig/'.$filename;
			$product->save();

			return Redirect::to('admin/products/index')
				->with('message', 'Produto criado');
		}

		return Redirect::to('admin/products/index')
			->with('message', 'Alguma coisa está errada')
			->withErrors($validator)
			->withInput();
	}

	public function postDestroy() {
		$product = Product::find(Input::get('id'));

		if($product) {
			File::delete('public/'.$product->image);
			File::delete('public/'.$product->image_orig);
			$product->delete();
			return Redirect::to('admin/products/index')
				->with('message', 'Produto apagado');
		}

		return Redirect::to('admin/products/index')
			->with('message', 'Alguma coisa está errada, tente outra vez por favor.');
	}

	public function postToggleAvailability() {

		$product = Product::find(Input::get('id'));

		if($product) {
			$product->availability = Input::get('availability');
			$product->save();
			return Redirect::to('admin/products/index')->with('message', 'Produto actualizado');
		}

		return Redirect::to('admin/products/index')->with('message', 'Produto inválido');
	}
}
