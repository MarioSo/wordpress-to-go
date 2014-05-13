<?php

Class Helper {

	public $settings;

	public function __construct(Settings $_settings) {

		$this->settings = $_settings;

	}

	public function banner($force = false) {

		if($this->settings->get_option('banner') === true || $force === true) {

			ob_start();

		?>
	<!--
	/*
	 * This website was carefully designed and built by
	 *
	 * Moodley Brand Identity
	 * http://www.moodley.at/
	 *
	 */
	-->
		<?php

			echo ob_get_clean();

		}

	}

	public function print_debug($var, $die = false) {

		if(WP_DEBUG === true) {

			if($this->settings->get_option('debug') === true) {

				if(empty($var)) {
					$var = 'mbi_print_debug: var empty';
				}

				$echo = '<pre>';
				$echo .= print_r($var, true);
				$echo .= '</pre>';

				echo($echo);

				if($die===true) {
					exit();
				}

				return true;

			}

		} else {

			return false;

		}

	}

	/**
	 * Converting given phone number into
	 *
	 * @param string $tel human-readable phone number
	 * @param bool $full anchor or number only
	 * @return string either anchor with machine-readable phone number or with tel: within anchor
	 **/
	public function tel_to_anchor($tel, $full = true) {

	    $newTel = $tel;
	    $newTel = str_replace("+", "00", $newTel);
	    $newTel = str_replace(array("(", ")", " ", "-", "/"), "", $newTel);

	    if($full) {
	        return '<a href="tel:'.$newTel.'">'.$tel.'</a>';
	    } else {
	        return $newTel;
	    }

	}

	public function get_the_slug() {

		global $post;

		if ( is_single() || is_page() ) {
			return $post->post_name;
		}
		else {
			return "";
		}

	}

	public function split_by_more($text) {

		$parts = explode('<!--more-->', $text);

		return $parts;

	}

	public function word_limiter($str, $limit = 16, $end_char = '&#8230;') {

		if (trim($str) == '')
		{
			return $str;
		}

		preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);

		if (strlen($str) == strlen($matches[0]))
		{
			$end_char = '';
		}

		return rtrim($matches[0]).$end_char;

	}

	public function character_limiter($str, $n = 128, $end_char = '&#8230;') {

		if (strlen($str) < $n) {
			return $str;
		}

		$str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));

		if (strlen($str) <= $n) {
			return $str;
		}

		$out = '';

		foreach (explode(' ', trim($str)) as $val) {

			$out .= $val.' ';

			if (strlen($out) >= $n) {
				$out = trim($out);
				return (strlen($out) == strlen($str)) ? $out : $out.$end_char;
			}

		}

	}

}

// ------------------------------------------------

$helper = new Helper($settings);

// ------------------------------------------------

function pd($var, $die = false) {

	global $helper;
	$helper->print_debug($var);

}