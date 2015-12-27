<?php

/**
* 
*/
class Base
{
	public $status = array(
		array(200,'Success'),
		array(400,'Bad Request'),
		array(401,'Username/Password Incorrect'),
		array(403,'Forbidden'),
		array(500,'Internal Server Error')
		);

	function __construct($access_token = '', $data = '')
	{
		if ($this->getAccess($access_token)) {
			if (isset($data)) {
				return $this->out($this->status[0], $data);
			} else {
				return $this->out($this->status[1], $data);
			}
		} else {
			return $this->out($this->status[3], $data);
		}
	}

	public function getAccess($access_token){
		if ($access_token == "789456123") {
			return true;
		}
		return false;
	}

	public function out($status, $data){

		$code = '';
		$message = '';

		if (!empty($status)) {
			$code = $status[0];
			$message = $status[1];
		}

		$response = array (
		  'status' => $code,
		  'message' => $message,
		  'data' => $data
		);

		header("Content-type:Application/json");
		echo json_encode($response);
	}
}

?>