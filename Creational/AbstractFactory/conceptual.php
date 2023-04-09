<?php 

// Soyut fabrika sınıfı
abstract class AbstractFactory {
    abstract public function createProductA();
    abstract public function createProductB();
}

// Somut fabrika sınıfı 1
class ConcreteFactory1 extends AbstractFactory {
    public function createProductA() {
        return new ConcreteProductA1();
    }
    public function createProductB() {
        return new ConcreteProductB1();
    }
}

// Somut fabrika sınıfı 2
class ConcreteFactory2 extends AbstractFactory {
    public function createProductA() {
        return new ConcreteProductA2();
    }
    public function createProductB() {
        return new ConcreteProductB2();
    }
}

// Soyut ürün sınıfı A
abstract class AbstractProductA {
    abstract public function operationA();
}

// Somut ürün sınıfı A1
class ConcreteProductA1 extends AbstractProductA {
    public function operationA() {
        return "ConcreteProductA1 çalıştı\n";
    }
}

// Somut ürün sınıfı A2
class ConcreteProductA2 extends AbstractProductA {
    public function operationA() {
        return "ConcreteProductA2 çalıştı\n";
    }
}

// Soyut ürün sınıfı B
abstract class AbstractProductB {
    abstract public function operationB();
}

// Somut ürün sınıfı B1
class ConcreteProductB1 extends AbstractProductB {
    public function operationB() {
        return "ConcreteProductB1 çalıştı\n";
    }
}

// Somut ürün sınıfı B2
class ConcreteProductB2 extends AbstractProductB {
    public function operationB() {
        return "ConcreteProductB2 çalıştı\n";
    }
}

// Kullanım
$factory1 = new ConcreteFactory1();
$factory2 = new ConcreteFactory2();

$productA1 = $factory1->createProductA();
$productB1 = $factory1->createProductB();
echo $productA1->operationA(); // "ConcreteProductA1 çalıştı"
echo $productB1->operationB(); // "ConcreteProductB1 çalıştı"

$productA2 = $factory2->createProductA();
$productB2 = $factory2->createProductB();
echo $productA2->operationA(); // "ConcreteProductA2 çalıştı"
echo $productB2->operationB(); // "ConcreteProductB2 çalıştı"
