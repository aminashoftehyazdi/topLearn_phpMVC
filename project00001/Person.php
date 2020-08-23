<?php
	class Person {
		private $attribiutes;
		public function fName ($value) {
			$this -> attribiutes .= "first name : $value ";
			return $this;
		}
		public function lName ($value) {
			$this -> attribiutes .= "last name : $value ";
			return $this;
		}
		public function age ($value) {
			$this -> attribiutes .= "age : $value ";
			return $this;
		}
		public function getAttr(){
			return $this->attribiutes;
		}
	}
	$obj1 = new Person;
	$obj1 ->fName('amin') -> lName('ashofteh yazdi') -> age(39);
	echo $obj1 ->getAttr();
?>