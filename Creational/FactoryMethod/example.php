<pre class="code">
abstract class Creatora
{
    abstract public function factoryMethoda(): Product;

    public function someOperation(): string
    {
        $product = $this->factoryMethoda();
        $result = "Creatora: The same creatora's code has just worked with " .
        $product->operation() . EOL;

        return $result;
    }
}

class ConcreteCreator1 extends Creatora
{
    public function factoryMethoda(): Product
    {
        return new ConcreteProduct1();
    }
}

class ConcreteCreator2 extends Creatora
{
    public function factoryMethoda(): Product
    {
        return new ConcreteProduct2();
    }
}

interface Product
{
    public function operation(): string;
}

class ConcreteProduct1 implements Product
{
    public function operation(): string
    {
        return "{Result of the ConcreteProduct1}";
    }
}

class ConcreteProduct2 implements Product
{
    public function operation(): string
    {
        return "{Result of the ConcreteProduct2}";
    }
}

function clientCode1(Creatora $creatora)
{
    echo "Client: I'm not aware of the creatora's class, but it still works" . EOL;
    echo $creatora->someOperation();
}

clientCode1(new ConcreteCreator1());
clientCode1(new ConcreteCreator2());
</pre>