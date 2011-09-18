<?php

class Property {

	private $_properties = array();

	
	public function __construct() {
		$this->_properties = func_get_args();
	}


	public function get($index) {
		return $this->_properties[$index];
	}
}
