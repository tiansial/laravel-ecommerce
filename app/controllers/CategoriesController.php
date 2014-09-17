<?php 

class CategoriesController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on' => 'post'));
	}

	public function getIndex() {
		return View::make('categories.index')
			->with('categories', Category::all());
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Category::$rules);

		if ($validator->passes()) {
			$category = new Category;
			$category->name = Input::get('name');
			$category->save();

			return Redirect::to('admin/categories/index')
				->with('message', 'Categoria Criada');
		}

		return Redirect::to('admin/categories/index')
			->with('message', 'Alguma coisa está errada')
			->withErrors($validator)
			->withInput();
	}

	public function postDestroy() {
		$category = Category::find(Input::get('id'));

		if($category) {
			$category->delete();
			return Redirect::to('admin/categories/index')
				->with('message', 'Categoria apagada');
		}

		return Redirect::to('admin/categories/index')
			->with('message', 'Alguma coisa está errada, tente outra vez por favor.');
	}
}