<?php

class WPAD_RenderTree implements IteratorAggregate{

	protected $renderTree = array();

	public function __construct() {

	}

	public function add(WPAD_Item $item){
		$this->renderTree[] = $item;
	}

	public function getItems(){
		return $this->renderTree;
	}

	public function getIterator() {
		return new ArrayIterator( $this->renderTree );
	}
}
