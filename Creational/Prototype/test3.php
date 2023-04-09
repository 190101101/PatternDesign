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

?>
