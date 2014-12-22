<?php

/**
	* Class Image
	*
	**/
Class Image {

	public static function render($images = array(), $echo = true) {
		$imgHtml = '<img src="small.jpg"
									srcset="large.jpg 1024w,
													medium.jpg 640w,
													small.jpg 320w"
									sizes="(min-width: 36em) 33.3vw,
												100vw"
									alt="A rad wolf"';






		if($echo){
			echo $imgHtml;
		}else{
			return $imgHtml;
		}
	}

	private function renderSrcset(){

	}
}
