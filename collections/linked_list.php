<?php

class LinkedList {

	private $_list = array();


	public function __construct() {
	}


	public function clear() {
		$this->_list = array();
	}


	public function get($index) {
		return isset($this->_list[$index]) ? $this->_list[$index] : null;
	}


	public function add($element) {
		array_push($this->_list, $element);
	}


	public function remove($index) {
		unset($this->_list[$index]);
		$this->_list = array_values($this->_list);
	}


	public function removeElement($element) {
		$index = array_search($element, $this->_list);

		if ($index !== false) {
			$this->remove($index);
		}
	}


	public function addFirst($element) {
		array_unshift($this->_list, $element);
	}


	public function removeFirst() {
		array_shift($this->_list);
	}


	public function addLast($element) {
		array_push($this->_list, $element);
	}


	public function removeLast() {
		array_pop($this->_list);
	}


	public function contains($element) {
		foreach (new RecursiveIteratorIterator(new RecursiveArrayIterator($this->_list)) as $key => $value) {
			if ($element == $value) {
				return true;
			}
		}

		return false;
	}


	public function size() {
		return count($this->_list);
	}


	public function listIterator() {
		return new ListIterator($this->_list);
	}


	public function toArray() {
		return $this->_list;
	}
}


class ListIterator implements Iterator {

	private $_position = 0;
	private $_list;


	public function __construct($list) {
		$this->_list = $list;
	}


	public function rewind() {
		$this->_position = 0;
	}


	public function current() {
		return $this->_list[$this->_position];
	}


	public function key() {
		return $this->_position;
	}


	public function next() {
		++$this->_position;
	}


	public function valid() {
		return isset($this->_list[$this->_position]);
	}
}