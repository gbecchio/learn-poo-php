<?php
class IteratorArray implements Iterator
{
	private $_tab = array();
	private $_key = 0;
	public function __construct(array $tab)
	{
		$this->_tab = $tab;
	}
	public function current()
	{
		if($this->valid())
		{
			return $this->_tab[$this->_key];
		}
		return false;
	}
	public function key()
	{
		if($this->valid())
		{
			return $this->_key;
		}
		return false;
	}
	public function next()
	{
		$this->_key = $this->_key + 1;
	}
	public function rewind()
	{
		$this->_key = 0;
	}
	public function valid()
	{
		return isset($this->_tab[$this->_key]);
	}
}
