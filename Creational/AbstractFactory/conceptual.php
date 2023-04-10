<?php 

// abstract factory class
abstract class AbstractFactory {
    abstract public function createProductA();
    abstract public function createProductB();
}

// Concrete factory class 1
class ConcreteFactory1 extends AbstractFactory {
    public function createProductA() {
        return new ConcreteProductA1();
    }
    public function createProductB() {
        return new ConcreteProductB1();
    }
}

// Concrete factory class 2
class ConcreteFactory2 extends AbstractFactory {
    public function createProductA() {
        return new ConcreteProductA2();
    }
    public function createProductB() {
        return new ConcreteProductB2();
    }
}

// Abstract product class A
abstract class AbstractProductA {
    abstract public function operationA();
}

// Concrete product class A1
class ConcreteProductA1 extends AbstractProductA {
    public function operationA() {
        return "ConcreteProductA1 çalıştı\n";
    }
}

// Concrete product class A2
class ConcreteProductA2 extends AbstractProductA {
    public function operationA() {
        return "ConcreteProductA2 çalıştı\n";
    }
}

// Abstract product class B
abstract class AbstractProductB {
    abstract public function operationB();
}

// Concrete product class B1
class ConcreteProductB1 extends AbstractProductB {
    public function operationB() {
        return "ConcreteProductB1 çalıştı\n";
    }
}

// Concrete product class B2
class ConcreteProductB2 extends AbstractProductB {
    public function operationB() {
        return "ConcreteProductB2 çalıştı\n";
    }
}

// Use
$factory1 = new ConcreteFactory1();
$factory2 = new ConcreteFactory2();

$productA1 = $factory1->createProductA();
$productB1 = $factory1->createProductB();
echo $productA1->operationA(); // "ConcreteProductA1 worked"
echo $productB1->operationB(); // "ConcreteProductB1 worked"

$productA2 = $factory2->createProductA();
$productB2 = $factory2->createProductB();
echo $productA2->operationA(); // "ConcreteProductA2 worked"
echo $productB2->operationB(); // "ConcreteProductB2 worked"
