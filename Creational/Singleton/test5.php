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

$s1 = Singleton::getInstance();
$s2 = Singleton::getInstance();

if($s1 === $s2){
	echo "Singleton a work" . PHP_EOL;
}else{
	echo "Singleton a not work" . PHP_EOL;
}

?>