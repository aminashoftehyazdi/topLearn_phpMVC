<?php
    class Phones {
        static protected $model;
        static public function brand($value) {
            self::$model .= "$value ";
            return new self;
		}
        public function ver($value){
            self::$model .= "$value ";
            return new self;
		}
        public function ability($value){
            self::$model .= "$value ";
            return new self;
		}
        static public function madeIn($value) {
            self::$model .= "$value ";
            echo self::$model;
		}
	}
    Phones::brand('samsung')->ver(12)->ability('sms')->madeIn('korean');
?>        