<?php
	// chain of responsibilty design pattern sample

	// main handler structure
	interface Handler {
		public function setNext(Handler $handler) : Handler;
		public function passToNext(string $request ) : ? string;
		
	}
	abstract class MainHandler implements Handler{
		private $nextHandler;
		public function setNext(Handler $handler) : Handler {
			$this -> nextHandler = $handler;
			return $handler;
		}
		public function passToNext(string $request ) : ? string {
			if($this->nextHandler){
				return $this->nextHandler->handle($request); // [_] check konam cheraa return
			}
			else {
				return null;
			}
		}
		abstract public function handle(string $request) : ? string;
	}


	// handlers 1
	class Monkey extends MainHandler {
		public function handle(string $request) : ? string {
			if($request === 'bananna'){
				return "Monkey say I'll eat your request if that is realy a " . $request . " . <br>";
			}
			else {
				return parent::passToNext($request);
			}
		}
	}


	// handlers 2
	class Ship extends MainHandler {
		public function handle(string $request) : ? string{
			if($request === 'grass'){
				return "Ship say I'll eat your request if that is realy a " . $request . " . <br>";
			}
			else {
				return parent::passToNext($request);
			}
		}
	}


	// handlers 3
	class Fish extends MainHandler {
		public function handle(string $request) : ? string{
			if($request === 'water'){
				return "Fish say I'll eat your request if that is realy a " . $request . " . <br>";
			}
			else {
				return parent::passToNext($request);
			}
		}
	}


	// handlers 4
	class Dog extends MainHandler {
		public function handle(string $request) : ? string{
			if($request === 'meat'){
				return "Dog say I'll eat your request if that is realy a " . $request . " . <br>";
			}
			else {
				return parent::passToNext($request);
			}
		}
	}
	
	
	// create instance of objects
	$dog = new Dog;
	$ship = new Ship;
	$fish = new Fish;
	$monkey = new Monkey;
	
	
	// create the chain of objects and so on handlers
	$monkey->setNext($dog)->setNext($ship)->setNext($fish);	
	
	
	// client simple Code
	function clientCode(Handler $handler) : void {
		$foods = ['bananna','water','tea','grass'];
		foreach($foods as $food) {
			$result = $handler->handle($food);
			if ($result){
				echo $result;
			}
			else {
				echo $food . " remained untoach. <br>";
			}
		}		
	}	
	clientCode($monkey);
?>		