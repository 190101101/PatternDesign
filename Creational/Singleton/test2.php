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

class Logger extends Singleton{
	private $fileHandle;

	public function __construct(){
		$this->fileHandle = fopen('../tmp/log/logger.txt', 'w');
	}

	public function writeLog(string $message):void{
		$date = date('H:i:s');
		fwrite($this->fileHandle, "{$date} : {$message}\n");	
	}

	public static function log(string $message):void{
		$logger = static::getInstance();
		$logger->writeLog($message);
	}
}

Logger::log('start');

$l1 = Logger::getInstance();
$l2 = Logger::getInstance();

if($l1 === $l2){
	Logger::log("Logger has a single instance.");
}else{
	Logger::log("Logger are different.");
}

Logger::log('end');


?>