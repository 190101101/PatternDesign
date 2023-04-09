<?php 

abstract class Creator{
    abstract public function factoryMethod():Product;

    public function someOperation():string{
        $product = $this->factoryMethod();
        $result = "creator: The same creator's code has just worked with " .
        $product->operation() . PHP_EOL;
        return $result;
    }
}

class ConcreteCreator1 extends Creator{
    public function factoryMethod():Product{
        return new ConcreteProduct1();
    }
}

class ConcreteCreator2 extends Creator{
    public function factoryMethod():Product{
        return new ConcreteProduct2();
    }
}

interface Product{
    public function operation();
}

class ConcreteProduct1 implements Product{
    public function operation(){
        return "{ConcreteProduct1}";        
    }
}

class ConcreteProduct2 implements Product{
    public function operation(){
        return "{ConcreteProduct2}";        
    }
}

function clientCode(Creator $creator){
    echo "Client: I'm not aware of the creator's class, but it still works ". PHP_EOL;
    echo $creator->someOperation() . PHP_EOL;
}

clientCode(new ConcreteCreator1());
clientCode(new ConcreteCreator2());

?>