<?php 

abstract class Creator{
	abstract public function factoryMethod(): Product;

	public function someOperation(){
		$product = $this->factoryMethod();
		return $product->operation();
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
		return "class {ConcreteProduct1}";
	}
}

class ConcreteProduct2 implements Product{
	public function operation(){
		return "class {ConcreteProduct2}";
	}
}

function clientCode(Creator $creator){
	echo $creator->someOperation() . "\n";
}

clientCode(new ConcreteCreator1());
clientCode(new ConcreteCreator2());


?>