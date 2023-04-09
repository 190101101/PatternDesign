<?php 

class Prototype{
	public $primitive;
	public $component;
	public $circularReferences = [];

	public function __clone(){
		$this->component = clone $this->component;
		$this->circularReferences = clone $this->circularReferences;
		$this->circularReferences->prototype = $this;
	}
}

class ComponenetReferences{
	public $prototype;

	public function __construct(Prototype $prototype){
		$this->prototype = $prototype;
	}
}

function clientCode(){
	$p1 = new Prototype;

	$p1->primitive = 111;
	$p1->component = new \DateTime;
	$p1->circularReferences = new ComponenetReferences($p1);

	$p2 = clone $p1;

	if($p1->primitive === $p2->primitive){
		echo "p1->primitive === p2->primitive" . EOL;
	} else{
		echo "p1->primitive === p2->primitive" . EOL;
	}

	if($p1->component === $p2->component){
		echo "p1->component === p2->component" . EOL;
	} else{
		echo "p1->component !== p2->component" . EOL;
	}

	if($p1->circularReferences === $p2->circularReferences){
		echo "p1->circularReferences === p2->circularReferences" . EOL;
	} else{
		echo "p1->circularReferences !== p2->circularReferences" . EOL;
	}

	if($p1->circularReferences->prototype === $p2->circularReferences->prototype){
		echo "p1->circularReferences->prototype === p2->circularReferences->prototype" . EOL;
	} else{
		echo "p1->circularReferences->prototype !== p2->circularReferences->prototype" . EOL;
	}
}

clientCode();

?>