<?php 

abstract class SocialNetworkPoster{
	abstract public function getSocialNetwork():SocialNetworkConnector;

	public function post($content){
		$network = $this->getSocialNetwork();
		$network->login();
		$network->createPost($content);
		$network->logout();
	}
}

class FacebookPoster extends SocialNetworkPoster{
	private $login, $password;

	public function __construct(string $login, string $password){
		$this->login = $login;
		$this->password = $password;
	}

	public function getSocialNetwork():SocialNetworkConnector{
		return new FacebookConnector($this->login, $this->password);
	}
}

class LinkedInPoster extends SocialNetworkPoster{
	private $email, $password;

	public function __construct(string $email, string $password){
		$this->email = $email;
		$this->password = $password;
	}

	public function getSocialNetwork():SocialNetworkConnector{
		return new LinkedInConnector($this->email, $this->password);
	}
}

interface SocialNetworkConnector{
	public function login();
	public function createPost($content);
	public function logout();
}

class FacebookConnector implements SocialNetworkConnector{
	private $login, $password;

	public function __construct(string $login, string $password){
		$this->login = $login;
		$this->password = $password;
	}

	public function login(){
		echo "FacebookConnector login $this->login password $this->password" . PHP_EOL;
	}

	public function createPost($content){
		echo "FacebookConnector createPost {$content}" . PHP_EOL;
	}

	public function logout(){
		echo "FacebookConnector logout $this->login password $this->password" . PHP_EOL;
	}
}

class LinkedInConnector implements SocialNetworkConnector{
	private $email, $password;

	public function __construct(string $email, string $password){
		$this->email = $email;
		$this->password = $password;
	}

	public function login(){
		echo "LinkedInConnector email $this->password password $this->password" . PHP_EOL;
	}

	public function createPost($content){
		echo "LinkedInConnector createPost {$content}" . PHP_EOL;
	}

	public function logout(){
		echo "LinkedInConnector logout $this->email password $this->password" . PHP_EOL;
	}
}

function clientCode(SocialNetworkPoster $creator){
	return $creator->post('Hello cookie');
}

clientCode(new FacebookPoster("cookie", '*****'));
clientCode(new LinkedInPoster("cookies", '*******'));

?>