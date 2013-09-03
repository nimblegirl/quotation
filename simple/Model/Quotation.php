<?php  
class Quotation
{
	protected $id;
	protected $text;
	protected $source_id;

	function __construct($id = '', $text = '', $source_id = ''){
		$this->id = $id;
		$this->text = $text;
		$this->source_id = $source_id;
	}
 	
 	function setId($sid){
 		$this->id = $sid;
 	}

	function getId(){
 		return $this->id;
 	}

 	function setText($stext){
 		$this->text = $stext;
 	}

 	function getText(){
 		return $this->text;
 	}

 	function setSourceId($sid){
 		$this->source_id = $sid;
 	}
 	function getSourceId(){
 		return $this->source_id;
 	}

 	function __toString(){
 		return 'Quotation: '.$this->text; 
 	}

 	function printable(){
 		return $this->id.' - '.$this->text.' <a href="edit.php?qid='.$this->id.'">Edit</a>'; 
 	}
}

?>