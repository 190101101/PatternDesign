<?php 

class Singleton{
	private static $instances = [];

	protected function __construct(){}
	
	protected function __clone(){}
	
	public function __wakeup(){
		throw new \Exception('Cannot unserialize a Singleton');
	}
	
	public static function getInstance(){
		$class = static::class;
		if(!isset(self::$instances[$class])){
			self::$instances[$class] = new Static();
		}
		return self::$instances[$class];
	}
}

class Config extends Singleton{
	private $hashmap = [];

	public function setValue(string $key, string $value):void{
		$this->hashmap[$key] = $value;
	}

	public function getValue(string $key){
		return $this->hashmap[$key];
	}
}

$config1 = Config::getInstance();
$config2 = Config::getInstance();

$config1->setValue('name', 'kuki');
$config1->setValue('password', 'kikusi');

echo $config1->getValue('name');
echo $config1->getValue('password');

echo EOL;

echo $config2->getValue('name');
echo $config2->getValue('password');

echo EOL;

echo $config1->getValue('name') === $config1->getValue('name');
echo $config1->getValue('password') === $config1->getValue('password');