<?php

/**
 * Images
 *
 * @version 0.2.0
 */
Class Images {

	public static function getInstance() {

		static $instance = null;

		if(null === $instance) {
			$instance = new static();
		}

		return $instance;

	}

	protected function __construct() {}
	private function __clone() {}
	private function __wakeup() {}

	// ----------------------------------------

	public static $sizes; // wordpress image sizes
	public static $css;

	public static function add_size($size, $retina = true) {

		add_image_size($size['name'], $size['width'], $size['height'], true);

		if($retina === true) {
			add_image_size($size['name'].'@2x', $size['width']*2, $size['height']*2, true);
		}

	}

	public static function prepare_size($width, $x, $y, $name, $group, $query) {

		$height = (int)($width/$x*$y);

		return array(

			'name' => $name,
			'width' => $width,
			'height' => $height,
			'ratio' => $x.':'.$y,
			'query' => $query,
			'group' => $group

		);

	}

}

