<?php

require_once 'base.php';

/**
* 
*/

class Out extends Base
{

	public $base;

	public static $ACCESS = 'access_token';
	public static $NAME = 'name';
	public static $EMAIL = 'email';
	public static $DATA = 'data';

	function __construct()
	{
		$name = !is_null($_GET[self::$NAME]) ? $_GET[self::$NAME] : "";
		$email = !is_null($_GET[self::$EMAIL]) ? $_GET[self::$EMAIL] : "";
		$access_token = !is_null($_GET[self::$ACCESS]) ? $_GET[self::$ACCESS] : "";
		$data = array(
			self::$NAME => $name,
			self::$EMAIL => $email
			);
		$this->data($access_token, $data);
	}

	public function data($access_token, $data){
		return new Base($access_token, $data);
	}
}

$out = new Out();
?>