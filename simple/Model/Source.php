<?php 

class Source{
	protected $id;
	protected $name;
	protected $type_id;

	function __construct($id='', $name='', $type_id=''){
		$this->id = $id;
		$this->name = $name;
		$this->type_id = $type_id;

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

 	function setTypeId($sid){
 		$this->type_id = $sid;
 	}
 	function getTypeId(){
 		return $this->type_id;
 	}

 	function __toString(){
 		return 'Source: id('.$this->id.') - '.$this->name; 
 	}


}

 ?>