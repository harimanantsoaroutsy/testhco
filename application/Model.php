<?php
class Model{

	public function __construct(){
		session_start();
	}

	public function getResult($url,$method,$parametre=null){
		if($parametre!=null){
			$param = array( 'http' => array('method' => $method,
			'header' => "Content-type: application/x-www-form-urlencoded\r\n".
			"Cookie: ".session_name()."=".session_id()."\r\n",
			'content' => http_build_query($parametre)
			));
		}
		else {
			$param = array(
			'http'=>array(
				'method'=>$method,
				'header' => "Content-type: application/x-www-form-urlencoded\r\n".
				"Cookie: ".session_name()."=".session_id()."\r\n"
				)
			);
		}

		$mad = @stream_context_create($param);
		$fp = @fopen($url, 'rb', false, $mad);
		$response = @stream_get_contents($fp);
		return $response;
	}
}