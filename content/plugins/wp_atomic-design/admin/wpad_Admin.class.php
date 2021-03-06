<?php

class WPAD_Admin {

private $version;

	public function __construct( $version ) {
		$this->version = $version;
	}

	public function enqueue_styles() {

		wp_enqueue_style(
				'wp_atomicdesign-admin',
				plugin_dir_url( __FILE__ ) . 'styles/wp_atomicdesign-admin.css',
				array(),
				$this->version,
				FALSE
		);

	}

	public function add_meta_box() {

		add_meta_box(
			'wp_atomicdesign-admin',
			'WP Atomic Design',
			array( $this, 'render_meta_box' ),
			'post',
			'normal',
			'core'
		);

	}

	public function render_meta_box() {
			require_once plugin_dir_path( __FILE__ ) . 'partials/wp_atomicdesign-template.php';
	}

}
