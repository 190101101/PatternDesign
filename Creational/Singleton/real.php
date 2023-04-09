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

class Logger extends Singleton{
	private $fileHandle;

	public function __construct(){
		$this->fileHandle = fopen('../tmp/log/logger.txt', 'w');
	}

	public function writeLog(string $message):void{
		$date = date('H:i:s');
		fwrite($this->fileHandle, "{$date} : $message\n");
	}

	public static function log(string $message):void{
		$logger = static::getInstance();
		$logger->writeLog($message);
	}
}

class Config extends Singleton{
	private $hashmap = [];

	public function getValue(string $key): string{
		return $this->hashmap[$key];
	}

	public function setValue(string $key, string $value):void{
		$this->hashmap[$key] = $value;
	}
}

Logger::log('started');

$l1 = Logger::getInstance();
$l2 = Logger::getInstance();

if($l1 === $l2){
	Logger::log("Logger has a single instance.");
}else{
	Logger::log("Logger are different.");
}

$config1 = Config::getInstance();

$login = 'test_login';
$password = 'test_password';

$config1->setValue('login', $login);
$config1->setValue('password', $password);

$config2 = Config::getInstance();

if($login == $config2->getValue('login') &&
	$password == $config2->getValue('password')){
	Logger::log('Config singleton also works fine.');
}


Logger::log('Finished!');

?>
