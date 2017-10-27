<?php
require 'Model.php';

class Controller{

	private $model;

	public function __construct(){
		$this->model = new Model();
	}

	public function show(){
		include('View.php');
	}

	public function traitement(){
		if(isset($_POST['searchval'])){
			$critere = $_POST['searchval'];
			$datares = [];
			$url= "http://wiki.webo-facto.com/";
			$datares = $this->model->getResult($url,"POST",array("q"=>$critere));
			$url= "http://wiki.webo-facto.com/resultspage-2.html";
			$response = $this->model->getResult($url,"GET");
			$xml = new DomDocument();
			@$xml->loadHTML($response);
			$doms = $xml->getElementsByTagName("dt");
			$datares = [];
			if(is_object($doms)){
				foreach ($doms as $value) {
					$aDoms = $value->getElementsByTagName("a");
					if($aDoms->length>0) $datares[] = array("resultname"=>$value->textContent,"link"=>$aDoms->item(0)->getAttribute("href"));
				}
			}
			include('View.php');
		}
	}

}