<?php
    class Person {
        public $name;
		public $ability;
        public $nextPerson = null;
        public function __construct($name,$ability){
            $this->name = $name;
			$this->ability = $ability;
		}
        public function setNext($personObj) {    
            $this->nextPerson = $personObj;
            return $personObj;
		}
        public function checkIfCanThenDoItOrPassToNextPerson($request){
			if($this->ability == $request){
				echo $this->name . " say I'll do your ( " . $request . " ) works and no need to anyone else.";	
			}
			else {
				if($this->nextPerson) {
					$this->nextPerson->checkIfCanThenDoItOrPassToNextPerson($request);
				}
				else {
					echo "The " . $this->ability . " remained untouch .";
				}
			}
		}
	}
    $person1 = new Person('Amin','Programming');
    $person2 = new Person('Bahram','Design');
    $person3 = new Person('Raamtin','DataBase');
    $person4 = new Person('Fariborz','DevOps');
    $person1 -> setNext($person2) -> setNext($person3) -> setNext($person4);
    $person2->checkIfCanThenDoItOrPassToNextPerson('DataBase');
?>