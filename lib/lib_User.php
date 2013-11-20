<?php
class lib_User
{
	public $_id;
	public $_login;
	public function __construct($id, $login)
	{
		$this->_id		= $id;
		$this->_login	= $login;
	}
	public function getId()
	{
		return $this->_id;
	}
	public function getLogin()
	{
		return $this->_login;
	}
}
