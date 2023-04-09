<?php 

class Singleton{
	private static $instances = [];

	protected function __construct(){}
	
	protected function __clone(){}
	
	public function __wakeup(){
		throw new \Exception('Singleton cannot a resialized');
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
	protected $hashmap = [];

	public function setKey($key, $value){
		$this->hashmap[$key] = $value;
	}

	public function getKey($key){
		return $this->hashmap[$key];
	}
}


$p1 = Config::getInstance();
$p2 = Config::getInstance();

$p1->setKey('name', 'kuki');
$p1->setKey('age', '6');

dd($p2->getKey('name'));
dd($p2->getKey('age'));

dd($p1->getKey('name') === $p1->getKey('name'));

dd($p1);
dd($p2);
