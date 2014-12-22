<?php

class WPAD_Loader {

	// protected $templateDir;

	public function __construct() {
		// $this->templateDir = $templateDir;
		// echo 'ADLoader created!';
	}


	public function loadTemplate($name){

		if($name == ""){
			return false;
		}

		$path = plugin_dir_path(dirname( __FILE__ )) . 'views/' . $name .'.html';
    if(!is_file($path)){
			throw new Exception('Template ' . $path . ' not found.');
    }
    return file_get_contents($path);
	}

	public function getTemplateVariables($template){
		preg_match_all("/\\{\\{\\s*(\\w*)\\s*\\}\\}/i", $template, $templateVars);
		return $templateVars[1];
	}

	// public function add_action( $hook, $component, $callback ) {
	// 		$this->actions = $this->add( $this->actions, $hook, $component, $callback );
	// }

	// public function add_filter( $hook, $component, $callback ) {
	// 		$this->filters = $this->add( $this->filters, $hook, $component, $callback );
	// }

	// private function add( $hooks, $hook, $component, $callback ) {

	// 	$hooks[] = array(
	// 			'hook'      => $hook,
	// 			'component' => $component,
	// 			'callback'  => $callback
	// 	);

	// 	return $hooks;

	// }

	// /**
	//  * Setup, registers all actions and filters
	//  */
	// public function run() {

	// 	foreach ( $this->filters as $hook ) {
	// 			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ) );
	// 	}

	// 	foreach ( $this->actions as $hook ) {
	// 			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ) );
	// 	}

	// }
}
