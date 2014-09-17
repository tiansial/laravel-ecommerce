<?php 

class Availability {
	public static function display($availability) {
		if ($availability == 0) {
			echo "Sem Stock";
		}
		elseif ($availability == 1) {
			echo "Em Stock";
		}
	}

	public static function displayClass($availability) {
		if ($availability == 0) {
			echo "outofstock";
		}
		elseif ($availability == 1) {
			echo "instock";
		}
	}
}