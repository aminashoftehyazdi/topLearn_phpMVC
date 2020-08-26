<?php
	
	class Najjar {
		private $nextHandler;
		public function setNext( $handler){
			$this->nextHandler = $handler;
			return $this -> nextHandler;
		}
		public function handle( $request){
			if ($this->nextHandler) {
				return $this->nextHandler->doIt($request);
			}
			return null;
		}
		public function doIt( $request){
			if($request === 'KaareChoob'){
				return "Najjar: " . $request . " ro be ohde migiram \n";
			}
			else{
				return $this->handle($request);
			}
		}
	}
	class Ahangar {
		private $nextHandler;
		public function setNext( $handler){
			$this->nextHandler = $handler;
			return $this -> nextHandler;
		}
		public function handle( $request){
			if ($this->nextHandler) {
				return $this->nextHandler->doIt($request);
			}
			return null;
		}
		public function doIt( $request){
			if($request === 'KaareFellezi'){
				return "Ahangar: " . $request . " ro be ohde migiram \n";
			}
			else{
				return $this->handle($request);
			}
		}
	}
	class Banna {
	private $nextHandler;
		public function setNext( $handler){
			$this->nextHandler = $handler;
			return $this -> nextHandler;
		}
		public function handle( $request){
			if ($this->nextHandler) {
				return $this->nextHandler->doIt($request);
			}
			return null;
		}
		public function doIt( $request){
			if($request === 'KaareSaakhtemaani'){
				return "Banna: " . $request . " ro be ohde migiram \n";
			}
			else{
				return $this->handle($request);
			}
		}
	}
	class Mohandes {
	private $nextHandler;
		public function setNext( $handler){
			$this->nextHandler = $handler;
			return $this -> nextHandler;
		}
		public function handle( $request){
			if ($this->nextHandler) {
				return $this->nextHandler->doIt($request);
			}
			return null;
		}
		public function doIt( $request){
			if($request === 'KaareSaakhtemaani'){
				return "Mohandes: " . $request . " ro be ohde migiram \n";
			}
			else{
				return $this->handle($request);
			}
		}
	}
	function clientCode($handler,$request){
		echo $handler->doIt($request);
	}
	$bahman = new Ahangar;
	$bijan = new Banna;
	$ramtin = new Najjar;
	$soroush = new Mohandes;
	$bahman->setNext($bijan)->setNext($ramtin)->setNext($soroush);
	while(true) {
		clientCode($bahman,readline());
	}
?>