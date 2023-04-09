<?php 

class Singleton{
	
	private static $instances = [];
	
	protected function __construct(){}
	
	protected function __clone(){}
	
	public function __wakeup(){
		throw new \Exception('Cannot unserialize a singleton');
	}

	public static function getInstance(){
		$class = static::class;
		if(!isset(self::$instances[$class])){
			self::$instances[$class] = new Static();
		}
		return self::$instances[$class];
	}
}

function clientCode(){
	$s1 = Singleton::getInstance();
	$s2 = Singleton::getInstance();
	if($s1 === $s2){
		echo "Singleton works, both variables contain the same instance.";
	}else{
		echo "Singleton failed, variables contain different instances.";
	}
}

clientCode();

?>