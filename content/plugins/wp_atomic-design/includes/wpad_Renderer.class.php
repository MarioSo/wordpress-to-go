<?php

class WPAD_Renderer {

	protected $loader;

	public function __construct() {
		$this->loader = new WPAD_Loader();
	}

	/**
	 * Compiles a WPAD_Item to HTML. Child Items will also be rendered (recursively).
	 * @param  WPAD_Item $item
	 * @return String rendered html elements
	 */
	public function render(WPAD_Item $item){
		$html = $this->loader->loadTemplate($item->template);
		$hasTemplate = (!$html) ? false : true;
		$items = $item->data; // array holding all template variables and values

		foreach($items as $key => $item){
			// if there are child elements render them as well.
			$temp = ($item instanceof WPAD_Item) ? $this->render($item) : $item;

			// if a template exists swap placeholders with values otherwise just concatenate the values
			if($hasTemplate){
				$html = str_replace('{{'. $key .'}}', $temp, $html);
			}else{
				$html .= $temp;
			}
		}

		return $html;
	}
}
