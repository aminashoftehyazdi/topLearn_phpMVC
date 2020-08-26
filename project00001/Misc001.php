<?php
	class Person {
		private $name;
		public function __construct($name){
			$this -> name = $name;
		}
		public function echoName(){
			echo $this->name;
		}
		/*
			abstract public function showName(){
			echo $this->name;
			}
		*/
		abstract public function viewName();
	}
	class Iranian extends Person {
		public function viewName(){
			echo $this->name;
		}
	}
	$person = new Iranian('ali');
	//$person ->echoName();
?>