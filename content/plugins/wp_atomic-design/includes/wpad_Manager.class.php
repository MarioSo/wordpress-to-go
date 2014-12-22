<?php

class WPAD_Manager {

	protected static $instance = NULL;

	protected $loader;
	protected $renderer;
	protected $plugin_slug;
	protected $version;

	protected $twigLoader;
	protected $twigInstance;

	protected $mustache;


	protected $options = array(
		'templateDir' => 'templates/ad'
	);

	protected $actions;
	protected $filters;


	public static function get_instance(){
		if ( NULL === self::$instance )
			self::$instance = new self;
		return self::$instance;
	}

	public function __construct() {

		$this->plugin_slug = 'wpad_';
		$this->version = '0.1.0';
		$this->load_dependencies();

		// if(is_admin()){
			$this->define_admin_hooks();
		// }

		$this->mustache = new Mustache_Engine(array(
			'template_class_prefix' => '__ADTemplate_',
			'loader' => new Mustache_Loader_FilesystemLoader(plugin_dir_path( dirname( __FILE__ )).'views')
		));






		//echo plugin_dir_path( dirname( __FILE__ ) );
		// template stuff
		$this->twigLoader = new Twig_Loader_Filesystem(plugin_dir_path( dirname( __FILE__ ) ) . 'views');



		//if context == develpment no cache

		// $this->twigInstance = new Twig_Environment($this->twigLoader, array(
		//     'cache' => plugin_dir_path( dirname( __FILE__ ) ) . 'templates/compilation_cache',
		// ));

		$this->twigInstance = new Twig_Environment($this->twigLoader);

	}

	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/wpad_Admin.class.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/wpad_Renderer.class.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/wpad_Loader.class.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/wpad_RenderTree.class.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/wpad_Item.class.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/wpad_Molecule.class.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/wpad_Organism.class.php';
		//require_once plugin_dir_path( __FILE__ ) . 'wpad_Loader.class.php';
		// require_once plugin_dir_path( __FILE__ ) . 'wpad_Renderer.class.php';

		// $this->loader = new WPAD_Loader($this->options['templateDir']);
		$this->renderer = new WPAD_Renderer();
	}

	private function define_admin_hooks() {
		$admin = new WPAD_Admin( $this->get_version() );
		$this->add_action( 'admin_enqueue_scripts', $admin, 'enqueue_styles' );
		$this->add_action( 'add_meta_boxes', $admin, 'add_meta_box' );
	}

	public function run() {
		if(count($this->filters)){
			foreach ( $this->filters as $hook ) {
					add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ) );
			}
		}

		if(count($this->actions)){
			foreach ( $this->actions as $hook ) {
					add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ) );
			}
		}
	}

	protected function add_action( $hook, $component, $callback ) {
			// echo 'action added!';
			$this->actions = $this->add( $this->actions, $hook, $component, $callback );
	}

	protected function add_filter( $hook, $component, $callback ) {
		// echo 'filter added!';
			$this->filters = $this->add( $this->filters, $hook, $component, $callback );
	}

	private function add( $hooks, $hook, $component, $callback ) {
		$hooks[] = array(
				'hook'      => $hook,
				'component' => $component,
				'callback'  => $callback
		);

		return $hooks;
	}


/**
* PUBLIC METHODS
*/
	public function get_version() {
		return $this->version;
	}

	// public function render_molecule($name){
	// 	$this->renderer->render_molecule($name);
	// }


	public function render(WPAD_Item $renderTree){

		return $this->renderer->render($renderTree);

		// $html = "";
		// foreach($renderTree as $key => $item) {

		// 	$template = $this->loader->loadTemplate($item->template);





		// 	// echo $template;


		// 	// echo "templ: " . $template . '<br />';

		// 	//$html .= $item->render();

		// }
		// return $html;

	}

	public function renderMUSTACHE($template = false, $data = array()){

		// MUSTACHE
		// return $this->mustache->render(((!$template) ? basename(get_page_template(), ".php"): $template) . '.mustache',  $data);

		// END MUSTACHE ---------------------------

	}

	// public function getRenderer(){
	// 	return $this->renderer;
	// }

	public function renderTWIG($template = false, $data = array()){
				// return $this->twigInstance->display(((!$template) ? basename(get_page_template(), ".php"): $template) . '.twig', $data);

				return $this->twigInstance->render(((!$template) ? basename(get_page_template(), ".php"): $template) . '.twig', $data);

	//$this->twigInstance

		// $basename = ((!$template) ? basename(get_page_template(), ".php"): $template);

		// echo '<br />' . $basename . '<br />';

		// $template = $this->twigInstance->loadTemplate( $basename . '.twig');


		// // //var_dump(explode($basename, "/"));





		// // echo "<pre>";
		// // var_dump($template->getBlocks());
		// // echo "</pre>";


		// // echo "<br />";
		// echo $template->displayBlock('test', $data);
	}


}
