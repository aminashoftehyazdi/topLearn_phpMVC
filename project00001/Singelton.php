<?php
	class Manager {
		static private $instance = null;
		private function __construct () {
			// do some and is not important
		}
		static public function getInstance(){
			if(self::$instance === null ) {
				self::$instance = new Manager;
			}
			return self::$instance;
		}
	}	
	$obj = Manager::getInstance();
	var_dump($obj);
?>