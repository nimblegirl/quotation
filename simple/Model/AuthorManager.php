<?php 
class AuthorManager{
	
	static function Create($a){
		$query = "INSERT INTO `author`(`name`) VALUES ('{$a->getName()}')"; 
		$qresult = mysql_query($query);
		if (!$qresult){
			return false;
		}else{
			return true;
		}
	}	

	static function Find($id){
		$query = "SELECT * FROM `author` WHERE id = {$id}";
		$qresult = mysql_query($query);
		if (!$qresult || mysql_num_rows($qresult) == 0) {
			return null;
		}
		
		$res = mysql_fetch_assoc($qresult);
		$a = new author($id, $res['name']);
		return $a;
 	}

	static function FindQuery($q_string=''){
	 		$query = "SELECT * FROM `author`".$q_string;
	 		$qresult = mysql_query($query);
	 		if (!$qresult) {
				return null;
	 		}

	 		$authors = array();
	 		while($row = mysql_fetch_assoc($qresult)){
	 			$authors [] = new author($row['id'], $row['name']);
	 		}
	 		return $authors;

	 	}

  	static function Save($a){
	 	$query = "UPDATE `author` SET `name` = '{$a->getName()}' WHERE id= {$a->getId()}";
		$qresult = mysql_query($query);
		if (!$qresult) {
			return false;
		}else{
			return true;
 	}
 }

 	static function Remove($a){
 		$query = "DELETE FROM `author` WHERE id = {$a->getId()}";
 		$qresult = mysql_query($query);
 		if (!$qresult) {
 			return false;
 		}else{
 			return true;
 		}
 	}	

 	static function RemoveById($id){
 		$query = "DELETE FROM `author` WHERE id = {$id}";
 		$qresult = mysql_query($query);
 		if (!$qresult) {
 			return false;
 		}else{
 			return true;
 		}
 	}	
}
?>