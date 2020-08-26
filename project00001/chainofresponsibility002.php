<?php
    interface Handler{
        public function setNext(Handler $handler): Handler;
        public function handle(string $request): ?string;
    }
    abstract class AbstractHandler implements Handler{
        private $nextHandler;
        public function setNext(Handler $handler): Handler{
            $this->nextHandler = $handler;
            return $handler;
        }
        public function handle(string $request): ?string{
            if ($this->nextHandler) {
                return $this->nextHandler->handle($request);
            }
            return null;
        }
    }
    class MonkeyHandler extends AbstractHandler{
        public function handle(string $request): ?string{
            if($request === 'Banana'){
                return "Monkey: I'll eat the " . $request;
            }
            else{
                return parent::handle($request);
            }
        }
    }
    class FishHandler extends AbstractHandler{
        public function handle(string $request): ?string{
            if($request === 'fishFood'){
                return "Fish: I'll eat the " . $request;
            }
            else{
                return parent::handle($request);
            }
        }
    }
    class DogHandler extends AbstractHandler{
        public function handle(string $request): ?string{
            if($request === 'Meat'){
                return "Dog: I'll eat the " . $request;
            }
            else{
                return parent::handle($request);
            }
        }
    }
    function clientCode(Handler $handler){
        foreach(['fishFood', 'Burger', 'Tea', 'Banana', 'Meat'] as $food){
            echo " Client : Who wants ". $food. '?';
            $result = $handler->handle($food);
            if($result){
                echo ' '. $result;
            }
            else{
                echo " ". $food . "  was left untouched";
            }
        }
    }
    $monkey = new MonkeyHandler;
    $fish = new FishHandler;
    $dog = new DogHandler;
    $monkey->setNext($fish)->setNext($dog);
    echo "Chain : Monkey > Fish > Dog" . '
';
    clientCode($monkey);
    echo '
';
    echo "subChain :  Fish > Dog" . '
';
    clientCode($fish);  