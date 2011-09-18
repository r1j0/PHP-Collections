<?php

class Queue {

	private $_queue = array();


	public function __construct() {
	}


	public function clear() {
		$this->_queue = array();
	}


	public function get() {
		return $this->isEmpty() ? null : array_shift($this->_queue);
	}


	public function put($element) {
		array_push($this->_queue, $element);
	}


	public function peek() {
		return $this->isEmpty() ? null : $this->_queue[0];
	}


	public function remove($element) {
		$index = $this->getIndex($element);

		if ($index === false) {
			return false;
		}

		unset($this->_queue[$index]);
		$this->_queue = array_values($this->_queue);
		return true;
	}


	public function containsValue($value) {
		return $this->getIndex($value) ? true : false;
	}


	public function entrySet() {
		return $this->_queue;
	}


	public function size() {
		return count($this->_queue);
	}


	public function isEmpty() {
		return count($this->_queue) == 0 ? true : false;
	}


	private function getIndex($val) {
		foreach (new RecursiveIteratorIterator(new RecursiveArrayIterator($this->_queue)) as $key => $value) {
			if ($val == $value) {
				return $key;
			}
		}

		return false;
	}
}