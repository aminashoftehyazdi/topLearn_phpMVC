<?php
	interface a {
		public function echoThing($thing);
	}
	interface b {
		public function showThing($thing);
	}
	interface c extends a , b {
		public function viewThing($thing);
	}
	class d implements c {
		public function echoThing($t){
			echo $t." ";
		}
		
		public function viewThing($t){
			echo $t." ";
		}
	}
	
	$obj = new d;
	$obj -> echoThing('derakht');
	$obj -> viewThing('shaakhe');

?>