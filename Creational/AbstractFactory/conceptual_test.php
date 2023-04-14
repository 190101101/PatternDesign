<?php 

abstract class AbstractFactory {
    abstract public function createProductA();
    abstract public function createProductB();
}

class ConcreteFactory1 extends AbstractFactory {
    public function createProductA() {
        return new ConcreteProductA1();
    }
    public function createProductB() {
        return new ConcreteProductB1();
    }
}

class ConcreteFactory2 extends AbstractFactory {
    public function createProductA() {
        return new ConcreteProductA2();
    }
    public function createProductB() {
        return new ConcreteProductB2();
    }
}

abstract class AbstractProductA {
    abstract public function operationA();
}

class ConcreteProductA1 extends AbstractProductA {
    public function operationA() {
        return "ConcreteProductA1 çalıştı\n";
    }
}

class ConcreteProductA2 extends AbstractProductA {
    public function operationA() {
        return "ConcreteProductA2 çalıştı\n";
    }
}

abstract class AbstractProductB {
    abstract public function operationB();
}

class ConcreteProductB1 extends AbstractProductB {
    public function operationB() {
        return "ConcreteProductB1 çalıştı\n";
    }
}

class ConcreteProductB2 extends AbstractProductB {
    public function operationB() {
        return "ConcreteProductB2 çalıştı\n";
    }
}

$factory1 = new ConcreteFactory1();
$factory2 = new ConcreteFactory2();

$productA1 = $factory1->createProductA();
$productB1 = $factory1->createProductB();
echo $productA1->operationA();
echo $productB1->operationB();

$productA2 = $factory2->createProductA();
$productB2 = $factory2->createProductB();
echo $productA2->operationA();
echo $productB2->operationB();
