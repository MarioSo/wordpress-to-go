<?php

/**
 * Themesetup
 *
 * @version 0.2.0
 */
Class WPMLHelper {

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

	/**
	 * [translate description]
	 * @param  string $context [description]
	 * @param  [type] $name    [description]
	 * @param  [type] $value   [description]
	 * @return [type]          [description]
	 */
	public static function translate($context = 'mbi', $name, $value, $echo = false) {

		icl_register_string($context, $name, $value);

		$value = icl_t($context, $name, $value);

		if($echo === true) {

			echo $value;

		} else {

			return $value;

		}

	}

}