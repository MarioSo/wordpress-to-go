<?php

class WPAD_Item implements IteratorAggregate {

	protected $name;
	protected $template;
  protected $data;

	public function __construct($name, $template, $data = array()) {
    $this->name = $name;
    $this->template = $template;
    $this->data = $data;
	}

	public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }

  public function __set($property, $value) {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }

    return $this;
  }

  public function render(){
    // $template = plugin_dir_path(dirname( __FILE__ )) . 'views/' . $this->template.'.html';

    // $html = "";
    // if(is_file($template)){
    //   $markup = file_get_contents($template);



    // }else{
    //   throw new Exception('Template ' . $template . ' not found.');
    // }

    // return $html;


  }

  public function getIterator() {
    return new ArrayIterator( $this->data );
  }

}
