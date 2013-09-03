<?php 
class Tag{

	protected $id;
	protected $name;


	function __construct($id='', $name=''){
		$this->id = $id;
		$this->name = $name;
	
	}

	function setId($sid){
 		$this->id = $sid;
 	}

	function getId(){
 		return $this->id;
 	}

 	function setName($sname){
 		$this->name = $sname;
 	}

 	function getName(){
 		return $this->name;
 	}

 	function __toString(){
 		return 'Tag: id('.$this->id.') - '.$this->name; 
 	}


}

?>
