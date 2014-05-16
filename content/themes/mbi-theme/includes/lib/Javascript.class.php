<?php

/**
 * Javascript
 *
 * @version 0.2.0
 */
Class Javascript {

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

	public static function footer() {

		ob_start();

	// ----------------------------------------------
?>
<script>

	// @todo: put this into class function

	require(['modules/mbimq', 'modules/mbiconfig'], function(mbiMq, mbiConfig) {

		require.config({
			paths: {
<?php


$require = Settings::get_option('requirejs');

foreach ($require as $name => $path) {

	echo("\t\t\t\t".$name.': \''.$path.'\','.PHP_EOL);

}

?>
			}
		});

		mbiMq.init({
<?php

$queries = Settings::get_option('breakpoints');

foreach ($queries as $key => $query) {

	echo("\t\t\t".$key.': \''.$query.'\','.PHP_EOL);

}

?>
		});

		mbiConfig.path.gfx = '<?php echo(get_template_directory_uri()); ?>/assets/gfx/';

	});

	</script>
<?php
	// ----------------------------------------------

		echo ob_get_clean();

	}

}

Javascript::getInstance();