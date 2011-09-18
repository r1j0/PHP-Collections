<?php

interface Map {

	
	public function clear();
	
	
	public function containsKey($key);
	
	
	public function containsValue($value);
	
	
	public function entrySet();
	
	
	public function get($key);
	
	
	public function isEmpty();
	
	
	public function put($key, $value);
	
	
	public function remove($key);
	
	
	public function size();
	
}