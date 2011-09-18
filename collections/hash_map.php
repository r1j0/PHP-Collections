<?php

class HashMap implements Map {

	private $_map = array();


	public function __constructor() {
	}


	public function clear() {
		$this->_map = array();
	}


	public function containsKey($key) {
		return isset($this->_map[$key]);
	}


	public function containsValue($val) {
		foreach (new RecursiveIteratorIterator(new RecursiveArrayIterator($this->_map)) as $key => $value) {
			if ($val == $value) {
				return true;
			}
		}

		return false;
	}


	public function put($key, $value) {
		$this->_map[$key] = $value;
	}


	public function get($key) {
		return isset($this->_map[$key]) ? $this->_map[$key] : null;
	}


	public function entrySet() {
		return $this->_map;
	}


	public function remove($key) {
		if (isset($this->_map[$key])) {
			unset($this->_map[$key]);
		}
	}


	public function size() {
		return count($this->_map);
	}


	public function isEmpty() {
		return count($this->_map) == 0 ? true : false;
	}
}
