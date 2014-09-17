<?php

class BaseController extends Controller {

	public function  __construct() {
		$this->beforeFIlter(function() {
			View::share('catnav', Category::all());
		});
	}
	/**1
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
