<?php 

abstract class Creator{
	abstract public function factoryMethod(): Product;

	public function someOperation():string{
		$product = $this->factoryMethod();
        $result = "creator: The same creator's code has just worked with " .
		$product->operation() . "\n";
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
	public function operation():string;
}

class ConcreteProduct1 implements Product{
	public function operation():string{
		return "class ConcreteProduct1";
	}
}

class ConcreteProduct2 implements Product{
	public function operation():string{
		return "class ConcreteProduct2";
	}
}

function clientCode(Creator $creator){
	echo $creator->someOperation();
}

clientCode(new ConcreteCreator1());
clientCode(new ConcreteCreator2());


?>